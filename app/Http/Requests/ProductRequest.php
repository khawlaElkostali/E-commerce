<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rules = [
            'name' => 'required | max:255',
            'description' => 'required | min:5',
            'quantity' => 'required | numeric ',
            'prix' =>'required | numeric',
            'category_id'=> 'required|'
         ];

         if($this->getMethod() === 'store'){
            $rules['image'] =  'required|image';
         }
        return $rules;
    }
}
