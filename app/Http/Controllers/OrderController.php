<?php

namespace App\Http\Controllers;

use App\Events\CreateOrderEvent;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        $order = Order::create([
            'amount' => 15,
            'user_id' => 1
        ]);


    }
}
