<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ForumRequest extends Request
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
            'group_id'	=> 'required',
			'title'		=> 'required|min:3',
			'img.*'		=> 'image',
			'description'	=> 'required|min:3',
        ];
    }
}
