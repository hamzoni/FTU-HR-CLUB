<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class UserAnswerControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\UserAnswerController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\UserAnswerController::class);
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
        $response = $this->action('GET', 'Admin\UserAnswerController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\UserAnswerController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $userAnswer = factory(\App\Models\UserAnswer::class)->make();
        $this->action('POST', 'Admin\UserAnswerController@store', [
                '_token' => csrf_token(),
            ] + $userAnswer->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $userAnswer = factory(\App\Models\UserAnswer::class)->create();
        $this->action('GET', 'Admin\UserAnswerController@show', [$userAnswer->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $userAnswer = factory(\App\Models\UserAnswer::class)->create();

        $name = $faker->name;
        $id = $userAnswer->id;

        $userAnswer->name = $name;

        $this->action('PUT', 'Admin\UserAnswerController@update', [$id], [
                '_token' => csrf_token(),
            ] + $userAnswer->toArray());
        $this->assertResponseStatus(302);

        $newUserAnswer = \App\Models\UserAnswer::find($id);
        $this->assertEquals($name, $newUserAnswer->name);
    }

    public function testDeleteModel()
    {
        $userAnswer = factory(\App\Models\UserAnswer::class)->create();

        $id = $userAnswer->id;

        $this->action('DELETE', 'Admin\UserAnswerController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkUserAnswer = \App\Models\UserAnswer::find($id);
        $this->assertNull($checkUserAnswer);
    }

}
