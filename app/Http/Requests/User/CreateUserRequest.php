<?php

namespace finance\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.max' => 'O nome deve possuir no máximo 255 catacteres',

            'email.required' => 'O email é obrigatório',
            'email.email' => 'O email é inválido',
            'email.max' => 'O email deve possuir no máximo 255 catacteres',
            'email.unique' => 'O email já está cadastrado',

            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A senha deve possuir no mínimo 6 catacteres',
            'password.confirmed' => 'As não conferem',
        ];
    }
}
