<?php

namespace finance\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;

class CreateTransactionRequest extends FormRequest
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
            'customer_id' => 'required|integer',
            'type' => 'required',
            'date' => 'data',
            'amount' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'customer_id.required' => 'O Clinete é obrigatório',
            'customer_id.integer' => 'Cliente inválido',

            'type.required' => 'O Tipo é obrigatório',

            'date' => 'Data inválida',

            'amount.required' => 'O valor é obrigatório',
            'amount.numeric' => 'Valor inválido',

        ];
    }
}
