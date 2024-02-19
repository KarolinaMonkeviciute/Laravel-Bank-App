<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'account_number' => 'unique:accounts,account_number',
            'client_id' => 'required|gt:0',
        ];
    }

    public function messages(): array
    {
        return [
            'account_number.unique' => 'Sąskaita tokiu numeriu jau egzistuoja',
            'client_id.gt' => 'Būtina pasirinkti klientą, kuriam priskirsite sąskaitą',
        ];
    }
}
