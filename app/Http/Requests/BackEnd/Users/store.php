<?php

namespace App\Http\Requests\BackEnd\Users;

use Illuminate\Foundation\Http\FormRequest;

class store extends FormRequest
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
            'name' => [ 'required','string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'group' => ['required','in:group,owner,admin,user'],
            'password' => ['required', 'string', 'min:8'],
            'image' => ['image','max:3000'],
            'gender'=>['required','in:male,female'],

        ];
    }
}
