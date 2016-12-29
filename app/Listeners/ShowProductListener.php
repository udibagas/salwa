<?php

namespace App\Listeners;

use App\Events\ShowProduct;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShowProductListener
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
     * @param  ShowProduct  $event
     * @return void
     */
    public function handle(ShowProduct $event)
    {
        //
    }
}
