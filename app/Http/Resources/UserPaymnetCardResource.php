<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class UserPaymnetCardResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => Crypt::decryptString($this->name),
            'number' => "**** **** **** " . Crypt::decryptString($this->last_four_numbers),
            'card_type' => $this->type,

        ];
    }
}
