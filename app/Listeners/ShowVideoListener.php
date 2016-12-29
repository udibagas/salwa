<?php

namespace App\Listeners;

use App\Events\ShowVideo;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShowVideoListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ShowVideo  $event
     * @return void
     */
    public function handle(ShowVideo $event)
    {
        $video = $event->video;
        $video->dilihat += 1;
        $video->save();
    }
}
