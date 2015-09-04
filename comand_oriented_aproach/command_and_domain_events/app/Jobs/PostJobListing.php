<?php

namespace App\Jobs;

use App\Events\JobWasPostedEvent;
use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Logging\Log;

/**
 * Class PostJobListing
 * @package App\Jobs
 */
class PostJobListing extends Job implements SelfHandling
{
    /**
     * @var
     */
    public $title;
    /**
     * @var
     */
    public $description;

    /**
     * @var Dispatcher
     */
    private $event;

    /**
     * Create a new job instance.
     * @param $title
     * @param $description
     * @param Dispatcher $event
     */
    public function __construct($title, $description, Dispatcher $event)
    {
        $this->title = $title;
        $this->description = $description;
        $this->event = $event;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $job = new \App\Job();
        $job->title = $this->title;
        $job->description = $this->description;
        $job->save();

        $this->event->fire(new JobWasPostedEvent());
        return $this;
    }
}
