<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forums';

	protected $primaryKey = 'forum_id';

	protected $dates = ['created', 'updated', 'date'];

	protected $fillable = ['user_id', 'title', 'group_id', 'createdby', 'updatedby', 'date', 'title_code'];

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'user_id');
	}

	public function group()
	{
		return $this->belongsTo('App\Group', 'group_id', 'group_id');
	}

	public function posts()
	{
		return $this->hasMany('App\Post', 'forum_id', 'forum_id', ['orderBy' => 'created ASC']);
	}

	public function post()
	{
		return $this->hasOne('App\Post', 'forum_id', 'forum_id', ['orderBy' => 'created ASC', 'where' => 'forum.user_id = posts.user_id']);
	}
}
