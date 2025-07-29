<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class EmailTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:email-test {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');

        try {
            Mail::raw('This is an email test from Laravel on VPS!', function ($message) use ($email) {
                $message->to($email)
                    ->subject('Email Test Laravel');
            });

            $this->info('Email was successfully sent to ' . $email);
        } catch (\Exception $e) {
            $this->error('Failed to send an email: ' . $e->getMessage());
        }
    }
}
