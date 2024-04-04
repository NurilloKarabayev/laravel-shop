<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "latitude" => "required",
            "longtitude" => "required",
            "region" => "required",
            "district" => "required",
            "street" => "required",
            "home" => "nullable",
        ];
    }
}
