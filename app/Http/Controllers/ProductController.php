<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Order;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        return ProductResource::collection(Product::cursorPaginate(25));
    }


    public function store(StoreProductRequest $request)
    {

//        dd($request->toArray());
        $product = Product::create($request->toArray());

        return $this->success('product created successfully', new ProductResource($product));

    }


    public function show($id)
    {
        return new ProductResource(Product::with('stocks')->findOrFail($id));
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Gate::authorize('product:delete');

        Storage::delete($product->images()->pluck('path')->toArray());
        $product->images()->delete();
        $product->delete();

        return $this->success("product deleted");
    }

    public function related(Product $product)
    {
        return $this->response(ProductResource::collection(Product::query()
            ->where("category_id" , $product->category_id)
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->orderByDesc('reviews_avg_rating')
            ->limit(15)
            ->get()));
    }

}
