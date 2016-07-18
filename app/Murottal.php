<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Murottal extends Model
{
	protected $table = 'murotal';

    protected $dates = ['created', 'updated'];

	protected $primaryKey = 'murotal_id';

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $with = ['group'];

	protected $fillable = [
		'nama_surat', 'kd_nama_surat', 'file_mp3',
		'group_id', 'createdby', 'updatedby', 'keterangan'
	];

	public function group()
	{
		return $this->belongsTo('App\Group', 'group_id', 'group_id');
	}

	public function comments()
	{
		return $this->morphMany('App\Comment', 'commentable');
	}
}
