<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::factory()->count(50)->create();

        foreach ($products as $product){
            $product->stocks()->create([
                'quantity' => rand(30,40),
                'attributes' => json_encode(
                    [
                        [
                            'attribute_id' => 1,
                            'value_id' => rand(1,3),
                        ],
                        [
                            'attribute_id' => 2,
                            'value_id' => 4,
                        ],
                        [
                            'attribute_id' => 3,
                            'value_id' => rand(6,7),
                        ],
                    ],
                ),
                "added_price" => 500000,
            ]);
            $product->stocks()->create([
                'quantity' => rand(15,30),
                'attributes' => json_encode(
                    [
                        [
                            'attribute_id' => 1,
                            'value_id' => rand(1,3),
                        ],
                        [
                            'attribute_id' => 2,
                            'value_id' => rand(4,5),
                        ],
                        [
                            'attribute_id' => 3,
                            'value_id' => rand(6,7),
                        ],

                    ]
                )
            ]);
            $product->stocks()->create([
                'quantity' => rand(15,30),
                'attributes' => json_encode(
                    [
                        [
                            'attribute_id' => 1,
                            'value_id' => rand(1,3),
                        ],
                        [
                            'attribute_id' => 2,
                            'value_id' => rand(4,5),
                        ],
                        [
                            'attribute_id' => 3,
                            'value_id' => rand(6,7),
                        ],

                    ]
                )
            ]);$product->stocks()->create([
                'quantity' => rand(10,15),
                'attributes' => json_encode(
                    [
                        [
                            'attribute_id' => 1,
                            'value_id' => rand(1,3),
                        ],
                        [
                            'attribute_id' => 2,
                            'value_id' => rand(4,5),
                        ],
                        [
                            'attribute_id' => 3,
                            'value_id' => rand(6,7),
                        ],

                    ]
                )
            ]);
        }
    }
}
