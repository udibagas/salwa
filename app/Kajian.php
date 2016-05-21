<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kajian extends Model
{
    protected $table = 'tb_kajian';

	protected $dates = ['created', 'updated', 'kajian_dates'];

	protected $primaryKey = 'kajian_id';

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $fillable = [
		'kajian_user_id', 'kajian_tema', 'kajian_ustadz_id', 'id_lokasi', 'id_area',
		'kajian_tempat', 'kajian_pic_id', 'kajian_pic_id2', 'img_kajian_photo',
		'jenis_kajian', 'setiap_hari', 'setiap_jam', 'setiap_tanggal', 'setiap_bulan',
		'kajian_status', 'kajian_dates', 'createdby', 'updatedby'
	];

	public function ustadz()
	{
		$this->belongsTo('App\Ustadz', 'ustadz_id', 'kajian_ustadz_id');
	}

	public function scopeToday($query)
	{
		return $query->whereRaw('DATE(kajian_dates) = '.date('Y-m-d'));
	}
}
