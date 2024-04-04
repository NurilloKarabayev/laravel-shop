<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMethod;
use App\Models\Order;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\LazyCollection;
use Illuminate\Database\Eloquent\Collection;

class StatisticController extends Controller
{

    public function orderCount(Request $request)
    {
        $to = Carbon::now();
        $from = Carbon::now()->subMonth();

        if ($request->has(['from', 'to'])){
            $from = $request->from;
            $to = $request->to;

        }
        return $this->response(Order::query()
            ->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])
            ->whereRelation('status','code','closed')
            ->count()
        );
    }

    public function orderSalesSum(Request $request)
    {
        $to = Carbon::now();
        $from = Carbon::now()->subMonth();

        if ($request->has(['from', 'to'])){
            $from = $request->from;
            $to = $request->to;

        }
        return $this->response(Order::query()
            ->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])
            ->whereRelation('status','code','closed')
            ->sum("sum")
        );
    }

    public function deliveryMethodStats(Request $request)
    {
//        if (Cache::has('deliveryMethodStats')){
//            return Cache::get('deliveryMethodStats');
//        }
        $to = Carbon::now();
        $from = Carbon::now()->subMonth();

        if ($request->has(['from', 'to'])){
            $from = $request->from;
            $to = $request->to;
        }
        $res = [];

        $allOrders = Order::query()
            ->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])
            ->whereRelation('status','code','closed')->count();

        foreach (DeliveryMethod::all() as $deliveryMethod){
            $deliveryMethodsCount = $deliveryMethod->orders()
                ->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])
                ->whereRelation('status','code','closed')
                ->count();
            $res[]= [
              'name' => $deliveryMethod->getTranslations('name'),
              'parcentage'=> round($deliveryMethodsCount * 100/$allOrders,1),
              'amount' => $deliveryMethodsCount
            ];
        }
        return $this->response($res);

    }

    public function ordersPerDay(Request $request)
    {
        $to = Carbon::now();
        $from = Carbon::now()->subMonth();

        if ($request->has(['from', 'to'])){
            $from = $request->from;
            $to = $request->to;
        }

        $days = CarbonPeriod::create($from, $to);
        $response  = new Collection();

        LazyCollection::make($days->toArray())->each(function ($day) use ($from, $to, $response ) {

            $count = Order::query()
                ->where('created_at', $day)
                ->whereRelation('status','code', 'closed',)
                ->count();
            $sum = Order::query()
                ->where('created_at', $day)
                ->whereRelation('status','code','closed')
                ->sum("sum");

            $response[] = [
                'date' => $day->format('Y-m-d'),
                'order_count' => $count,
                'sum' => $sum
            ];
        });

        return $this->response($response);

    }

}
