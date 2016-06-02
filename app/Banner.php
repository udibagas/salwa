<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	protected $table = 'mib_banner_positions';

    protected $dates = ['created', 'updated'];

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $primaryKey = 'banner_id';

	protected $fillable = ['img_banner', 'url', 'createdby', 'updatedby', 'group_id'];

	protected $with = ['group'];

	public function group()
	{
		return $this->belongsTo('App\Group', 'group_id', 'group_id');
	}

}
