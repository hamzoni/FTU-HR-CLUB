<?php namespace App\Services;

use Illuminate\Support\Collection;

interface PersonalityTestServiceInterface extends BaseServiceInterface
{
    /**
     * @return Collection
     */
    public function getListQuestions();
}