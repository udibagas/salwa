<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';

	protected $fillable = [
		'judul', 'isi', 'terjemah', 'jenis', 'gambar', 'file', 'user_id', 'ustadz_id'
	];

	public function kategori()
    {
    	return $this->belongsToMany('App\Kategori', 'post_kategori', 'post_id', 'kategori_id');
    }

	public function slug()
    {
    	return $this->belongsToMany('App\Slug', 'post_slug', 'post_id', 'slug_id');
    }
}
