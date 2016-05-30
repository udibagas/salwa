<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $table = 'postimages';

	protected $primaryKey = 'image_id';

	public $timestamps = false;

	protected $fillable = ['post_id', 'img_image', 'image_desc'];

	public function post()
	{
		return $this->belongsTo('App\Post', 'post_id', 'post_id');
	}
}
