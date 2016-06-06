<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    protected $table = 'tb_pic';

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $dates = ['created', 'updated'];

	protected $primaryKey = 'pic_id';

	protected $fillable = ['pic_name', 'pic_phone', 'pic_address', 'createdby', 'updatedby'];

	public function kajians()
	{
		return $this->hasMany('App\Kajian', 'kajian_pic_id', 'pic_id');
	}
}
