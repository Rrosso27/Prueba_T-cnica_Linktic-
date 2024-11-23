<?php

namespace App\Orders\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreOrdersRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'status' => 'required|string|max:30',
            'total_amount' => 'required|numeric|min:0',
            'payment_status' => 'required|string|max:30',
            'payment_method' => 'required|string|max:30',
            'shipping_address' => 'required|string|max:255',
            'billing_address' => 'nullable|string|max:255',
            'shipping_fee' => 'required|numeric|min:0',
            'discount' => 'required|numeric|min:0',
            'notes' => 'nullable|string|max:255',
            'product_id' => 'required|numeric|exists:products,id',
            'total_price' => 'required|numeric|min:0'
        ];
    }
    /*
    *Customize error messages
    */
    public function messages()
    {
        return [
            'status.required' => 'El estado es obligatorio.',
            'status.string' => 'El estado debe ser una cadena de texto.',
            'status.max' => 'El estado no puede tener más de 30 caracteres.',
            'total_amount.required' => 'El monto total es obligatorio.',
            'total_amount.numeric' => 'El monto total debe ser un número.',
            'total_amount.min' => 'El monto total no puede ser negativo.',
            'payment_status.required' => 'El estado de pago es obligatorio.',
            'payment_status.string' => 'El estado de pago debe ser una cadena de texto.',
            'payment_status.max' => 'El estado de pago no puede tener más de 30 caracteres.',
            'payment_method.required' => 'El método de pago es obligatorio.',
            'payment_method.string' => 'El método de pago debe ser una cadena de texto.',
            'payment_method.max' => 'El método de pago no puede tener más de 30 caracteres.',
            'shipping_address.required' => 'La dirección de envío es obligatoria.',
            'shipping_address.string' => 'La dirección de envío debe ser una cadena de texto.',
            'shipping_address.max' => 'La dirección de envío no puede tener más de 255 caracteres.',
            'billing_address.string' => 'La dirección de facturación debe ser una cadena de texto.',
            'billing_address.max' => 'La dirección de facturación no puede tener más de 255 caracteres.',
            'shipping_fee.required' => 'El costo de envío es obligatorio.',
            'shipping_fee.numeric' => 'El costo de envío debe ser un número.',
            'shipping_fee.min' => 'El costo de envío no puede ser negativo.',
            'discount.required' => 'El descuento es obligatorio.',
            'discount.numeric' => 'El descuento debe ser un número.',
            'discount.min' => 'El descuento no puede ser negativo.',
            'notes.string' => 'Las notas deben ser una cadena de texto.',
            'notes.max' => 'Las notas no pueden tener más de 255 caracteres.',
            'product_id.required' => 'El ID del producto es obligatorio.',
            'product_id.numeric' => 'El ID del producto debe ser un número.',
            'product_id.exists' => 'El ID del producto no existe.',
            'total_price.required' => 'El precio total es obligatorio.',
            'total_price.numeric' => 'El precio total debe ser un número.',
            'total_price.min' => 'El precio total no puede ser negativo.'
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
