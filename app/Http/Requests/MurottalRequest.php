<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;
use Auth;

class MurottalRequest extends Request
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
        $rules['POST'] = [
            'nama_surat'	=> 'required',
			'group_id'		=> 'required',
			'file'			=> 'required|mimes:mp3',
        ];

        $rules['PUT'] = [
            'nama_surat'	=> 'required',
			'group_id'		=> 'required',
			'file'			=> 'mimes:mp3',
        ];

		return $rules[$this->method];
    }
}
