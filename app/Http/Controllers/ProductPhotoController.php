<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutPhotoControllerRequest;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductPhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Product $product)
    {
        return $product->images;
    }
    public function store(ProdutPhotoControllerRequest $request, Product $product)
    {
        foreach ($request->photos as $photo){
            $path = $photo->store('products/'.$product->id, 'public');
            $full_name = $photo->getClientOriginalName();

            $product->images()->create([
                'full_name' => $full_name,
                'path' => $path
            ]);
            return $this->success("rasm muvaffaqqiyatli yuklandi" );
        }

    }

    public function destroy(Product $product, Photo $photo)
    {
        Gate::authorize('product:delete');

        Storage::delete($photo->path);

        $photo->delete();

    }
}
