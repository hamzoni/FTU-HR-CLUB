<?php namespace Tests\Models;

use App\Models\UserTest;
use Tests\TestCase;

class UserTestTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\UserTest $userTest */
        $userTest = new UserTest();
        $this->assertNotNull($userTest);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\UserTest $userTest */
        $userTestModel = new UserTest();

        $userTestData = factory(UserTest::class)->make();
        foreach( $userTestData->toArray() as $key => $value ) {
            $userTestModel->$key = $value;
        }
        $userTestModel->save();

        $this->assertNotNull(UserTest::find($userTestModel->id));
    }

}
