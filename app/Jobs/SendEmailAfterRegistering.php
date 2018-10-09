<?php

namespace App\Jobs;

use App\Services\MailServiceInterface;

class SendEmailAfterRegistering
{
    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $name;

    /**
     * SendEmailAfterRegistering constructor.
     * @param $email
     * @param string $name
     */
    public function __construct($email, $name)
    {
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * @param MailServiceInterface $mailService
     */
    public function handle(MailServiceInterface $mailService)
    {
        $title = 'UVTN 2017 | Tạo tài khoản thành công';

        $from = [
            'name' => 'Ứng viên Tài năng 2017',
            'address' => 'uvtn@hrc.com.vn',
        ];

        $to = [
            'name' => $this->name,
            'address' => $this->email,
        ];

        $template = 'emails.user.email-after-registering';
        $data = [
            'name' => $this->name,
            'email' => $this->email
        ];

        $mailService->sendMail($title, $from, $to, $template, $data);
    }
}
