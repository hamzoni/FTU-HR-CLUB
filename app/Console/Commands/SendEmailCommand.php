<?php

namespace App\Console\Commands;

use App\Jobs\SendEmailAfterRegistering;
use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;

class SendEmailCommand extends Command
{
    use DispatchesJobs;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hrc:send-email {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email = $this->argument('email');

        $this->dispatchNow(new SendEmailAfterRegistering($email, $email));

        $this->info('Send email to '.$email);
    }
}
