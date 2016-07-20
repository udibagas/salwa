<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forums';

	protected $primaryKey = 'forum_id';

	protected $dates = ['created', 'updated', 'date'];

	protected $fillable = [
		'user_id', 'title', 'group_id', 'createdby',
		'updatedby', 'date', 'title_code', 'status', 'close'
	];

	public $appends = ['img'];

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $with = ['user', 'group'];

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
		return $this->hasMany('App\Post', 'forum_id', 'forum_id');
	}

	public function scopeActive($query)
	{
		return $query->where('status', 'a');
	}

	public function scopeNotActive($query)
	{
		return $query->where('status', 'b');
	}

	public function scopeClose($query)
	{
		return $query->where('close', 'Y');
	}

	public function scopeOpen($query)
	{
		return $query->where('close', 'N');
	}

	public function getImgAttribute($value)
	{
		// if ($this->posts->count() && $this->posts()->first()->images->count()) {
		// 	return 'http://www.salamdakwah.com/'.$this->posts()->first()->images()->first()->img_image;
		// }

		return 'http://www.salamdakwah.com/images/salwa-forum.jpg';
	}
}
