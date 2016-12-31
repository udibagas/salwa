<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\NewComment' => [
            'App\Listeners\SendNewCommentNotification',
        ],
        'App\Events\CommentApproved' => [
            'App\Listeners\SendCommentApprovedNotification',
        ],
        'App\Events\NewForum' => [
            'App\Listeners\SendNewForumNotification',
        ],
        'App\Events\ForumApproved' => [
            'App\Listeners\SendForumApprovedNotification',
        ],
        'App\Events\NewPost' => [
            'App\Listeners\SendNewPostNotification',
        ],
        'App\Events\NewArtikel' => [
            'App\Listeners\SendNewArtikelNotification',
        ],
        'App\Events\NewVideo' => [
            'App\Listeners\SendNewVideoNotification',
        ],
        'App\Events\NewInformasi' => [
            'App\Listeners\SendNewInformasiNotification',
        ],
        'App\Events\NewPeduli' => [
            'App\Listeners\SendNewPeduliNotification',
        ],
        'App\Events\NewAudio' => [
            'App\Listeners\SendNewAudioNotification',
        ],
        'App\Events\NewPertanyaan' => [
            'App\Listeners\SendNewPertanyaanNotification',
        ],
        'App\Events\PertanyaanAnswered' => [
            'App\Listeners\SendPertanyaanAnsweredNotification',
        ],
        'App\Events\NewKitab' => [
            'App\Listeners\SendNewKitabNotification',
        ],
        'App\Events\NewImage' => [
            'App\Listeners\SendNewImageNotification',
        ],
        'App\Events\NewHadist' => [
            'App\Listeners\SendNewHadistNotification',
        ],
        'App\Events\NewProduct' => [
            'App\Listeners\SendNewProductNotification',
        ],
        'App\Events\NewKajian' => [
            'App\Listeners\SendNewKajianNotification',
        ],
        'App\Events\ShowArtikel' => [
            'App\Listeners\ShowArtikelListener',
        ],
        'App\Events\ShowVideo' => [
            'App\Listeners\ShowVideoListener',
        ],
        'App\Events\ShowPeduli' => [
            'App\Listeners\ShowPeduliListener',
        ],
        'App\Events\ShowInformasi' => [
            'App\Listeners\ShowInformasiListener',
        ],
        'App\Events\ShowHadist' => [
            'App\Listeners\ShowHadistListener',
        ],
        'App\Events\ShowAudio' => [
            'App\Listeners\ShowAudioListener',
        ],
        'App\Events\ShowPertanyaan' => [
            'App\Listeners\ShowPertanyaanListener',
        ],
        'App\Events\ShowForum' => [
            'App\Listeners\ShowForumListener',
        ],
        'App\Events\ShowImage' => [
            'App\Listeners\ShowImageListener',
        ],
        'App\Events\ShowKitab' => [
            'App\Listeners\ShowKitabListener',
        ],
        'App\Events\ShowKajian' => [
            'App\Listeners\ShowKajianListener',
        ],
        'App\Events\ShowProduct' => [
            'App\Listeners\ShowProductListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    // public function boot(DispatcherContract $events)
    // {
    //     // parent::boot($events);
    //
    //     //
    // }
}
