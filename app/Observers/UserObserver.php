<?php

namespace App\Observers;

use App\Jobs\SendEmailAfterRegistering;
use App\Models\User;
use Mail;

class UserObserver
{
    protected $user;
    protected $title = 'UVTN 2017 | Tạo tài khoản thành công';
    public function created(User $user)
    {
        $template = 'emails.user.email-after-registering';
        $this->user = $user;
        $data = [
            'name' => $user->name,
            'email' => $user->email,
        ];
        Mail::send($template, $data, function ($m) {
            $m->to($this->user->email, $this->user->name)->subject($this->title);
        });
        //dispatch(new SendEmailAfterRegistering($user->email, $user->email));
    }
}