<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class UserTestControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\UserTestController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\UserTestController::class);
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
        $response = $this->action('GET', 'Admin\UserTestController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\UserTestController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $userTest = factory(\App\Models\UserTest::class)->make();
        $this->action('POST', 'Admin\UserTestController@store', [
                '_token' => csrf_token(),
            ] + $userTest->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $userTest = factory(\App\Models\UserTest::class)->create();
        $this->action('GET', 'Admin\UserTestController@show', [$userTest->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $userTest = factory(\App\Models\UserTest::class)->create();

        $name = $faker->name;
        $id = $userTest->id;

        $userTest->name = $name;

        $this->action('PUT', 'Admin\UserTestController@update', [$id], [
                '_token' => csrf_token(),
            ] + $userTest->toArray());
        $this->assertResponseStatus(302);

        $newUserTest = \App\Models\UserTest::find($id);
        $this->assertEquals($name, $newUserTest->name);
    }

    public function testDeleteModel()
    {
        $userTest = factory(\App\Models\UserTest::class)->create();

        $id = $userTest->id;

        $this->action('DELETE', 'Admin\UserTestController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkUserTest = \App\Models\UserTest::find($id);
        $this->assertNull($checkUserTest);
    }

}
