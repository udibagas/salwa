<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Murottal extends Model
{
	protected $table = 'murotal';
	
    protected $dates = ['created', 'updated'];

	protected $primaryKey = 'murotal_id';
}
