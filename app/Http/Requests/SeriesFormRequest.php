<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
            'nome' => ['required', 'min:3']
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo NOME é obrigatório',
            'nome.min' => 'O campo NOME precisa pelo menos :min caracteres'
        ];
    }
}
