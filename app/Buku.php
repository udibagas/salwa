<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

	protected $dates = ['created', 'updated'];

	protected $primaryKey = 'buku_id';

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $fillable = [
		'judul', 'kd_judul', 'penulis', 'materi', 'file_pdf',
		'img_buku', 'createdby', 'updatedby', 'group_id'
	];

	public function group()
	{
		return $this->belongsTo('App\Group', 'group_id', 'group_id');
	}
}
