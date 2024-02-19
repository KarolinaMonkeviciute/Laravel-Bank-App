<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:64',
            'surname' => 'required|string|min:3|max:64',
            'code' => 'required|unique:clients,code|size:11|regex:/[3-6][0-9]{2}[0,1][0-9][0-9]{2}[0-9]{4}/', 
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Pamiršote įvesti vardą',
            'name.string' => 'Vardas turi būti tekstinis',
            'name.min' => 'Vardas turi būti bent 3 simboliai',
            'name.max' => 'Vardas turi būti ne daugiau 64 simbolių',
            'surname.required' => 'Pamiršote įvesti pavardę',
            'surname.string' => 'Pavardė turi būti tekstinė',
            'surname.min' => 'Pavardė turi būti bent 3 simboliai',
            'surname.max' => 'Pavardė turi būti ne daugiau 64 simbolių',
            'code.required' => 'Pamiršote įvesti asmens kodą',
            'code.unique' => 'Klientas tokiu asmens kodu jau egzistuoja',
            'code.size' => 'Asmens kodą turi sudaryti 11 simoblių',
            'code.regex' => 'Asmens kodas neatitinka taisyklių',
        ];
    }
}
