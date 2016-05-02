<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

	protected $dates = ['created', 'updated'];

	protected $primaryKey = 'buku_id';
}
