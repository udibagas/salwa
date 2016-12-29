<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

	protected $dates = ['created', 'updated'];

	protected $primaryKey = 'buku_id';

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $fillable = [
		'judul', 'kd_judul', 'penulis', 'materi', 'file_pdf',
		'img_buku', 'createdby', 'updatedby', 'group_id'
	];

    protected $appends = ['url'];

    public function getUrlAttribute()
    {
        return '/kitab/'.$this->buku_id.'-'.str_slug($this->judul);
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
