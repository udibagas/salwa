<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;
use Auth;

class UstadzRequest extends Request
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
            'ustadz_name'	=> 'required',
			'ustadz_gender'	=> 'required',
			'ustadz_status'	=> 'required',
			// 'ustadz_phone'	=> 'required',
        ];
    }
}
