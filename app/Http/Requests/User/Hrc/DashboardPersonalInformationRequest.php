<?php

namespace App\Http\Requests\User\Hrc;

use App\Http\Requests\Request;
use App\Models\User;
use App\Services\UserServiceInterface;

class DashboardPersonalInformationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $universities = config('hrc.universities');
        $graduatedYears = config('hrc.graduated_years');
        $majors = config('hrc.majors');

        $mimeTypes = [
            'application/pdf', // pdf
            'application/msword', // doc dot
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // docx
            'application/vnd.openxmlformats-officedocument.wordprocessingml.template', // docx
            'application/vnd.ms-word.document.macroEnabled.12', // docx
        ];

        /** @var UserServiceInterface $userService */
        $userService = app()->make(UserServiceInterface::class);
        /** @var User $user */
        $user = $userService->getUser();

        if ($user && $user->information && $user->information->cv) {
            $fileRules = 'file|max:7000|mimetypes:'.implode(',', $mimeTypes);
        } else {
            $fileRules = 'required|file|max:7000|mimetypes:'.implode(',', $mimeTypes);
        }

        return [
            'fullname' => 'required|min:4',
            'phone_number' => 'required|min:6',
            'university' => 'required|in:'.implode(',', array_keys($universities)),
            'graduated_year' => 'required|in:'.implode(',', array_keys($graduatedYears)),
            'major' => 'required|in:'.implode(',', $majors),
            'major2' => 'in:'.implode(',', $majors),
            'file' => $fileRules
        ];
    }

    public function messages()
    {
        return [
            'file.mimetypes' => 'File không được chấp nhận. Vui lòng upload định dạng pdf, doc hoặc docx'
        ];
    }
}