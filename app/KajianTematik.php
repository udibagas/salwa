<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KajianTematik extends Model
{
    protected $table = 'kajian_tematik';

	protected $fillable = [
		'tema', 'description', 'brosur', 'ustadz_id',
		'waktu_mulai', 'waktu_selesai', 'lokasi_id', 'area_id',
		'tempat', 'lat', 'long', 'cp_ikhwan', 'cp_akhwat',
		'cp_ikhwan_phone', 'cp_akhwat_phone', 'jenis_peserta', 'user_id'
	];
}
