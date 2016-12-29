<?php

namespace App\Listeners;

use App\Events\ShowInformasi;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShowInformasiListener
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
     * @param  ShowInformasi  $event
     * @return void
     */
    public function handle(ShowInformasi $event)
    {
        //
    }
}
