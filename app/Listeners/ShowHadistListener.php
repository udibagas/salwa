<?php

namespace App\Listeners;

use App\Events\ShowHadist;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShowHadistListener
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
     * @param  ShowHadist  $event
     * @return void
     */
    public function handle(ShowHadist $event)
    {
        $hadist = $event->hadist;
        $hadist->dilihat += 1;
        $hadist->save();
    }
}
