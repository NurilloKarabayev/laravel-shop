<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPaymentCardRequest extends FormRequest
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
            'payment_card_type_id' => "required",
            'name' => "nullable",
            'exp_date' => 'required',
            'holder_name' => 'required',
            'number' => 'required',
        ];

    }
}
