<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return request()->user()->can('product:create');
    }


    public function rules(): array
    {
        return [
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ];
    }
}
