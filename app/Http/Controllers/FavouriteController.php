<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavouriteController extends Controller
{

    public function index()
    {

        return auth()->user()->favorites;
    }

    public function store(Request $request)
    {
        auth()->user()->favorites()->attach($request->product_id);
        return response()->json([
            'succes' => true,
        ]);
    }

    public function destroy($favorite_id)
    {
//        dd($favorite_id);
        if (auth()->user()->hasFavorite($favorite_id)){
            auth()->user()->favorites()->detach($favorite_id);
            return response()->json([
                'succes' => true,
            ]);
        }
        return response()->json([
            'succes' => false,
            "message" => "Favorite does not exist"
        ]);
    }
}
