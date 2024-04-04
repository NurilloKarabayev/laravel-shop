<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;

class AdminOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }





    public function index(Request $request)
    {
        Gate::authorize('order:viewAny');

        $order = Order::query();
        if ($request->has('user_id')){
            $order->where('user_id',$request->user_id);
        }
        if ($request->has('delivery_method_id')){
            $order->where('delivery_method_id',$request->delivery_method_id);
        }
        if ($request->has('payment_type_id')){
            $order->where('payment_type_id',$request->payment_type_id);
        }
        if ($request->has('sum_from') && ($request->has('sum_to'))){
            $order->whereBetween('sum',[$request->sum_from , $request->sum_to]);
        }
        if ($request->has('from') && ($request->has('to'))){
            $order->whereBetween('created_at',[$request->from  , Carbon::parse($request->to )->endOfDay()]);
        }
        if ($request->has('order_by')){
            $order->orderBy($request->order_by);
        }
        return $order->paginate($request->paginate ?? 20);
//        return $order->paginate(5);
    }
}
