<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JawabanRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && (auth()->user()->isUstadz() || auth()->user()->isAdmin());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'jawaban' => 'required',
        ];
    }
}
