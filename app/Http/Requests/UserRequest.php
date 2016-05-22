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
        return auth()->check() && auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_name'	=> 'required|min:3',
			'name'		=> 'required|min:3',
			'email'		=> 'required|email',
			'active'	=> 'required',
			'img'		=> 'image',
			'user_status'	=> 'required',
			'jenis_kelamin'	=> 'required',
        ];
    }
}
