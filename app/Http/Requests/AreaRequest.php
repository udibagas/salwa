<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AreaRequest extends Request
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
            'nama_area'	=> 'required',
            'id_lokasi'	=> 'required',
        ];
    }
}
