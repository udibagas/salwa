<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kajian extends Model
{
    protected $table = 'tb_kajian';

	protected $dates = ['created', 'updated'];

	protected $primaryKey = 'kajian_id';

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

    protected $appends = [
        'jenis',
        'pic_nama_ikhwan', 'pic_phone_ikhwan',
        'pic_nama_akhwat', 'pic_phone_akhwat'
    ];

    public function getPicNamaIkhwanAttribute()
    {
        return $this->pic1 ? $this->pic1->pic_name : '';
    }

    public function getPicPhoneIkhwanAttribute()
    {
        return $this->pic1 ? $this->pic1->pic_phone : '';
    }

    public function getPicNamaAkhwatAttribute()
    {
        return $this->pic2 ? $this->pic2->pic_name : '';
    }

    public function getPicPhoneAkhwatAttribute()
    {
        return $this->pic2 ? $this->pic2->pic_phone : '';
    }

	protected $fillable = [
		'kajian_user_id', 'kajian_tema', 'kajian_ustadz_id', 'id_lokasi', 'id_area',
		'kajian_tempat', 'kajian_pic_id', 'kajian_pic_id2', 'img_kajian_photo',
		'jenis_kajian', 'setiap_hari', 'setiap_jam', 'setiap_tanggal', 'setiap_bulan',
		'kajian_status', 'kajian_dates', 'createdby', 'updatedby'
	];

    public function getJenisAttribute()
    {
        return self::jenisKajianList($this->jenis_kajian);
    }

	public function ustadz()
	{
		return $this->belongsTo('App\Ustadz', 'kajian_ustadz_id', 'ustadz_id');
	}

	public function pic1()
	{
		return $this->belongsTo('App\Pic', 'kajian_pic_id', 'pic_id');
	}

	public function pic2()
	{
		return $this->belongsTo('App\Pic', 'kajian_pic_id2', 'pic_id');
	}

	public function lokasi()
	{
		return $this->belongsTo('App\Lokasi', 'id_lokasi', 'id_lokasi');
	}

	public function area()
	{
		return $this->belongsTo('App\Area', 'id_area', 'id_area');
	}

	public function scopeToday($query)
	{
		return $query->whereRaw('(jenis_kajian = 2 AND setiap_hari = (DAYOFWEEK(NOW()) - 1)) OR (jenis_kajian = 1 AND DATE(kajian_dates) = '.date('Y-m-d').')');
	}

	public static function jenisKajianList($index = 999)
	{
		$list = [
			'1'	=> 'Sekali Waktu',
			'2' => 'Pekanan',
			'3'	=> 'Bulanan'
		];

		return isset($list[$index]) ? $list[$index] : $list;
	}

	public static function getHari($index = 999)
	{
		$list = ['Ahad', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'];
		return isset($list[$index]) ? $list[$index] : $list;
	}

	public function scopeRutin($query)
	{
		return $query->where('jenis_kajian', 2);
	}

	public function scopeTematik($query)
	{
		return $query->where('jenis_kajian', 1);
	}

	public function scopeActive($query)
	{
		return $query->where('kajian_status', 'A');
	}

	public function comments()
	{
		return $this->morphMany('App\Comment', 'commentable');
	}
}
