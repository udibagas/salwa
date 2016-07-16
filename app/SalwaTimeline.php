<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalwaTimeline extends Model
{
	protected $connection = 'mysql';

    public $table = 'salwa_timeline';

	public $dates = ['time'];

}
