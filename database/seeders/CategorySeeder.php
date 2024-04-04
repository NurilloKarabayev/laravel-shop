<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $category = Category::create([
            'name' => [
                'uz' => 'Stol',
                'en' => 'Chair'
            ]
            ]);
       $category->childCategories()->create([
           'name' => [
               'uz' => 'Ofis',
               'en' => 'Office'
           ]
       ]);

        $child = $category->childCategories()->create([
            'name' => [
                'uz' => 'O\'yinbob',
                'en' => 'Gaming'
            ]
        ]);
        $child ->childCategories()->create([
                'name' => [
                    'uz' => 'RGB',
                    'en' => 'RJB'
                ]
            ]);
        $child ->childCategories()->create([
            'name' => [
                'uz' => 'odatiy',
                'en' => 'simple'
            ]
        ]);

        $child ->childCategories()->create([
            'name' => [
                'uz' => 'black',
                'en' => 'black'
            ]
        ]);

        Category::create([
            'name' => [
                'uz' => 'stul',
                'en' => 'table'
            ]
            ]);
            Category::create([
                'name' => [
                'uz' => 'kreslo',
                'en' => 'armchair'
                ]
                ]);
             Category::create([
                'name' => [
                'uz' => 'divan',
                'en' => 'sofa'
                ]
            ]);

        }
    }

