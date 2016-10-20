<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KajianRequest extends Request
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
			'jam' => 'required',
			'tanggal' => 'required_if:rutin,0',
			'pekan' => 'required_if:rutin,1',
			'hari' => 'required_if:rutin,1',
			'lokasi_id' => 'required|integer',
			'area_id' => 'required|integer',
			'tempat' => 'required',
			'lat' => 'numeric',
			'long' => 'numeric',
			'peserta' => 'required',
            'img' => 'image'
        ];
    }
}
