<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'user_id');
	}

    public function post()
	{
		$map = [
			'video' 	=> 'App\Video',
			'artikel'	=> 'App\Artikel',
			'peduli'	=> 'App\Peduli',
			'informasi'	=> 'App\Informsi',
			'audio'		=> 'App\Mp3',
			'produk'	=> 'App\Produk'
		];

		return $this->belongsTo($map[$this->type], 'post_id', );
	}

    public function parent()
	{
		return $this->belongsTo('App\Comment', 'parent_id', 'id');
	}

	public function scopeArtikel($query)
	{
		return $query->where('type', 'artikel');
	}

	public function scopeVideo($query)
	{
		return $query->where('type', 'video');
	}

	public function scopeAudio($query)
	{
		return $query->where('type', 'audio');
	}

	public function scopeInformasi($query)
	{
		return $query->where('type', 'informasi');
	}

	public function scopePeduli($query)
	{
		return $query->where('type', 'peduli');
	}

	public function scopeProduk($query)
	{
		return $query->where('type', 'produk');
	}
}
