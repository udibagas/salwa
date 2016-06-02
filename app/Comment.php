<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [
		'user_id', 'post_id', 'title', 'content',
		'star', 'type', 'parent_id', 'approved'
	];

	protected $with = ['user'];

    public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'user_id');
	}

	public static function typeList()
	{
		return [
			'artikel' 	=> 'artikel',
			'audio'		=> 'audio',
			'informasi' => 'informasi',
			'peduli' 	=> 'peduli',
			'produk'	=> 'produk',
			'video' 	=> 'video',
		];
	}

    public function post()
	{
		$map = [
			'video' 	=> ['class' => 'App\Video', 'pk' => 'video_id'] ,
			'artikel'	=> ['class' => 'App\Artikel', 'pk' => 'artikel_id'],
			'peduli'	=> ['class' => 'App\Peduli', 'pk' => 'peduli_id'],
			'informasi'	=> ['class' => 'App\Informsi', 'pk' => 'informasi_id'],
			'audio'		=> ['class' => 'App\Mp3', 'pk' => 'mp3_download_id'],
			'produk'	=> ['class' => 'App\Produk', 'pk' => 'id_produk']
		];

		return $this->belongsTo($map[$this->type['class']], 'post_id', $map[$this->type['pk']]);
	}

    public function parent()
	{
		return $this->belongsTo('App\Comment', 'parent_id', 'id');
	}

	public function scopeOfType($query, $type)
	{
		return $query->where('type', $type);
	}

	public function scopeApproved($query)
	{
		return $query->where('approved', 1);
	}

	public function scopeUnapproved($query)
	{
		return $query->where('approved', 0);
	}
}
