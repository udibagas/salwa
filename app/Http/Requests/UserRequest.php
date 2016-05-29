<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
		$user = $this->route('user');

        return [
            'user_name'	=> 'required|min:3|unique:users,user_id,'.$user->user_id.',user_id',
			'name'		=> 'required|min:3',
			'email'		=> 'required|email|unique:users,user_id,'.$user->user_id.',user_id',
			'active'	=> 'required|in:Y,N',
			'img'		=> 'image',
			'password' 	=> 'min:6|confirmed',
			'user_status'	=> 'required|in:1,2,3,4,5',
			'jenis_kelamin'	=> 'required|in:p,w',
        ];
    }
}
