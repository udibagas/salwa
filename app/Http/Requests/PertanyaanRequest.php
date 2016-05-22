<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PertanyaanRequest extends Request
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
            'judul_pertanyaan'	=> 'required',
            'daerah_asal'		=> 'required',
            'ket_pertanyaan'	=> 'required',
            'group_id'			=> 'required',
        ];
    }
}
