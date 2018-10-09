<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\UserTestRepositoryInterface;
use App\Http\Requests\Admin\UserTestRequest;
use App\Http\Requests\PaginationRequest;

class UserTestController extends Controller
{

    /** @var \App\Repositories\UserTestRepositoryInterface */
    protected $userTestRepository;


    public function __construct(
        UserTestRepositoryInterface $userTestRepository
    )
    {
        $this->userTestRepository = $userTestRepository;
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
        $count = $this->userTestRepository->count();
        $models = $this->userTestRepository->get('id', 'desc', $offset, $limit);

        return view('pages.admin.user-tests.index', [
            'models'  => $models,
            'count'   => $count,
            'offset'  => $offset,
            'limit'   => $limit,
            'baseUrl' => action('Admin\UserTestController@index'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Response
     */
    public function create()
    {
        return view('pages.admin.user-tests.edit', [
            'isNew'     => true,
            'userTest' => $this->userTestRepository->getBlankModel(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request
     * @return \Response
     */
    public function store(UserTestRequest $request)
    {
        $input = $request->only(['city','submitted_at']);
        
        $input['is_enabled'] = $request->get('is_enabled', 0);
        $model = $this->userTestRepository->create($input);

        if (empty( $model )) {
            return redirect()->back()->withErrors(trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\UserTestController@index')
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
        $model = $this->userTestRepository->find($id);
        if (empty( $model )) {
            \App::abort(404);
        }

        return view('pages.admin.user-tests.edit', [
            'isNew' => false,
            'userTest' => $model,
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
    public function update($id, UserTestRequest $request)
    {
        /** @var \App\Models\UserTest $model */
        $model = $this->userTestRepository->find($id);
        if (empty( $model )) {
            \App::abort(404);
        }
        $input = $request->only(['city','submitted_at']);
        
        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->userTestRepository->update($model, $input);

        return redirect()->action('Admin\UserTestController@show', [$id])
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
        /** @var \App\Models\UserTest $model */
        $model = $this->userTestRepository->find($id);
        if (empty( $model )) {
            \App::abort(404);
        }
        $this->userTestRepository->delete($model);

        return redirect()->action('Admin\UserTestController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
