<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TafsirRequest extends Request
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
        return [
            'surah_id'		=> 'required',
			'from_ayah'		=> 'required',
			'to_ayah'		=> 'required',
			'tafsir'		=> 'required',
        ];
    }
}
