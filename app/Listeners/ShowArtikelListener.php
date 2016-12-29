<?php

namespace App\Listeners;

use App\Events\ShowArtikel;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShowArtikelListener
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
     * @param  ShowArtikel  $event
     * @return void
     */
    public function handle(ShowArtikel $event)
    {
        $artikel = $event->artikel;
        $artikel->dibaca += 1;
        $artikel->save();
    }
}
