<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformasiFile extends Model
{
    protected $table = 'informasifile';

	public $timestamps = false;

	protected $primaryKey = 'file_id';

	protected $fillable = ['file_upload', 'tipe', 'informasi_id'];

	public function informasi()
	{
		return $this->belongsTo('App\Informasi', 'informasi_id', 'informasi_id');
	}

	public function scopeImage($query)
	{
		return $query->whereIn('tipe', ['png', 'jpg', 'jpeg', 'bmp', 'gif']);
	}

	public function scopeDokumen($query)
	{
		return $query->whereIn('tipe', ['doc', 'docx', 'xls', 'xlsx', 'pdf', 'ods', 'zip', 'odt']);
	}
}
