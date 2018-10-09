<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class UserInformationControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\UserInformationController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\UserInformationController::class);
        $this->assertNotNull($controller);
    }

    public function setUp()
    {
        parent::setUp();
        $authUser = \App\Models\AdminUser::first();
        $this->be($authUser, 'admins');
    }

    public function testGetList()
    {
        $response = $this->action('GET', 'Admin\UserInformationController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\UserInformationController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $userInformation = factory(\App\Models\UserInformation::class)->make();
        $this->action('POST', 'Admin\UserInformationController@store', [
                '_token' => csrf_token(),
            ] + $userInformation->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $userInformation = factory(\App\Models\UserInformation::class)->create();
        $this->action('GET', 'Admin\UserInformationController@show', [$userInformation->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $userInformation = factory(\App\Models\UserInformation::class)->create();

        $name = $faker->name;
        $id = $userInformation->id;

        $userInformation->name = $name;

        $this->action('PUT', 'Admin\UserInformationController@update', [$id], [
                '_token' => csrf_token(),
            ] + $userInformation->toArray());
        $this->assertResponseStatus(302);

        $newUserInformation = \App\Models\UserInformation::find($id);
        $this->assertEquals($name, $newUserInformation->name);
    }

    public function testDeleteModel()
    {
        $userInformation = factory(\App\Models\UserInformation::class)->create();

        $id = $userInformation->id;

        $this->action('DELETE', 'Admin\UserInformationController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkUserInformation = \App\Models\UserInformation::find($id);
        $this->assertNull($checkUserInformation);
    }

}
