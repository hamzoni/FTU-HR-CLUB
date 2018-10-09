<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BaseRequest;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentGroup;
use App\Models\CvResult;
use App\Repositories\ArticleRepositoryInterface;
use App\Http\Requests\Admin\ArticleRequest;
use App\Http\Requests\PaginationRequest;
use App\Repositories\ImageRepositoryInterface;
use App\Services\ArticleServiceInterface;
use App\Services\FileUploadServiceInterface;
use App\Services\ImageServiceInterface;
use Carbon\Carbon;
use App\Facades\StringHelper;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Requests\PaginationRequest $request
     *
     * @return \Response
     */
    public function index()
    {
        $cv = CvResult::where('status', 0)->get();
        echo 'CV available: '.$cv->count();
        $groupFields = [
            1 => 'general',
            2 => 'title',
            3 => 'target',
            4 => 'education',
            5 => 'social',
            6 => 'experience',
            7 => 'award',
            8 => 'skill',
            9 => 'ref',
            10 => 'present'
        ];
        $groups = CommentGroup::get();
        $comments = Comment::get();

        $template = 'emails.user.email_result_cv';
        foreach($cv as $user){
            $commentDataTotal = [];
            foreach($groups as $group){
                $groupComments = [];
                $field = $user->{$groupFields[$group->id]};

                if($field){
                    $commentData = preg_split('/,/', $field, -1, PREG_SPLIT_NO_EMPTY);
                }

                if(empty($commentData)) continue;

                foreach($commentData as $item){
                    if(!(int)$item) continue;
                    $itemData = $comments->where('id', $item)->where('group', $group->id)->first();
                    if($itemData){
                        $groupComments[] = $itemData;
                    }
                }
                $commentDataTotal[] = [
                    'title' =>  $group->name,
                    'guide' => $group->guide,
                    'comment' => $groupComments
                ];
            }
            $data = [
                'cv' => $user,
                'commentData' => $commentDataTotal
            ];

            Mail::send($template, $data, function ($m) use($user) {
                $m->to($user->email, $user->name)->subject('Kết quả Comment CV');
            });

            $user->status = 1;
            $user->save();
        }
    }
}
