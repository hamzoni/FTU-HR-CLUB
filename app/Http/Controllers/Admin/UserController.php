<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAnswer;
use App\Models\UserTest;
use App\Repositories\UserRepositoryInterface;
use App\Http\Requests\PaginationRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Repositories\UserTestRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\MessageBag;
use Maatwebsite\Excel\Classes\LaravelExcelWorksheet;
use Maatwebsite\Excel\Writers\LaravelExcelWriter;

class UserController extends Controller
{
    /** @var \App\Repositories\UserRepositoryInterface */
    protected $userRepository;

    /**
     * @var UserTestRepositoryInterface
     */
    protected $userTestRepository;

    /** @var \Illuminate\Support\MessageBag */
    protected $messageBag;

    public function __construct(
        UserRepositoryInterface $userRepositoryInterface,
        UserTestRepositoryInterface $userTestRepository,
        MessageBag $messageBag
    ) {
        $this->userRepository = $userRepositoryInterface;
        $this->userTestRepository = $userTestRepository;
        $this->messageBag = $messageBag;
    }

    public function index(PaginationRequest $request)
    {
        $offset = $request->offset();
        $limit = $request->limit();

        $order = $request->order();
        $direction = $request->direction('desc');

        $users = $this->userRepository->get($order, $direction, $offset, $limit);
        $count = $this->userRepository->count();

        return view('pages.admin.users.index', [
            'users' => $users,
            'offset' => $offset,
            'limit' => $limit,
            'count' => $count,
            'order' => $order,
            'direction' => $direction,
            'baseUrl' => action('Admin\UserController@index'),
        ]);
    }

    public function show($id)
    {
        $user = $this->userRepository->find($id);
        if (empty($user)) {
            abort(404);
        }

        return view('pages.admin.users.edit', [
            'user' => $user,
        ]);
    }

    public function create()
    {
    }

    public function store(UserRequest $request)
    {
        $model = $this->userRepository->create($request->all());

        return redirect()->action('Admin\UserController@show', [$model->id])->with('message-success',
            trans('admin.messages.general.create_success'));
    }

    public function update($id, UserRequest $request)
    {
        $user = $this->userRepository->find($id);
        if (empty($user)) {
            abort(404);
        }

        $this->userRepository->update($user, $request->all());

        return redirect()->action('Admin\UserController@show', [$id])->with('message-success',
            trans('admin.messages.general.update_success'));
    }

    public function destroy($id)
    {
        $user = $this->userRepository->find($id);
        if (empty($user)) {
            abort(404);
        }
        $this->userRepository->delete($user);

        return redirect()->action('Admin\UserController@index')->with('message-success',
            trans('admin.messages.general.delete_success'));
    }

    public function export()
    {
        /** @var Collection $users */
        $users = $this->userRepository->all();
        $users->load('information.cv');

        $file = \Excel::create('export_data_at_'.date('d_m_Y_H_i_s'), function (LaravelExcelWriter $excel) use ($users) {
            $excel->sheet('List registered members', function (LaravelExcelWorksheet $sheet) use ($users) {
                $rowIndex = 1;

                /*
                 * Header
                 */
                $sheet->row($rowIndex, [
                    'id',
                    'Email',
                    'Thoi Gian Tao TK',
                    'Ho Ten',
                    'So Dien Thoai',
                    'Truong Dai Hoc',
                    'Nam Tot Nghiep',
                    'Chuyen Nganh 1',
                    'Chuyen Nganh 2',
                    'CV gan nhat',
                    'Thoi gian nop CV',
//                    'Personality',
//                    'Thoi gian cap nhat'
                ]);

                /*
                 * Body
                 */
                /** @var User $user */
                foreach ($users as $user) {
                    $rowIndex ++;

                    $sheet->row($rowIndex, [
                        $user->id,
                        $user->email,
                        $user->created_at,
                        isset($user->information->fullname) ? $user->information->fullname : '',
                        isset($user->information->phone_number) ? $user->information->phone_number : '',
                        isset($user->information->university) ? config('hrc.universities')[$user->information->university] : '',
                        isset($user->information->graduated_year) ? config('hrc.graduated_years')[$user->information->graduated_year] : '',
                        isset($user->information->major) ? $user->information->major : '',
                        isset($user->information->major2) ? $user->information->major2 : '',
                        isset($user->information->cv_id) ? asset($user->information->cv_id) : '',
                        isset($user->information->created_at) ? $user->information->created_at : '',
//                        isset($user->information->personality) ? $user->information->personality : '',
//                        isset($user->information->created_at) ? $user->information->created_at : '',
                    ], true);
                }
            });
        });

        return $file->download('xls');
    }

    public function exportTests()
    {
        /** @var Collection $tests */
        $tests = $this->userTestRepository->all();
        $tests->load('user', 'user.userAnswers');

        $file = \Excel::create('export_test_online_data_at_'.date('d_m_Y_H_i_s'), function (LaravelExcelWriter $excel) use ($tests) {
            $excel->sheet('List test online', function (LaravelExcelWorksheet $sheet) use ($tests) {
                $rowIndex = 1;

                /*
                 * Header
                 */
                $sheet->row($rowIndex, [
                    'id',
                    'Email',
                    'City',
                    'Score',
                    'Answer_1',
                    'Answer_2',
                    'Answer_3',
                    'Answer_4',
                    'Answer_5',
                    'Answer_6',
                    'Answer_7',
                    'Answer_8',
                    'Started At',
                    'Submitted At',
                ]);

                $questionsData = new Collection(config('hrc.testOnline.questions'));
                $questionsData = $questionsData->keyBy('id');

                /*
                 * Body
                 */
                /** @var UserTest $test */
                foreach ($tests as $test) {
                    $rowIndex ++;

                    /** @var User $user */
                    $user = $test->user;

                    /*
                     * Executing Answers
                     */
                    $totalTrue = 0;
                    $dataUserAnswers = new Collection;

                    /** @var Collection $answers */
                    $answers = $user->userAnswers;
                    $answers->each(function (UserAnswer $answer) use ($questionsData, &$totalTrue, &$dataUserAnswers) {
                        $questionData = $questionsData->get($answer->question_id);

                        if ($questionData['rightAnswer'] == $answer->answer) {
                            $totalTrue++;
                        }

                        $dataUserAnswers->put($answer->question_id, $answer->answer);
                    });

                    $score = $totalTrue;

                    $sheet->row($rowIndex, [
                        $user->id,
                        $user->email,
                        isset($test->city) ? $test->city : '',
                        $score,
                        $dataUserAnswers->has(1) ? $dataUserAnswers->get(1) : null,
                        $dataUserAnswers->has(2) ? $dataUserAnswers->get(2) : null,
                        $dataUserAnswers->has(3) ? $dataUserAnswers->get(3) : null,
                        $dataUserAnswers->has(4) ? $dataUserAnswers->get(4) : null,
                        $dataUserAnswers->has(5) ? $dataUserAnswers->get(5) : null,
                        $dataUserAnswers->has(6) ? $dataUserAnswers->get(6) : null,
                        $dataUserAnswers->has(7) ? $dataUserAnswers->get(7) : null,
                        $dataUserAnswers->has(8) ? $dataUserAnswers->get(8) : null,
                        isset($test->created_at) ? $test->created_at : '',
                        isset($test->submitted_at) ? $test->submitted_at : '',
                    ], true);
                }
            });
        });

        return $file->download('xls');
    }
}
