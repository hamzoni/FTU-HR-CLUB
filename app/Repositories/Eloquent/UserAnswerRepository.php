<?php namespace App\Repositories\Eloquent;

use \App\Repositories\UserAnswerRepositoryInterface;
use \App\Models\UserAnswer;

class UserAnswerRepository extends SingleKeyModelRepository implements UserAnswerRepositoryInterface
{

    public function getBlankModel()
    {
        return new UserAnswer();
    }

    public function rules()
    {
        return [
        ];
    }

    public function messages()
    {
        return [
        ];
    }

}
