<?php

namespace App\Handlers\Events;

use App\Events\JobWasPosted;
use App\Events\JobWasPostedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class JobWasPostedHandler
{
    /**
     * Create the event handler.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  JobWasPostedEvent  $event
     * @return void
     */
    public function handle(JobWasPostedEvent $event)
    {
        dd($event);

        Log::info(static::class . ' fired');
    }
}
