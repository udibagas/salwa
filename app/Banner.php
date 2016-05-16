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

}
