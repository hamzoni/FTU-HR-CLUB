<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\UserAnswerRepositoryInterface;
use App\Http\Requests\Admin\UserAnswerRequest;
use App\Http\Requests\PaginationRequest;

class UserAnswerController extends Controller
{

    /** @var \App\Repositories\UserAnswerRepositoryInterface */
    protected $userAnswerRepository;


    public function __construct(
        UserAnswerRepositoryInterface $userAnswerRepository
    )
    {
        $this->userAnswerRepository = $userAnswerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\PaginationRequest $request
     * @return \Response
     */
    public function index(PaginationRequest $request)
    {
        $offset = $request->offset();
        $limit = $request->limit();
        $count = $this->userAnswerRepository->count();
        $models = $this->userAnswerRepository->get('id', 'desc', $offset, $limit);

        return view('pages.admin.user-answers.index', [
            'models'  => $models,
            'count'   => $count,
            'offset'  => $offset,
            'limit'   => $limit,
            'baseUrl' => action('Admin\UserAnswerController@index'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Response
     */
    public function create()
    {
        return view('pages.admin.user-answers.edit', [
            'isNew'     => true,
            'userAnswer' => $this->userAnswerRepository->getBlankModel(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request
     * @return \Response
     */
    public function store(UserAnswerRequest $request)
    {
        $input = $request->only(['answer']);
        
        $input['is_enabled'] = $request->get('is_enabled', 0);
        $model = $this->userAnswerRepository->create($input);

        if (empty( $model )) {
            return redirect()->back()->withErrors(trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\UserAnswerController@index')
            ->with('message-success', trans('admin.messages.general.create_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Response
     */
    public function show($id)
    {
        $model = $this->userAnswerRepository->find($id);
        if (empty( $model )) {
            \App::abort(404);
        }

        return view('pages.admin.user-answers.edit', [
            'isNew' => false,
            'userAnswer' => $model,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param      $request
     * @return \Response
     */
    public function update($id, UserAnswerRequest $request)
    {
        /** @var \App\Models\UserAnswer $model */
        $model = $this->userAnswerRepository->find($id);
        if (empty( $model )) {
            \App::abort(404);
        }
        $input = $request->only(['answer']);
        
        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->userAnswerRepository->update($model, $input);

        return redirect()->action('Admin\UserAnswerController@show', [$id])
                    ->with('message-success', trans('admin.messages.general.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Response
     */
    public function destroy($id)
    {
        /** @var \App\Models\UserAnswer $model */
        $model = $this->userAnswerRepository->find($id);
        if (empty( $model )) {
            \App::abort(404);
        }
        $this->userAnswerRepository->delete($model);

        return redirect()->action('Admin\UserAnswerController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
