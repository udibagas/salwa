<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class VideoRequest extends Request
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
			'title'		=> 'required',
			'user_id'	=> 'required',
			// 'img'		=> 'required|image',
			'url_video_youtube'		=> 'required',
        ];
    }
}
