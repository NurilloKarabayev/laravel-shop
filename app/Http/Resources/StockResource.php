<?php

namespace App\Http\Resources;

use App\Models\Attribute;
use App\Models\Value;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $result =  [
            'stock_id' => $this->id,
            'quantity' => $this->quantity,
            "added_price" => $this->added_price

        ];

        $attributes = json_decode($this->attributes);

//        dd($attributes);

        $result = $this->GetAttributes($attributes, $result);
        return $result;
    }

    /**
     * @param mixed $attributes
     * @param array $result
     * @return array
     */
    public function GetAttributes(mixed $attributes, array $result): array
    {
        foreach ($attributes as $stockAttribute) {
            $attribute = Attribute::find($stockAttribute->attribute_id);
            $value = Value::find($stockAttribute->value_id);

            $result[$attribute->name] = $value->getTranslations('name');
        }
        return $result;
    }
}
