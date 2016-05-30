<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

	protected $primaryKey = 'group_id';

	protected $dates = ['created', 'updated'];

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $fillable = ['group_name', 'type', 'description', 'img_group', 'createdby', 'updatedby'];

	public function forums()
	{
		return $this->hasMany('App\Forum', 'group_id', 'group_id');
	}

	public function artikels()
	{
		return $this->hasMany('App\Artikel', 'group_id', 'group_id');
	}

	public function informasis()
	{
		return $this->hasMany('App\Informasi', 'group_id', 'group_id');
	}

	public function pedulis()
	{
		return $this->hasMany('App\Peduli', 'group_id', 'group_id');
	}

	public function hadists()
	{
		return $this->hasMany('App\Hadist', 'group_id', 'group_id');
	}

	public function videos()
	{
		return $this->hasMany('App\Video', 'group_id', 'group_id');
	}

	public function audios()
	{
		return $this->hasMany('App\Mp3', 'group_id', 'group_id');
	}

	public function murottals()
	{
		return $this->hasMany('App\Murottal', 'group_id', 'group_id');
	}

	public function pertanyaans()
	{
		return $this->hasMany('App\Pertanyaan', 'group_id', 'group_id');
	}

	public function kitabs()
	{
		return $this->hasMany('App\Buku', 'group_id', 'group_id');
	}

	public function produks()
	{
		return $this->hasMany('App\Produk', 'group_id', 'group_id');
	}

	public function images()
	{
		return $this->hasMany('App\SalwaImages', 'group_id', 'group_id');
	}

	public function banners()
	{
		return $this->hasMany('App\Banner', 'group_id', 'group_id');
	}

	public function scopeForum($query)
	{
		return $query->where('type', 'forum');
	}

	public function scopeArtikel($query)
	{
		return $query->where('type', 'artikel');
	}

	public function scopeInformasi($query)
	{
		return $query->where('type', 'informasi');
	}

	public function scopePeduli($query)
	{
		return $query->where('type', 'peduli');
	}

	public function scopePertanyaan($query)
	{
		return $query->where('type', 'pertanyaan');
	}

	public function scopeHadist($query)
	{
		return $query->where('type', 'hadist');
	}

	public function scopeProduk($query)
	{
		return $query->where('type', 'produk');
	}

	public function scopeAudio($query)
	{
		return $query->where('type', 'audio');
	}

	public function scopeMurottal($query)
	{
		return $query->where('type', 'murottal');
	}

	public function scopeKitab($query)
	{
		return $query->where('type', 'kitab');
	}

	public function scopeImage($query)
	{
		return $query->where('type', 'image');
	}

	public function scopeBanner($query)
	{
		return $query->where('type', 'banner');
	}

	public static function typeList()
	{
		return [
			'artikel'	=> 'Artikel',
			'audio'		=> 'Audio',
			'banner'	=> 'Banner',
			'forum'		=> 'Forum',
			'hadist'	=> 'Hadist',
			'informasi'	=> 'Informasi',
			'image'		=> 'Image',
			'kitab'		=> 'Kitab',
			'murottal'	=> 'Murottal',
			'peduli'	=> 'Peduli',
			'pertanyaan'	=> 'Pertanyaan',
			'produk'	=> 'Produk',
			'video'		=> 'Video',
		];
	}
}
