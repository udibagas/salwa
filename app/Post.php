<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

	protected $primaryKey = 'post_id';

	protected $dates = ['created', 'updated', 'date'];

	protected $fillable = [
		'user_id', 'forum_id', 'description',
		'date', 'createdby', 'updatedby'
	];

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $with = ['user', 'forum'];

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'user_id');
	}

	public function forum()
	{
		return $this->belongsTo('App\Forum', 'forum_id', 'forum_id');
	}

	public function images()
	{
		return $this->hasMany('App\PostImage', 'post_id', 'post_id');
	}
}
