<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'tb_area';

	protected $dates = ['created', 'updated'];

	protected $primaryKey = 'id_area';

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $fillable = [
		'nama_area', 'id_lokasi', 'updatedby', 'createdby',
	];

	public function lokasi()
	{
		return $this->belongsTo('App\Lokasi', 'id_lokasi', 'id_lokasi');
	}
}
