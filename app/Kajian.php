<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kajian extends Model
{
    protected $table = 'tb_kajian';

	protected $dates = ['created', 'updated'];

	protected $primaryKey = 'kajian_id';

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $fillable = [
		// 'nama_lokasi', 'updatedby', 'createdby',
	];
}
