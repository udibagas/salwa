<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	protected $table = 'banner';

	protected $fillable = ['name', 'url', 'active', 'img'];

	public function scopeActive($query)
	{
		return $query->where('active', 1);
	}

}
