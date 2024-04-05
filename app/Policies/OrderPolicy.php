<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Order $order): bool
    {
        return $order->user_id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole("customer") || $user->hasPermissionTo("order:create");
    }


    public function update(User $user, Order $order): bool
    {
        return $order->user_id === $user->id || $user->hasPermissionTo("order:update");
    }


    public function delete(User $user, Order $order): bool
    {
        if ($user->hasRole('customer')){
            return $order->user_id === $user->id && $order->status_id === 1;
        } else {
            return $user->hasPermissionTo('order:delete');
        }
    }


//    public function restore(User $user, mail $order): bool
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can permanently delete the model.
//     */
//    public function forceDelete(User $user, mail $order): bool
//    {
//        //
//    }
}
