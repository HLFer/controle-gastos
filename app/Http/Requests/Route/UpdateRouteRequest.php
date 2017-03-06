<?php

namespace finance\Http\Requests\Route;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRouteRequest extends FormRequest
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
            'days' => 'required|integer|min:1',
            'distance' => 'regex:/^\d+([,]\d{1,2})?$/',
            'altitude_gain' => 'regex:/^\d+([,]\d{1,2})?$/'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.max' => 'O nome deve possuir no máximo 255 catacteres',

            'days.required' => 'Quantidade de dias é ogrigatório',
            'days.integer' => 'Quantidade de dias inválida',
            'days.min' => 'Quantidade de dias inválida',

            'distance.regex' => 'Distancia inválida',

            'altitude_gain.regex' => 'Ganho de altitude inválido',

        ];
    }
}
