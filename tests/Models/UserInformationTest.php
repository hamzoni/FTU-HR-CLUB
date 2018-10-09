<?php namespace Tests\Models;

use App\Models\UserInformation;
use Tests\TestCase;

class UserInformationTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\UserInformation $userInformation */
        $userInformation = new UserInformation();
        $this->assertNotNull($userInformation);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\UserInformation $userInformation */
        $userInformationModel = new UserInformation();

        $userInformationData = factory(UserInformation::class)->make();
        foreach( $userInformationData->toArray() as $key => $value ) {
            $userInformationModel->$key = $value;
        }
        $userInformationModel->save();

        $this->assertNotNull(UserInformation::find($userInformationModel->id));
    }

}
