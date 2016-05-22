<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class HadistRequest extends Request
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
			'judul'		=> 'required',
			'hadist'	=> 'required',
			'penjelasan'=> 'required',
			'group_id'	=> 'required',
        ];
    }
}
