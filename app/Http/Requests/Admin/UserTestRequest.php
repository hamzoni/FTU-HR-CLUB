<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\UserTestRepositoryInterface;

class UserTestRequest extends BaseRequest
{

    /** @var \App\Repositories\UserTestRepositoryInterface */
    protected $userTestRepository;

    public function __construct(UserTestRepositoryInterface $userTestRepository)
    {
        $this->userTestRepository = $userTestRepository;
    }

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
        return $this->userTestRepository->rules();
    }

    public function messages()
    {
        return $this->userTestRepository->messages();
    }

}
