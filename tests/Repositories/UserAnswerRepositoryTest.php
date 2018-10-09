<?php namespace Tests\Repositories;

use App\Models\UserAnswer;
use Tests\TestCase;

class UserAnswerRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\UserAnswerRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\UserAnswerRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $userAnswers = factory(UserAnswer::class, 3)->create();
        $userAnswerIds = $userAnswers->pluck('id')->toArray();

        /** @var  \App\Repositories\UserAnswerRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\UserAnswerRepositoryInterface::class);
        $this->assertNotNull($repository);

        $userAnswersCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(UserAnswer::class, $userAnswersCheck[0]);

        $userAnswersCheck = $repository->getByIds($userAnswerIds);
        $this->assertEquals(3, count($userAnswersCheck));
    }

    public function testFind()
    {
        $userAnswers = factory(UserAnswer::class, 3)->create();
        $userAnswerIds = $userAnswers->pluck('id')->toArray();

        /** @var  \App\Repositories\UserAnswerRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\UserAnswerRepositoryInterface::class);
        $this->assertNotNull($repository);

        $userAnswerCheck = $repository->find($userAnswerIds[0]);
        $this->assertEquals($userAnswerIds[0], $userAnswerCheck->id);
    }

    public function testCreate()
    {
        $userAnswerData = factory(UserAnswer::class)->make();

        /** @var  \App\Repositories\UserAnswerRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\UserAnswerRepositoryInterface::class);
        $this->assertNotNull($repository);

        $userAnswerCheck = $repository->create($userAnswerData->toArray());
        $this->assertNotNull($userAnswerCheck);
    }

    public function testUpdate()
    {
        $userAnswerData = factory(UserAnswer::class)->create();

        /** @var  \App\Repositories\UserAnswerRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\UserAnswerRepositoryInterface::class);
        $this->assertNotNull($repository);

        $userAnswerCheck = $repository->update($userAnswerData, $userAnswerData->toArray());
        $this->assertNotNull($userAnswerCheck);
    }

    public function testDelete()
    {
        $userAnswerData = factory(UserAnswer::class)->create();

        /** @var  \App\Repositories\UserAnswerRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\UserAnswerRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($userAnswerData);

        $userAnswerCheck = $repository->find($userAnswerData->id);
        $this->assertNull($userAnswerCheck);
    }

}
