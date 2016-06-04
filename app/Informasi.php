<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
	protected $table = 'informasi';

	protected $primaryKey = 'informasi_id';

    protected $dates = ['created', 'updated'];

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $with = ['user', 'group'];

	protected $fillable = [
		'judul', 'content', 'summary',
		'kd_judul', 'updatedby', 'tanggal',
		'createdby', 'group_id', 'img_gambar'
	];

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'user_id');
	}

	public function group()
	{
		return $this->belongsTo('App\Group', 'group_id', 'group_id');
	}

	public function files()
	{
		return $this->hasMany('App\InformasiFile', 'informasi_id', 'informasi_id');
	}

	public function images()
	{
		return $this->hasMany('App\InformasiFile', 'informasi_id', 'informasi_id', ['where' => 'tipe in ("jpg", "jpeg", "png", "gif", "bmp")']);
	}

	public function dokumens()
	{
		return $this->hasMany('App\InformasiFile', 'informasi_id', 'informasi_id', ['where' => 'tipe in ("doc", "docx", "xls", "xlsx", "pdf", "ods", "odt", "zip")']);
	}

	public function comments()
	{
		return $this->morphMany('App\Comment', 'commentable');
	}

}
