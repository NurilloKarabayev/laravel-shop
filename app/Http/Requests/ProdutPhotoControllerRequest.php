<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutPhotoControllerRequest extends FormRequest
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
            'photos.*' => 'required|mimes:jpg,png|file|max:1000'
        ];
    }
}
