<?php

namespace App\Http\Controllers\User\Hrc;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserServiceInterface;

class DashboardController extends Controller
{
    /** @var UserServiceInterface  */
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return redirect()->route('dashboard.rules');
    }

    public function rules()
    {
        return view('pages.user.dashboard.rules');
    }

    public function personal()
    {
        /** @var User $user */
        $user = $this->userService->getUser();

        if ($user->information && $user->information->cv) {
            return view('pages.user.dashboard.personalView');
        } else {
            return view('pages.user.dashboard.personal');
        }
    }

    public function editPersonal()
    {
        return view('pages.user.dashboard.personalOutdate');
//        return view('pages.user.dashboard.personal');
    }

    public function evaluation()
    {
        /** @var User $user */
        $user = $this->userService->getUser();

        if ($user->can('updatePersonality', User::class)) {
            return view('pages.user.dashboard.evaluation');
        } else {
            return view('pages.user.dashboard.evaluation-result', [
                'personalityResult' => $user->information->personality,
                'personalityView' => 'pages.user.dashboard.personality.'.$user->information->personality
            ]);
        }
    }

    public function introduceMajor()
    {
        return view('pages.user.dashboard.introduceMajor');
    }

    public function testOnline()
    {
        /** @var User $user */
        $user = $this->userService->getUser();

        $startTestOnlineExam = \Gate::allows('startTestOnlineExam', $user);
        $answerTestOnlineQuestion = \Gate::allows('answerTestOnlineQuestion', $user);
        $finishTestOnline = \Gate::allows('finishTestOnline', $user);

        $userTest = $user->userTest;
        $endedTime = ($userTest) ? with(new \Carbon\Carbon())->setTimestamp($userTest->created_at->getTimestamp() + 60 * 15)->getTimestamp() * 1000 : null;

        return view('pages.user.dashboard.testOnline', [
            'startTestOnlineExam' => $startTestOnlineExam,
            'answerTestOnlineQuestion' => $answerTestOnlineQuestion,
            'finishTestOnline' => $finishTestOnline,
            'endedTime' => $endedTime
        ]);
    }
}