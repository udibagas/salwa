<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'tb_lokasi';

	protected $dates = ['created', 'updated'];

	protected $primaryKey = 'id_lokasi';

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $fillable = [
		'nama_lokasi', 'updatedby', 'createdby',
	];
}
