<?php

namespace App\Listeners;

use App\Events\ShowAudio;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShowAudioListener
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
     * @param  ShowAudio  $event
     * @return void
     */
    public function handle(ShowAudio $event)
    {
        //
    }
}
