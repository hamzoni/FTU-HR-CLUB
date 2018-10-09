<?php

namespace App\Http\Controllers\User\Hrc;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Hrc\SubmitLetterRequest;
use App\Models\Letter;
use App\Services\Production\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LetterController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $letter = null;
        if($request->input('story')){
            $letter = $this->getLetter($request->input('story'));
        }
        return view('pages.user.home.letter', ['letter' => $letter]);
    }
	
	public function submitLetter(SubmitLetterRequest $request){
		$letter = new Letter();
        $letter->content = htmlspecialchars($request->input('content'));
        if($letter->save()){
            return response(['result' => $letter]);
        }
        return response(['result' => 'error'], 400);
	}

    public function getMyLetterContent(){
        return response(['result' => $this->getMyLetter()]);
    }

    public function getRandomLetter(){
        $letter = Letter::inRandomOrder()->first();
        return response(['result' => $letter]);
    }

    public function getLetter($id){
        $letter = Letter::find($id);
        return $letter;
    }
}