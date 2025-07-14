<?php

namespace App\Listeners;

use App\Events\UserResetCode;
use App\Jobs\SendRestCodeEmailJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Event;

class SendResetCodeEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserResetCode $event): void
    {
        dispatch(new SendRestCodeEmailJob($event->code,$event->user));
    }
}
