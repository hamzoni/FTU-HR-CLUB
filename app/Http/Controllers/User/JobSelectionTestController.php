<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseRequest;
use DB;


class JobSelectionTestController extends Controller
{
    public function index($type='', $suggest = '')
    {
        if($type && !in_array($type, ['artist', 'connector', 'logistician', 'entrepreneur'])){
            return redirect(route('jobSelectionTest'));
        }
        if($suggest && !in_array($suggest, ['imaginative', 'feeling', 'practical', 'thinking'])){
            return redirect(route('jobSelectionTest'));
        }

        return view('pages.user.jobselectiontest.index', [
            'type' => $type,
            'suggest' => $suggest,
        ]);
    }
    public function saveTestResult(BaseRequest $request)
    {
        if($request->email){
            DB::table('user_job_selection_test')->insert([
                'email' => $request->email,
                'test_result' => $request->result,
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Success'
            ]);
        }
        return response()->json([
            'status' => 501,
            'message' => 'Fail'
        ]);
    }
}
