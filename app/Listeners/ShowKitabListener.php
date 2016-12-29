<?php

namespace App\Listeners;

use App\Events\ShowKitab;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShowKitabListener
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
     * @param  ShowKitab  $event
     * @return void
     */
    public function handle(ShowKitab $event)
    {
        //
    }
}
