<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'description' => 'required|min:3',
            'price' => 'required|numeric',
            'amount' => 'required|numeric',
            'user_id'=>'required'
        ];
    }

    public function messages()
{
    return [
        'name.required' => 'O campo nome é obrigatório.',
        'name.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
        'description.required' => 'O campo descrição é obrigatório.',
        'description.min' => 'O campo descrição deve ter no mínimo 3 caracteres.',
        'price.required' => 'O campo preço é obrigatório.',
        'price.numeric' => 'O campo preço deve ser um valor numérico.',
        'amount.required' => 'O campo quantidade é obrigatório.',
        'amount.numeric' => 'O campo quantidade deve ser um valor numérico.',
        'user_id.required' => 'O campo ID do usuário é obrigatório.',
    ];
}

}
