<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\UserInformationRepositoryInterface;
use App\Http\Requests\Admin\UserInformationRequest;
use App\Http\Requests\PaginationRequest;

class UserInformationController extends Controller
{

    /** @var \App\Repositories\UserInformationRepositoryInterface */
    protected $userInformationRepository;


    public function __construct(
        UserInformationRepositoryInterface $userInformationRepository
    )
    {
        $this->userInformationRepository = $userInformationRepository;
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
        $count = $this->userInformationRepository->count();
        $models = $this->userInformationRepository->get('id', 'desc', $offset, $limit);

        return view('pages.admin.user-informations.index', [
            'models'  => $models,
            'count'   => $count,
            'offset'  => $offset,
            'limit'   => $limit,
            'baseUrl' => action('Admin\UserInformationController@index'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Response
     */
    public function create()
    {
        return view('pages.admin.user-informations.edit', [
            'isNew'     => true,
            'userInformation' => $this->userInformationRepository->getBlankModel(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request
     * @return \Response
     */
    public function store(UserInformationRequest $request)
    {
        $input = $request->only(['fullname','phone_number','university','graduated_year','major','major2','personality']);
        
        $input['is_enabled'] = $request->get('is_enabled', 0);
        $model = $this->userInformationRepository->create($input);

        if (empty( $model )) {
            return redirect()->back()->withErrors(trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\UserInformationController@index')
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
        $model = $this->userInformationRepository->find($id);
        if (empty( $model )) {
            \App::abort(404);
        }

        return view('pages.admin.user-informations.edit', [
            'isNew' => false,
            'userInformation' => $model,
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
    public function update($id, UserInformationRequest $request)
    {
        /** @var \App\Models\UserInformation $model */
        $model = $this->userInformationRepository->find($id);
        if (empty( $model )) {
            \App::abort(404);
        }
        $input = $request->only(['fullname','phone_number','university','graduated_year','major','major2','personality']);
        
        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->userInformationRepository->update($model, $input);

        return redirect()->action('Admin\UserInformationController@show', [$id])
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
        /** @var \App\Models\UserInformation $model */
        $model = $this->userInformationRepository->find($id);
        if (empty( $model )) {
            \App::abort(404);
        }
        $this->userInformationRepository->delete($model);

        return redirect()->action('Admin\UserInformationController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
