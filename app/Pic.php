<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    protected $table = 'tb_pic';

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $dates = ['created', 'updated'];

	public function kajians()
	{
		return $this->hasMany('App\Kajian', 'kajian_pic_id', 'pic_id');
	}
}
