<?php

namespace finance\Http\Requests\Customer;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateCustomerRequest extends FormRequest
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
            'email' => 'email|max:255|unique:customers,email,'.$this->customer,
            'document' => 'cpf|unique:customers,document,'.$this->customer,
            'birth_date' => 'data',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.max' => 'O nome deve possuir no máximo 255 catacteres',

            'email.email' => 'Email nválido',
            'email.max' => 'O email deve possuir no máximo 255 catacteres',
            'email.unique' => 'O email já está cadastrado',

            'document.cpf' => 'CPF inválido',
            'document.unique' => 'O CPF já está cadastrado',

            'birth_date' => 'Data inválida',
        ];
    }
}
