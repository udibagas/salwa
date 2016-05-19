<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;
use Auth;

class VideoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && Auth::user()->user_status == User::ROLE_ADMIN;
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
