<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalwaImages extends Model
{
    protected $table = 'salwaimages';

	protected $primaryKey = 'id_salwaimages';

	protected $dates = ['created', 'updated', 'tanggal'];

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $fillable = ['judul', 'kd_judul', 'tanggal', 'img_images', 'group_id', 'createdby', 'updatedby'];

	public function group()
	{
		return $this->belongsTo('App\Group', 'group_id', 'group_id');
	}
}
