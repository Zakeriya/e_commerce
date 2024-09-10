<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name'=>'required|string|max:40|min:5',
            'image'=>'image|mimes:png,jpg,jpeg',
            'desc'=>'required|string|max:100|min:5',
            'price'=>'required|numeric|max:10000',
            'seller_id'=>'required|exists:sellers,id'
        ];
    }
}
