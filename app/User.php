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
        'name', 'email', 'password', 'user_name', 'user_status', 'jenis_kelamin',
		'active', 'createdby', 'updatedby', 'img_user', 'profile', 'last_login', 'login', 'ip'
    ];

	protected $primaryKey = 'user_id';

	protected $dates = ['created', 'updated', 'last_login'];

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

	const ROLE_ADMIN = 1;

	const ROLE_STAFF = 2;

	const ROLE_USTADZ = 3;

	const ROLE_AKTUALITA = 4;

	const ROLE_MEMBER = 5;

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

	public function videos()
	{
		return $this->hasMany('App\Video', 'user_id', 'user_id');
	}

	public function scopeActive($query)
	{
		return $query->where('active', 'Y');
	}

	public function scopeUstadz($query)
	{
		return $query->where('user_status', self::ROLE_USTADZ);
	}

	public static function roleList($index = 9999)
	{
		$list = [
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

	public function hasRole($role)
	{
		return $this->user_status == $role;
	}

	public function isAdmin()
	{
		return $this->user_status == self::ROLE_ADMIN;
	}

	public function isUstadz()
	{
		return $this->user_status == self::ROLE_USTADZ;
	}

	public function isStaff()
	{
		return $this->user_status == self::ROLE_STAFF;
	}

	public function isAktualita()
	{
		return $this->user_status == self::ROLE_AKTUALITA;
	}

	public function isMember()
	{
		return $this->user_status == self::ROLE_MEMBER;
	}

}
