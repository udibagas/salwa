<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

	protected $primaryKey = 'user_id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	protected $appends = ['role'];

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	public function forums()
	{
		return $this->hasMany('App\Forum', 'user_id', 'user_id');
	}

	public function pertanyaans()
	{
		return $this->hasMany('App\Pertanyaan', 'user_id', 'user_id');
	}

	public function posts()
	{
		return $this->hasMany('App\Post', 'user_id', 'user_id');
	}

	public function scopeActive($query)
	{
		return $query->where('active', 'Y');
	}

	public static function roleList($index = 9999)
	{
		$list = [
			null	=> '- Pilih Role -',
			1		=> 'Admin',
			2		=> 'Staff',
			3		=> 'Ustadz',
			4		=> 'Aktualita',
			5		=> 'Member'
		];

		return isset($list[$index]) ? $list[$index] : $list;
	}

	public function getRoleAttribute()
    {
        return self::roleList($this->user_status);
    }

}
