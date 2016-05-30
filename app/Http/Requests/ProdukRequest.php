<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProdukRequest extends Request
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
            'group_id'	=> 'required',
			'judul'		=> 'required|min:3',
			'penulis'	=> 'required',
			'penerbit'	=> 'required',
			'sinopsis'	=> 'required',
			'img'		=> 'image',
			'harga'		=> 'required|numeric',
			// 'sinopsis_kecil'	=> 'required',
        ];
    }
}