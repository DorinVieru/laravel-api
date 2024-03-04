<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50|min:2',
        ];
    }

    // FUNZIONE CHE RESTITUISCE I MESSAGGI PERSONALIZZATI PER GLI ERRORI
    public function messages()
    {
        return [
            'name.required' => 'Il nome è obbligatorio.',
            'name.max' => 'Il nome deve contere al massimo 50 caratteri.',
            'name.min' => 'Il nome deve contere almeno 2 caratteri.',
        ];
    }
}
