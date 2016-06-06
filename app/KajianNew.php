<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KajianNew extends Model
{
    protected $table = 'kajians';

	protected $appends = ['waktuParsed', 'cpParsed', 'latLong'];

	protected $fillable = [
		'tema', 'description', 'brosur', 'ustadz_id', 'pekan',
		'waktu', 'lokasi_id', 'area_id', 'position',
		'tempat', 'cp', 'peserta', 'user_id',
		'transkrip', 'audio', 'video', 'fawaid', 'file', 'rutin'
	];

	public function getWaktuParsedAttribute()
	{
		// print_r(json_decode($this->waktu));

		$return = '';
		$waktu = json_decode($this->waktu);

		if ($this->rutin)
		{
			foreach ($waktu as $hari => $jam) {
				$return .= 'Pekan: '.implode(json_decode($this->pekan), ',').'<br />';
				$return .= self::getDay($hari).': '.$jam->mulai.' - '.$jam->selesai.'<br />';
			}

		} else {

			$return .= $waktu->mulai.' - '.$waktu->selesai;

		}

		return $return;
	}

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'user_id');
	}

	public function ustadz()
	{
		return $this->belongsTo('App\Ustadz', 'ustadz_id', 'ustadz_id');
	}

	public function lokasi()
	{
		return $this->belongsTo('App\Lokasi', 'lokasi_id', 'id_lokasi');
	}

	public function area()
	{
		return $this->belongsTo('App\Area', 'area_id', 'id_area');
	}

	public function scopeTematik($query)
	{
		return $query->where('rutin', 0);
	}

	public function scopeRutin($query)
	{
		return $query->where('rutin', 1);
	}

	public static function getPesertaList()
	{
		return [
			'Umum' => 'Umum',
			'Ikhwan' => 'Ikhwan',
			'Akhwat' => 'Akhwat',
			'Anak-anak (Umum)' => 'Anak-anak (Umum)',
			'Anak-anak (Ikhwan)' => 'Anak-anak (Ikhwan)',
			'Anak-anak (Akhwat)' => 'Anak-anak (Akhwat)',
		];
	}

	public static function getDay($day = 999)
	{
		$days = [
			'Sun' => 'Ahad',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jum\'at',
			'Sat' => 'Sabtu'
		];

		return isset($days[$day]) ? $days[$day] : $days;
	}
}
