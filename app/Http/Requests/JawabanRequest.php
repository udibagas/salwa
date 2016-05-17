<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
use App\User;

class JawabanRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && Auth::user()->user_status == User::ROLE_USTADZ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'jawaban' => 'required',
        ];
    }
}
