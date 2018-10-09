<?php namespace Tests\Models;

use App\Models\UserAnswer;
use Tests\TestCase;

class UserAnswerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\UserAnswer $userAnswer */
        $userAnswer = new UserAnswer();
        $this->assertNotNull($userAnswer);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\UserAnswer $userAnswer */
        $userAnswerModel = new UserAnswer();

        $userAnswerData = factory(UserAnswer::class)->make();
        foreach( $userAnswerData->toArray() as $key => $value ) {
            $userAnswerModel->$key = $value;
        }
        $userAnswerModel->save();

        $this->assertNotNull(UserAnswer::find($userAnswerModel->id));
    }

}
