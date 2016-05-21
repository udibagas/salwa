<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ustadz extends Model
{
    protected $table = 'tb_ustadz';

	protected $dates = ['created', 'updated'];

	protected $primaryKey = 'ustadz_id';

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $fillable = [
		'ustadz_name', 'ustadz_address', 'ustadz_phone',
		'ustadz_gender', 'ustadz_status', 'createdby', 'updatedby'
	];
}
