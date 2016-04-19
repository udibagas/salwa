<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';

	protected $primaryKey = 'pertanyaan_id';

	protected $dates = ['created', 'updated'];

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'user_id');
	}

	public function ustadz()
	{
		return $this->belongsTo('App\User', 'dijawab_oleh', 'user_id');
	}

	public function scopeShow($query)
	{
		return $query->where('status', 's');
	}
}
