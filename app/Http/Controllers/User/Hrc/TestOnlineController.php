<?php

namespace App\Http\Controllers\User\Hrc;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Hrc\AnswerTestOnlineRequest;
use App\Models\User;
use App\Models\UserTest;
use App\Services\Production\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestOnlineController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function start()
    {
        /** @var User $user */
        $user = $this->userService->getUser();

        /*
         * Authorize
         */
        $this->authorize('startTestOnlineExam', $user);

        /*
         * Dispatch
         */
        /** @var UserTest $userTest */
        $userTest = $user->userTest()->create([]);

        return response()->json([
            'status' => true,
            'endTime' => with(new \Carbon\Carbon())->setTimestamp($userTest->created_at->getTimestamp() + 60 * 15)->getTimestamp() * 1000
        ]);
    }

    public function answer(AnswerTestOnlineRequest $request)
    {
        /** @var User $user */
        $user = $this->userService->getUser();

        /*
         * Authorize
         */
        $this->authorize('answerTestOnlineQuestion', $user);

        /*
         * Dispatch
         */
        $user->userAnswers()->updateOrCreate([
            'question_id' => $request->get('question_id'),
        ], [
            'answer' => $request->get('answer')
        ]);

        return response()->json([
            'status' => true
        ]);
    }

    public function submit(Request $request)
    {
        /** @var User $user */
        $user = $this->userService->getUser();

        /*
         * Authorize
         */
        $this->authorize('submitTestOnline', $user);

        /*
         * Dispatch
         */
        $user->userTest->city = $request->get('city');
        $user->userTest->submitted_at = new Carbon();
        $user->userTest->save();

        return response()->json([
            'status' => true
        ]);
    }

    public function updateCity(Request $request)
    {
        /** @var User $user */
        $user = $this->userService->getUser();

        /*
         * Authorize
         */
        $this->authorize('updateCity', $user);

        /*
         * Dispatch
         */
        $user->userTest->city = $request->get('city');
        $user->userTest->save();

        return response()->json([
            'status' => true
        ]);
    }
}