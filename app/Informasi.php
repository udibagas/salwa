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

}
