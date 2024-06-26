<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\DeliveryMethod;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Product;
use App\Models\Stock;
use App\Models\UserAddress;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Order::class,"order");
    }



//    public function index(mail $order)
//    {
//        return $this->response(OrderResource::collection(auth()->user()->orders));
//    }

    public function store(StoreOrderRequest $request)
    {
        $sum = 0;
        $products = [];
        $address = UserAddress::find($request->address_id);
        $notFoundProducts = [];
        $delivery = DeliveryMethod::findOrFail($request->delivery_method_id);


//


        foreach ($request['products'] as $requestProduct){

            $product = Product::with('stocks')->findOrFail($requestProduct['product_id']);
            $product->quantity = $requestProduct['quantity'];



            if(
              $product->stocks()->find($requestProduct['stock_id']) &&
              $product->stocks()->find($requestProduct['stock_id'])->quantity >= $requestProduct['quantity']
            ){

                $productWithStock = $product->withStock($requestProduct['stock_id']);
                $productResource = new ProductResource($productWithStock);

                $sum += ($productResource['price']*$productResource['quantity']);
                $sum+= $productWithStock->stocks[0]->added_price;
                $products[] = $productResource->resolve();
            }else{
                $notFoundProducts = $requestProduct ;

            }

        }

       if ($notFoundProducts === [] && $products !== [] && $sum !== 0){
           $sum+= $delivery->sum;
           $order = auth()->user()->orders()->create([
               'comment' => $request->comment,
               'delivery_method_id' => $request->delivery_method_id,
               'payment_type_id' =>  $request->payment_type_id,
               'address' => $address,
//               'region' => $address->region,
               'sum' => $sum,
               'status_id' => in_array($request['payment_type_id'],[1,2]) ? 1 :10,
               'products' => $products,
           ]);

           if($order){
               foreach ($products as $product){
                   $stock = Stock::find($product['inventory'][0]['id']);
                   $stock->quantity -= $product['order_quantity'];
                   $stock->save();
               }
               return $this->success("qowildi", $order);
           }


       }else {
           return $this->error("product not enough",$notFoundProducts);
       }


return "spmething went wrong";
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order): JsonResponse
    {
        return $this->response(OrderResource::collection(Order::cursorPaginate(25)));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return $this->response("deleted succesfully");
    }
}
