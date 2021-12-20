<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class viewOrderController extends Controller
{
    public function index() {
        $order_id = Order::select('order_id')
        ->groupBy('order_id')
        ->get();

        $orders = Order::whereIn('order_id', $order_id)
        ->get()
        ->groupBy('order_id');
        // dd(config('orderstatus'));
        return view('viewOrder',compact('orders'));
    }
}
