<?php

namespace App\Listeners;

use App\Events\ShowKajian;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShowKajianListener
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
     * @param  ShowKajian  $event
     * @return void
     */
    public function handle(ShowKajian $event)
    {
        //
    }
}
