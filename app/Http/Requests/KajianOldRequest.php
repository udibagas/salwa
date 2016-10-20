<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KajianOldRequest extends Request
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
		// jenis kajian : 1=sekali waktu, 2=pekanan, 3=bulanan
        return [
			'img'	=> 'image',
			'id_lokasi'	=> 'required',
			'id_area'	=> 'required',
            'kajian_tema'	=> 'required',
			'kajian_tempat'	=> 'required',
			'jenis_kajian'	=> 'required|in:1,2,3',
			'setiap_hari'	=> 'required_if:jenis_kajian,2|in:0,1,2,3,4,5,6', // kalau jenis kajian pekanan
			'setiap_jam'	=> 'required_unless:jenis_kajian,1', // kalau jenis kajian pekanan atau bulanan
			'kajian_status'	=> 'required|in:A,N',
			'tanggal'		=> 'required_if:jenis_kajian,1', // kalau kajian sekali waktu
			'setiap_tgl'	=> 'required_if:jenis_kajian,3', // kalo jenis kajian bulanan
			'kajian_ustadz_id'	=> 'required',
        ];
    }
}
