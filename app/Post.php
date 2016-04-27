<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

	protected $primaryKey = 'post_id';

	protected $dates = ['created', 'updated'];

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'user_id');
	}

	public function forum()
	{
		return $this->belongsTo('App\Forum', 'forum_id', 'forum_id');
	}
}
