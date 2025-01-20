<?php

namespace App\Jobs;

use App\Models\HakModels\User;
use App\Notifications\BirthdayNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class NotifyUserBirthday implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $today = now()->format('m-d');
        $users = User::whereRaw('DATE_FORMAT(date_of_birth, "%m-%d") = ?', [$today])->get();

        foreach ($users as $user) {
            Notification::send($user, new BirthdayNotification());
        }
    }
}