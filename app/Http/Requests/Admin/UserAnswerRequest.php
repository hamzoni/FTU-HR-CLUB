<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use App\Repositories\UserAnswerRepositoryInterface;

class UserAnswerRequest extends BaseRequest
{

    /** @var \App\Repositories\UserAnswerRepositoryInterface */
    protected $userAnswerRepository;

    public function __construct(UserAnswerRepositoryInterface $userAnswerRepository)
    {
        $this->userAnswerRepository = $userAnswerRepository;
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
        return $this->userAnswerRepository->rules();
    }

    public function messages()
    {
        return $this->userAnswerRepository->messages();
    }

}
