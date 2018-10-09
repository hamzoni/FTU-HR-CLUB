<?php namespace App\Services\Production;

use \App\Services\PersonalityTestServiceInterface;
use Illuminate\Support\Collection;

class PersonalityTestService extends BaseService implements PersonalityTestServiceInterface
{
    /**
     * @inheritdoc
     */
    public function getListQuestions()
    {
        return new Collection(config('hrc.questions'));
    }
}
