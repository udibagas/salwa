<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class KajianNewRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() || auth()->guard('api')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'tema' => 'required',
			'description' => 'required',
			'img' => 'image',
			'ustadz_id' => 'required|integer',
			'waktu' => 'required',
			'pekan' => 'required_if:rutin,1',
			'lokasi_id' => 'required|integer',
			'area_id' => 'required|integer',
			'tempat' => 'required',
			'lat' => 'numeric',
			'long' => 'numeric',
			'peserta' => 'required',
        ];
    }
}
