<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

		$gate->before(function($user, $ability) {
			return $user->isAdmin();
		});

		$gate->define('update-post', function ($user, $post) {
            return $user->user_id === $post->user_id;
        });

		$gate->define('delete-post', function ($user, $post) {
            return $user->user_id === $post->user_id;
        });

		$gate->define('update-forum', function ($user, $forum) {
            return $user->user_id === $forum->user_id;
        });

		$gate->define('delete-forum', function ($user, $forum) {
            return $user->user_id === $forum->user_id;
        });

		$gate->define('update-pertanyaan', function ($user, $pertanyaan) {
            return $user->user_id === $pertanyaan->user_id;
        });

		$gate->define('delete-pertanyaan', function ($user, $pertanyaan) {

			$gate->before(function($user, $ability) {
				return $user->isUstadz();
			});

            return $user->user_id === $pertanyaan->user_id;
        });

		$gate->define('jawab-pertanyaan', function ($user, $pertanyaan) {
            return $user->isUstadz();
        });

		$gate->define('update-comment', function ($user, $comment) {
            return $user->user_id === $comment->user_id && !$comment->approved;
        });

		$gate->define('delete-comment', function ($user, $comment) {
            return $user->user_id === $comment->user_id;
        });

    }
}
