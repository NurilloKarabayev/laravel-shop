<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use \App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function register(Request $request){
        $registerUserData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            "email" => "required|email:rfc,dns|unique:users,email",
            "phone" => "required|unique:users,phone",
            "password" => "required|min:8",
            "password_confirmation" => "required|same:password",
            "photo" => "nullable|file|mimes:jpg,png|file|max:1000",
        ]);
        $user = User::create([
            'email' => $registerUserData['email'],
            'phone' => $registerUserData['phone'],
            'first_name' => $registerUserData['first_name'],
            'last_name' => $registerUserData['last_name'],
            'password' => Hash::make($registerUserData['password']),
        ]);
        return response()->json([
            'message' => 'User Created ',
        ]);
    }
    public function login(Request $request){
        $loginUserData = $request->validate([
            'email'=>'required|string|email',
            'password'=>'required'
        ]);
        $user = User::where('email',$loginUserData['email'])->first();
        if(!$user || !Hash::check($loginUserData['password'],$user->password)){
            return response()->json([
                'message' => 'Invalid Credentials'
            ],401);
        }
        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;
        return response()->json([
            'access_token' => $token,
        ]);
    }
    public function user(Request $request)
    {

        return $this->response(new UserResource($request->user()));
    }
}
