<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
	protected $table = 'informasi';

	protected $primaryKey = 'informasi_id';

    protected $dates = ['created', 'updated'];

}
