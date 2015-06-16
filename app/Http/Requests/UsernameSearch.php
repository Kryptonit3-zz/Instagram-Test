<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsernameSearch extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|regex:/\A[\w\-\.]+\z/'
        ];
    }

    public function messages()
    {
        return [
            'username.regex' => 'Only letters, numbers, dashes, underscores and periods.'
        ];
    }
}
