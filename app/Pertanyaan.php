<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';

	protected $primaryKey = 'pertanyaan_id';

	protected $dates = ['created', 'updated', 'tgl_tanya', 'tgl_jawab'];

	protected $fillable = [
		'judul_pertanyaan', 'ket_pertanyaan', 'jawaban', 'dijawab_oleh', 'status',
		'tgl_tanya', 'tgl_jawab', 'user_id', 'kd_judul', 'daerah_asal', 'createdby', 'updatedby'
	];

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

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

	public function scopeDijawab($query)
	{
		return $query->where('jawaban', '!=', 'NULL');
	}
}
