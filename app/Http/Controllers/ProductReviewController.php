<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Product $product)
    {
        return $this->response([
            'avg_rating' => round($product->reviews()->avg('rating'),1),
            'count_reviews' => $product->reviews()->count('rating'),
            'all_reviews' => ReviewResource::collection($product->reviews()->paginate(10)),
        ]);
    }
    public function store(Product $product, StoreReviewRequest $request)
    {
//        dd($request);
        $product->reviews()->create([
           'user_id' => auth()->user()->id,
           'rating'=> $request->rating,
            'body' => $request->body,
        ]);
        return $this->success('created succesfully');
    }

}
