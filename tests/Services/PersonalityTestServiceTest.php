<?php namespace Tests\Services;

use Tests\TestCase;

class PersonalityTestServiceTest extends TestCase
{

    public function testGetInstance()
    {
        /** @var  \App\Services\PersonalityTestServiceInterface $service */
        $service = \App::make(\App\Services\PersonalityTestServiceInterface::class);
        $this->assertNotNull($service);
    }

}
