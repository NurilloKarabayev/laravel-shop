<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserPaymnetCardResource;
use App\Models\User;
use App\Models\UserPaymentCard;
use App\Http\Requests\StoreUserPaymentCardRequest;
use App\Http\Requests\UpdateUserPaymentCardRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class UserPaymentCardController extends Controller
{
    public function index()
    {

//        dd(auth()->user()->paymentCards);
        return $this->response(UserPaymnetCardResource::collection(auth()->user()->paymentCards)) ;





//                $name = Crypt::encryptString("Nurullo");
////                dd($name);
//                $namenew =Crypt::decryptString($name);
//                dd($namenew);
    }


    public function store(StoreUserPaymentCardRequest $request)
    {
//            dd($request);
        $card = auth()->user()->paymentCards()->create([
            'payment_card_type_id' => $request->payment_card_type_id,
            'name' => Crypt::encryptString($request->name),
            'number' => Crypt::encryptString($request->number),
            'exp_date' => Crypt::encryptString($request->exp_date),
            'holder_name' => Crypt::encryptString($request->holder_name),
            'last_four_numbers' => Crypt::encryptString(substr($request->number, -4)),

        ]);


        return $this->response("card added successfully");
    }


    public function show(UserPaymentCard $userPaymentCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserPaymentCard $userPaymentCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserPaymentCardRequest $request, UserPaymentCard $userPaymentCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserPaymentCard $userPaymentCard)
    {
        //
    }
}
