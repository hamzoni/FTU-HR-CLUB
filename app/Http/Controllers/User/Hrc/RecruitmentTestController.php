<?php

namespace App\Http\Controllers\User\Hrc;

use App\Http\Controllers\Controller;
use App\Models\Letter;
use App\Models\RecruitmentQuestion;
use App\Models\UserRecruitmentTest;
use App\Services\Production\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RecruitmentTestController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $user = $this->userService->getUser();

        $question = RecruitmentQuestion::with(['answers'])->get();

        $group1 = $question->filter(function ($item, $key) {
            return $item->section == 1;
        });
        $section1 = [];
        for ($i = 1; $i <= 8; $i++) {
            $section1[] = $group1->where('group', $i)->random(1);
        }

        $group2 = $question->filter(function ($item, $key) {
            return $item->section == 2;
        });
        $section2 = [];
        for ($i = 9; $i <= 16; $i++) {
            $section2[] = $group2->where('group', $i)->random(1);
        }

        $group3 = $question->filter(function ($item, $key) {
            return $item->section == 3;
        });
        $section3 = [];
        for ($i = 17; $i <= 24; $i++) {
            $section3[] = $group3->where('group', $i)->random(1);
        }

        $group4 = $question->filter(function ($item, $key) {
            return $item->section == 4;
        });
        $section4 = [];
        for ($i = 25; $i <= 32; $i++) {
            $section4[] = $group4->where('group', $i)->random(1);
        }

        $answerLetter = ['A', 'B', 'C', 'D', 'E'];

        $hasTest = UserRecruitmentTest::where('user_id', $user->id)->count();

        return view('pages.user.home.recruitment-test', compact('section1', 'section2', 'section3', 'section4', 'answerLetter', 'hasTest'));
    }

    public function makeTest(Request $request){
        $user = $this->userService->getUser();
        $test = new UserRecruitmentTest();
        $test->user_id = $user->id;
        $test->save();
    }

    public function submitTest(Request $request)
    {
        $user = $this->userService->getUser();

        $data = $request->input('result');

        if ($request->input('section') != 5) {

            $result = [];
            $questionList = [];
            if (!empty($data)) {
                foreach ($data as $answer) {
                    $questionId = str_replace(['answer_for_', '[]'], '', $answer['name']);
                    if (!isset($result[$questionId])) {
                        $result[$questionId] = [$answer['value']];
                        $questionList[] = $questionId;
                    } else {
                        $result[$questionId][] = $answer['value'];
                    }
                }
            }
            $score = 0;
            if (!empty($questionList)) {
                $question = RecruitmentQuestion::with(['answers'])->whereIn('id', $questionList)->get();
                foreach ($question as $item) {
                    $correctAnswer = $item->answers->where('is_correct', 1)->pluck('id')->all();
                    $selectedAnswer = isset($result[$item->id]) ? $result[$item->id] : [];
                    if (empty(array_diff($correctAnswer, $selectedAnswer))) {
                        $score += 1;
                    }
                }
            }
        }

        $test = UserRecruitmentTest::where('user_id', $user->id)->first();
        if ($request->input('section') != 5) {
            if (!$test->{'section' . $request->input('section') . '_result'}) {
                $test->{'section' . $request->input('section') . '_result'} = serialize($result);
                $test->{'section' . $request->input('section') . '_score'} = $score;
                $test->user_id = $user->id;
                $test->total_score = $test->total_score + $score;
                $test->save();
            }
        } else {
            if (!$test->final_question) {
                $test->final_question = $data[0]['value'];
                $test->user_id = $user->id;
                $test->save();
            }
        }

        return response(['result' => $request->all()]);
    }

    public function getMyLetterContent()
    {
        return response(['result' => $this->getMyLetter()]);
    }

    public function getRandomLetter()
    {
        $letter = Letter::inRandomOrder()->first();
        return response(['result' => $letter]);
    }

    public function getMyLetter()
    {
        $user = $this->userService->getUser();
        $letter = Letter::where('user_id', $user->id)->first();
        return $letter;
    }
}