<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\File;
use App\Repositories\FileRepositoryInterface;
use App\Http\Requests\Admin\FileRequest;
use App\Http\Requests\PaginationRequest;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Classes\LaravelExcelWorksheet;
use Maatwebsite\Excel\Writers\LaravelExcelWriter;

class FileController extends Controller
{

    /** @var \App\Repositories\FileRepositoryInterface */
    protected $fileRepository;


    public function __construct(
        FileRepositoryInterface $fileRepository
    )
    {
        $this->fileRepository = $fileRepository;
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
        $count = $this->fileRepository->count();
        $models = $this->fileRepository->get('id', 'desc', $offset, $limit);
        $models->load('userInformation', 'user');

        return view('pages.admin.files.index', [
            'models'  => $models,
            'count'   => $count,
            'offset'  => $offset,
            'limit'   => $limit,
            'baseUrl' => action('Admin\FileController@index'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Response
     */
    public function create()
    {
        return view('pages.admin.files.edit', [
            'isNew'     => true,
            'file' => $this->fileRepository->getBlankModel(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request
     * @return \Response
     */
    public function store(FileRequest $request)
    {
        $input = $request->only(['url','title','entity_type','file_category_type','s3_key','s3_bucket','s3_region','s3_extension','media_type','file_size']);
        
        $input['is_enabled'] = $request->get('is_enabled', 0);
        $model = $this->fileRepository->create($input);

        if (empty( $model )) {
            return redirect()->back()->withErrors(trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\FileController@index')
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
        $model = $this->fileRepository->find($id);
        if (empty( $model )) {
            \App::abort(404);
        }

        return view('pages.admin.files.edit', [
            'isNew' => false,
            'file' => $model,
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
    public function update($id, FileRequest $request)
    {
        /** @var \App\Models\File $model */
        $model = $this->fileRepository->find($id);
        if (empty( $model )) {
            \App::abort(404);
        }
        $input = $request->only(['url','title','entity_type','file_category_type','s3_key','s3_bucket','s3_region','s3_extension','media_type','file_size']);
        
        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->fileRepository->update($model, $input);

        return redirect()->action('Admin\FileController@show', [$id])
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
        /** @var \App\Models\File $model */
        $model = $this->fileRepository->find($id);
        if (empty( $model )) {
            \App::abort(404);
        }
        $this->fileRepository->delete($model);

        return redirect()->action('Admin\FileController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

    public function export()
    {
        /** @var Collection $files */
        $files = $this->fileRepository->all();
        $files->load('user', 'userInformation');

        $file = \Excel::create('export_data_at_' . date('d_m_Y_H_i_s'), function (LaravelExcelWriter $excel) use ($files) {
            $excel->sheet('List registered members', function (LaravelExcelWorksheet $sheet) use ($files) {
                $rowIndex = 1;

                /*
                 * Header
                 */
                $sheet->row($rowIndex, [
                    'id',
                    'Url',
                    'Thoi Gian Upload',
                    'Email',
                    'Ho Ten',
                    'Thoi Gian Tao Tai Khoan',
                    'Thoi Gian Tao Thong Tin'
                ]);

                /*
                 * Body
                 */
                /** @var File $file */
                foreach ($files as $file) {
                    $rowIndex++;

                    $sheet->row($rowIndex, [
                        $file->id,
                        $file->url,
                        $file->created_at,
                        isset($file->user->email) ? $file->user->email : '',
                        isset($file->userInformation->fullname) ? $file->userInformation->fullname : '',
                        isset($file->user->created_at) ? $file->user->created_at : '',
                        isset($file->userInformation->created_at) ? $file->userInformation->created_at : '',
                    ], true);
                }
            });
        });

        return $file->download('xls');
    }

}
