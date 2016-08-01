<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MurottalRequest extends Request
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
        $rules['POST'] = [
            'nama_surat'	=> 'required',
			'group_id'		=> 'required',
			'file'			=> 'mimetypes:audio/mpeg',
        ];

        $rules['PUT'] = [
            'nama_surat'	=> 'required',
			'group_id'		=> 'required',
			'file'			=> 'mimes:mp3',
        ];

		return $rules[$this->method];
    }
}
