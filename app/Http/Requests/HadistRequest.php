<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;
use Auth;

class HadistRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && Auth::user()->user_status == User::ROLE_ADMIN;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'judul'		=> 'required',
			'hadist'	=> 'required',
			'penjelasan'=> 'required',
			'group_id'	=> 'required',
        ];
    }
}
