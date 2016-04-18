<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	protected $table = 'mib_banner_positions';

    protected $dates = ['created', 'updated'];

}
