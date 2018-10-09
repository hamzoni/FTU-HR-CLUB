<?php namespace Tests\Repositories;

use App\Models\UserTest;
use Tests\TestCase;

class UserTestRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\UserTestRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\UserTestRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $userTests = factory(UserTest::class, 3)->create();
        $userTestIds = $userTests->pluck('id')->toArray();

        /** @var  \App\Repositories\UserTestRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\UserTestRepositoryInterface::class);
        $this->assertNotNull($repository);

        $userTestsCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(UserTest::class, $userTestsCheck[0]);

        $userTestsCheck = $repository->getByIds($userTestIds);
        $this->assertEquals(3, count($userTestsCheck));
    }

    public function testFind()
    {
        $userTests = factory(UserTest::class, 3)->create();
        $userTestIds = $userTests->pluck('id')->toArray();

        /** @var  \App\Repositories\UserTestRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\UserTestRepositoryInterface::class);
        $this->assertNotNull($repository);

        $userTestCheck = $repository->find($userTestIds[0]);
        $this->assertEquals($userTestIds[0], $userTestCheck->id);
    }

    public function testCreate()
    {
        $userTestData = factory(UserTest::class)->make();

        /** @var  \App\Repositories\UserTestRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\UserTestRepositoryInterface::class);
        $this->assertNotNull($repository);

        $userTestCheck = $repository->create($userTestData->toArray());
        $this->assertNotNull($userTestCheck);
    }

    public function testUpdate()
    {
        $userTestData = factory(UserTest::class)->create();

        /** @var  \App\Repositories\UserTestRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\UserTestRepositoryInterface::class);
        $this->assertNotNull($repository);

        $userTestCheck = $repository->update($userTestData, $userTestData->toArray());
        $this->assertNotNull($userTestCheck);
    }

    public function testDelete()
    {
        $userTestData = factory(UserTest::class)->create();

        /** @var  \App\Repositories\UserTestRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\UserTestRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($userTestData);

        $userTestCheck = $repository->find($userTestData->id);
        $this->assertNull($userTestCheck);
    }

}
