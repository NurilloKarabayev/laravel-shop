<?php

namespace App\Observers;

use App\Models\Order;
use Illuminate\Support\Facades\Notification;

class OrderObserver
{
    /**
     * Handle the mail "created" event.
     */
    public function created(Order $order): void
    {
        //
    }

    /**
     * Handle the mail "updated" event.
     */
    public function updated(Order $order): void
    {
        $notification = ucfirst($order->status->code);
        $class = "\App\Notifications\Order\\" . $notification;

        if (class_exists($class)) {
            Notification::send([$order->user], new $class($order));
        }
    }

    /**
     * Handle the mail "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the mail "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the mail "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
