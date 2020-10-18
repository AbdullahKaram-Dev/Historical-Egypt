<?php

namespace App\Http\Requests\BackEnd\Pharaonics;

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
            'title'=>['required' ,'between:5,190','string'],
            'post'=>['required','between:20,1000','string'],
            'img'=> ['image','required'],
        ];
    }


    public function messages(){
            return [
            'title.required'=>__('messages.title.required'),
            'post.required'=>__('messages.post.required'),
            'img.required'=>__('messages.img.required'),
                'title.between'=>__('messages.title.between'),

            ];
    }
}
