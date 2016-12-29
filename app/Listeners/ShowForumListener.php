<?php

namespace App\Listeners;

use App\Events\ShowForum;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShowForumListener
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
     * @param  ShowForum  $event
     * @return void
     */
    public function handle(ShowForum $event)
    {
        //
    }
}
