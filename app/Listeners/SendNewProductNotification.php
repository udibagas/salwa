<?php

namespace App\Listeners;

use App\Events\NewProduct;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewProductNotification;
use Notification;
use App\User;

class SendNewProductNotification implements ShouldQueue
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
     * @param  NewProduct  $event
     * @return void
     */
    public function handle(NewProduct $event)
    {
        Notification::send(User::active()->get(), new NewProductNotification($event->product));
    }
}
