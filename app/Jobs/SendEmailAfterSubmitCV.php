<?php

namespace App\Jobs;

use App\Services\MailServiceInterface;

class SendEmailAfterSubmitCV
{
    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $name;

    public function __construct($email, $name)
    {
        $this->email = $email;
        $this->name = $name;
    }

    public function handle(MailServiceInterface $mailService)
    {
        $title = 'UVTN 2017 | Đăng kí thành công';

        $from = [
            'name' => 'Ứng viên Tài năng 2017',
            'address' => 'uvtn@hrc.com.vn',
        ];

        $to = [
            'name' => $this->name,
            'address' => $this->email,
        ];

        $template = 'emails.user.email-after-submit-cv';
        $data = [
            'name' => $this->name,
            'email' => $this->email
        ];

        $mailService->sendMail($title, $from, $to, $template, $data);
    }
}