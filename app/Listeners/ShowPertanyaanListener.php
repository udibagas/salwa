<?php

namespace App\Listeners;

use App\Events\ShowPertanyaan;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShowPertanyaanListener
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
     * @param  ShowPertanyaan  $event
     * @return void
     */
    public function handle(ShowPertanyaan $event)
    {
        //
    }
}
