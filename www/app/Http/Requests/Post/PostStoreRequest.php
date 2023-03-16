<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    protected function prepareForValidation() {

        $url = $this->server('HTTP_REFERER');     
        $userID = explode('/', $url)[5];

        $this->merge([  
            'user_id' =>$userID,
        ]);
    }

    public function rules()
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'title' => 'string|required|unique:posts',
            'content' => 'string|required'
        ];
    }

    public function messages()
    {
        return [
            'string' => 'Este campo precisa ser uma string',
            'required' => 'Este campo é obrigatório',
        ];
    }
}
