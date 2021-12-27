<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewOrderController extends Controller
{
    public function index() {
        $order_id = Order::select('order_id')
        ->groupBy('order_id')
        ->get();

        $orders = Order::whereIn('order_id', $order_id)
        ->get()
        ->groupBy('order_id');
        $status = config('orderstatus');
        // dd($status);
        return view('view_order',compact('orders', 'status'));
    }

    public function approve($id)
    {
        $processing = array_flip(config('orderstatus'))['approved']; // will out 0
        $this->reuse($id, true, $processing);
        return redirect()->route('viewOrder')->with('approve',"Order_id: ".$id ." is approved");
    }

    public function done($id)
    {
        $this->reuse($id, false);
        return redirect()->route('viewOrder')->with('done',"Order_id: ".$id ." is done");
    }

    public function refuse($id)
    {
        $this->reuse($id, false);
        return redirect()->route('viewOrder')->with('refuse',"Order_id: ".$id ." is removed");
    }
    
    private function reuse($id, $approve, $processing='') {
        $orders = Order::where('order_id',$id)->get();
        foreach($orders as $val){
            if($approve){
                $val->status = $processing;
                $val->save();
            }else{
                $val->delete();
            }
        }
    }
}
