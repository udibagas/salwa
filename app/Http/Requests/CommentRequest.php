<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends Request
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
            'title'		=> 'required',
			'content'	=> 'required',
			'star'		=> 'in:1,2,3,4,5',
			'commentable_type'	=> 'required|in:artikel,video,audio,informasi,peduli,produk',
			'commentable_id'	=> 'required'
        ];
    }
}
