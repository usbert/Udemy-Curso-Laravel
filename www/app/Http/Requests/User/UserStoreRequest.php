<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'string|required',
            'email' => 'email|required',
            'password' => 'string|required',
            'term' => 'accepted'
        ];
    }

    public function messages()
    {
        return [
            'string' => 'Este campo precisa ser uma string',
            'required' => 'Este campo é obrigatório',
            'password' => 'Este campo deve ser um e-mail',
            'accepted' => 'Aceite o termo'
        ];
    }
}

  