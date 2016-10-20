<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UstadzRequest extends Request
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
            'ustadz_name'	=> 'required',
			'ustadz_gender'	=> 'required',
			'ustadz_status'	=> 'required',
			// 'ustadz_phone'	=> 'required',
        ];
    }
}
