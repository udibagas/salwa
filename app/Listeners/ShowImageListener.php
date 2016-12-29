<?php

namespace App\Listeners;

use App\Events\ShowImage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShowImageListener
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
     * @param  ShowImage  $event
     * @return void
     */
    public function handle(ShowImage $event)
    {
        //
    }
}
