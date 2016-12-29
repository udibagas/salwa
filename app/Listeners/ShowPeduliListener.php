<?php

namespace App\Listeners;

use App\Events\ShowPeduli;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShowPeduliListener
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
     * @param  ShowPeduli  $event
     * @return void
     */
    public function handle(ShowPeduli $event)
    {
        //
    }
}
