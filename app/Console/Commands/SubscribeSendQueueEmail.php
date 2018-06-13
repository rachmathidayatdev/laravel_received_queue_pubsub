<?php

namespace App\Console\Commands;

use App\Mail\TestingMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class SubscribeSendQueueEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SubscribeSendQueueEmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Worker Untuk Send Queue Email Pake Redis Subscribe';

    /**
     * Create a new command instance.
     *
     * @return void
     */
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
        Redis::subscribe(['send_email'], function ($message) {
            $messageConvert = json_decode($message);

            //send email
            Mail::to($messageConvert->email)->send(new TestingMail());
            //sampai sini

            $this->info("Sending email to {$message}");
        });
    }
}
