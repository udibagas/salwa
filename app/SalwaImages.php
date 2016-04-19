<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalwaImages extends Model
{
    protected $table = 'salwaimages';

	protected $primaryKey = 'id_salwaimages';

	protected $dates = ['created', 'updated'];
}
