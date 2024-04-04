<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class PaymentType extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;
    public array $translatable =[ "name"];
    protected $fillable =[
      'name',
    ];


    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
