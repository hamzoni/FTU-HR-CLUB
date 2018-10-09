<?php

namespace App\Http\Controllers\User\Hrc;

use Abraham\TwitterOAuth\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Hrc\DashboardPersonalInformationRequest;
use App\Http\Requests\User\Hrc\DashboardPersonalityTestRequest;
use App\Jobs\SendEmailAfterSubmitCV;
use App\Models\File;
use App\Models\User;
use App\Services\FileUploadServiceInterface;
use App\Services\UserServiceInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\Facades\StringHelper;
use Illuminate\Http\Request as HttpRequest;

class FunctionalController extends Controller
{
    use DispatchesJobs;

    /**
     * @var UserServiceInterface
     */
    protected $userService;

    /**
     * @var FileUploadServiceInterface
     */
    protected $fileUploadService;

    protected $user;

    protected $title = 'UVTN 2017 | Đăng ký CV thành công & Thông báo vòng 1 Test tuyển dụng';

    public function __construct(UserServiceInterface $userService, FileUploadServiceInterface $fileUploadService)
    {
        $this->userService = $userService;
        $this->fileUploadService = $fileUploadService;
    }

    public function updatePersonalInformation(DashboardPersonalInformationRequest $request)
    {
        //abort(500, "Thời gian cập nhật thông tin đã hết.");

        /** @var User $user */
        $user = $this->userService->getUser();

        /*
         * Authorize
         */
        $this->authorize('updateInformation', $user);

        /*
         * Performing
         */
        $user->information()->updateOrCreate([
            'user_id' => $user->id
        ], [
            'fullname' => $request->get('fullname'),
            'phone_number' => $request->get('phone_number'),
            'university' => $request->get('university'),
            'university_name' => $request->get('university_name'),
            'graduated_year' => $request->get('graduated_year'),
            'major' => $request->get('major'),
            'major2' => $request->get('major2')
        ]);
        $this->user = $user;

        if ($user->information && $user->information->cv) {
            // Do nothing
        } else {
            if ($request->hasFile('file')) {
                $uploadedFile = $request->file('file');
                $extension = $uploadedFile->getClientOriginalExtension();
                $name = \StringHelper::makeSlug($uploadedFile->getClientOriginalName());
                $fileName = time() . '_' .$name .".".$extension;
                if ($extension == 'pdf' || $extension == 'doc' || $extension == 'docx') {
                    $uploadedFile->move(public_path('uploads/cv'), $fileName);
                    $fileCVPath = '/uploads/cv/'.$fileName;
                    $user->information()->update([
                        'cv_id' => $fileCVPath
                    ]);
                }


                /** @var File $file */
                /*$file = $this->fileUploadService->upload('cv', $uploadedFile->getPathname(), $uploadedFile->getClientMimeType(), [
                    'entity_id' => $user->id,
                    'entity_type' => User::class
                ]);

                $user->information()->update([
                    'cv_id' => $file->id
                ]);*/


                /*
                 * Send email
                 */
                //$this->dispatchNow(new SendEmailAfterSubmitCV($user->email, $request->get('fullname')));


                $template = 'emails.user.email-after-submit-cv';
                $data = [
                    'name' => $request->get('fullname'),
                    'email' => $user->email,
                ];
                Mail::send($template, $data, function ($m) {
                    $m->to($this->user->email, $this->user->name)->subject($this->title);
                });


            }
        }

        return response()->json([
            'status' => true
        ]);
    }

    public function personalityTest(DashboardPersonalityTestRequest $request)
    {
        /** @var User $user */
        $user = $this->userService->getUser();

        /*
         * Authorize
         */
        $this->authorize('updatePersonality', $user);

        /*
         * Performing
         */
        $personality = strtoupper($request->get('personality'));

        $user->information()->updateOrCreate([
            'user_id' => $user->id
        ], [
            'personality' => $personality
        ]);

        return response()->json([
            'status' => true
        ]);
    }

    public function finalRegister(HttpRequest $request){
        $data = $request->except('_token');
        if(!empty($data['university'])){
            $data['university'] = config('hrc.universities')[$data['university']];
        }
        $data['graduated_year'] = config('hrc.graduated_years')[$data['graduated_year']];
        DB::table('final_register')->insert($data);
        return redirect()->back()->with('message', 'success');
    }

    public function finalSubscribe(HttpRequest $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if (!$validator->fails()) {
            DB::table('final_subscription')->insert($request->only('email'));
            return response()->json(['success' => 'true']);
        }
    }
}