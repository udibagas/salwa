<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
	protected $table = 'produk';

	protected $primaryKey = 'id_produk';

    protected $dates = ['created', 'updated'];

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $with = ['group'];

	protected $fillable = [
		'judul', 'kd_judul', 'penulis', 'penerbit',
		'sinopsis_kecil', 'sinopsis', 'img_buku', 'harga',
		'createdby', 'updatedby', 'group_id', 'img_buku'
	];

	protected $appends = ['url', 'title'];

    public function getUrlAttribute()
    {
        return '/produk/'.$this->id_produk.'-'.str_slug($this->judul);
    }

	public function getTitleAttribute()
    {
        return $this->judul;
    }

	public function group()
	{
		return $this->belongsTo('App\Group', 'group_id', 'group_id');
	}

	public function comments()
	{
		return $this->morphMany('App\Comment', 'commentable');
	}

}
