<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
	protected $table = 'mib_positions';

    protected $dates = ['created', 'updated'];

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $primaryKey = 'position_id';

	protected $fillable = ['width', 'height', 'banner_type', 'createdby', 'updatedby'];

	public function banners()
	{
		return $this->belongsToMany('App\Banner', 'mib_banner_positions', 'position_id', 'banner_id');
	}

}
