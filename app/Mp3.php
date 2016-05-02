<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mp3 extends Model
{
	protected $table = 'mp3_download';

    protected $dates = ['created', 'updated'];

	protected $primaryKey = 'mp3_download_id';
}
