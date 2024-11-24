<?php

namespace App\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }
    /*
    *Customize error messages
    */
    public function messages()
    {
        return [
            'email.required' => 'El email es requerido',
            'email.email' => 'El email debe ser una dirección de correo válida',
            'password.required' => 'el password es requerida',
            'password.min' => 'el password debe tener al menos 8 caracteres',
        ];
    }
    /**
     * Handling a validation error response
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Error de validación',
            'errors' => $validator->errors()
        ], 422));
    }
}
