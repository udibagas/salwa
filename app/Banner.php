<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	protected $table = 'mib_banners';

    protected $dates = ['created', 'updated'];

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $primaryKey = 'banner_id';

	protected $fillable = ['name', 'url', 'createdby', 'updatedby', 'group_id', 'active'];

	protected $with = ['group'];

	public function group()
	{
		return $this->belongsTo('App\Group', 'group_id', 'group_id');
	}

	public function positions()
	{
		return $this->belongsToMany('App\Position', 'mib_banner_positions', 'banner_id', 'position_id')->withPivot('img_banner', 'url');
	}

	public function scopeActive($query)
	{
		return $query->where('active', 2);
	}

}
