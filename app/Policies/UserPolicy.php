<?php

namespace App\Policies;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function updateInformation(User $user)
    {
        return true;
    }

    public function updatePersonality(User $user)
    {
        return !$user->information || ($user->information && !$user->information->personality);
    }

    public function startTestOnlineExam(User $user)
    {
        /*
         * 1. User have been submitting CV before 21 Nov.
         * 2. User only able to take test online exam once.
         */
        if ($user->userTest) {
            return false;
        }

        $information = $user->information;

        if (!$information) {
            return false;
        }

        $file = $information->cv;

        if (!$file) {
            return false;
        }

        $date = new Carbon();
        $date = $date->setDateTime(2017, 11, 14, 0, 0, 0);

        $timestamp = ($file->created_at) ? $file->created_at->getTimestamp() : null;

        if (!$timestamp) {
            return false;
        }

        if ($timestamp > $date->getTimestamp()) {
            return false;
        }

        return true;
    }

    public function answerTestOnlineQuestion(User $user)
    {
        if (!$user->userTest) {
            return false;
        }

        $startedTimestamp = $user->userTest->created_at->getTimestamp();
        $endedTimestamp = $startedTimestamp + 60 * 16; // 16 minutes
        $nowTimestamp = with(new Carbon)->getTimestamp();

        if ($nowTimestamp > $endedTimestamp) {
            return false;
        }

        return true;
    }

    public function submitTestOnline(User $user)
    {
        if (!$user->userTest) {
            return false;
        }

        if ($user->userTest->submitted_at)  {
            return false;
        }

        return true;
    }

    public function finishTestOnline(User $user)
    {
        if ($user->userTest && $user->userTest->submitted_at) {
            return true;
        }

        if (!$user->userTest) {
            return false;
        }

        $startedTimestamp = $user->userTest->created_at->getTimestamp();
        $endedTimestamp = $startedTimestamp + 60 * 16; // 16 minutes
        $nowTimestamp = with(new Carbon)->getTimestamp();

        if ($nowTimestamp > $endedTimestamp) {
            return true;
        }

        return false;
    }

    public function updateCity(User $user)
    {
        return $user->userTest;
    }
}
