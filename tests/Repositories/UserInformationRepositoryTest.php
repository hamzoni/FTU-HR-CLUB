<?php namespace Tests\Repositories;

use App\Models\UserInformation;
use Tests\TestCase;

class UserInformationRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\UserInformationRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\UserInformationRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $userInformations = factory(UserInformation::class, 3)->create();
        $userInformationIds = $userInformations->pluck('id')->toArray();

        /** @var  \App\Repositories\UserInformationRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\UserInformationRepositoryInterface::class);
        $this->assertNotNull($repository);

        $userInformationsCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(UserInformation::class, $userInformationsCheck[0]);

        $userInformationsCheck = $repository->getByIds($userInformationIds);
        $this->assertEquals(3, count($userInformationsCheck));
    }

    public function testFind()
    {
        $userInformations = factory(UserInformation::class, 3)->create();
        $userInformationIds = $userInformations->pluck('id')->toArray();

        /** @var  \App\Repositories\UserInformationRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\UserInformationRepositoryInterface::class);
        $this->assertNotNull($repository);

        $userInformationCheck = $repository->find($userInformationIds[0]);
        $this->assertEquals($userInformationIds[0], $userInformationCheck->id);
    }

    public function testCreate()
    {
        $userInformationData = factory(UserInformation::class)->make();

        /** @var  \App\Repositories\UserInformationRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\UserInformationRepositoryInterface::class);
        $this->assertNotNull($repository);

        $userInformationCheck = $repository->create($userInformationData->toArray());
        $this->assertNotNull($userInformationCheck);
    }

    public function testUpdate()
    {
        $userInformationData = factory(UserInformation::class)->create();

        /** @var  \App\Repositories\UserInformationRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\UserInformationRepositoryInterface::class);
        $this->assertNotNull($repository);

        $userInformationCheck = $repository->update($userInformationData, $userInformationData->toArray());
        $this->assertNotNull($userInformationCheck);
    }

    public function testDelete()
    {
        $userInformationData = factory(UserInformation::class)->create();

        /** @var  \App\Repositories\UserInformationRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\UserInformationRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($userInformationData);

        $userInformationCheck = $repository->find($userInformationData->id);
        $this->assertNull($userInformationCheck);
    }

}
