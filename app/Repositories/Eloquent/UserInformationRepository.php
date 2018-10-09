<?php namespace App\Repositories\Eloquent;

use \App\Repositories\UserInformationRepositoryInterface;
use \App\Models\UserInformation;

class UserInformationRepository extends SingleKeyModelRepository implements UserInformationRepositoryInterface
{

    public function getBlankModel()
    {
        return new UserInformation();
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
