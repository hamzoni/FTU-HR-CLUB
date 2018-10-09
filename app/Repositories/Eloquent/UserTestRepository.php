<?php namespace App\Repositories\Eloquent;

use \App\Repositories\UserTestRepositoryInterface;
use \App\Models\UserTest;

class UserTestRepository extends SingleKeyModelRepository implements UserTestRepositoryInterface
{

    public function getBlankModel()
    {
        return new UserTest();
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
