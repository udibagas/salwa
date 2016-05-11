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

}
