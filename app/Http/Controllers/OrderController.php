<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use App\Events\StoreOrderEvent;

class OrderController extends Controller
{
    public function index (Request $addedItems) {
        $addedItems = $addedItems->except('_token');
        return view('order.order_register',compact('addedItems'));
    }

    public function store(Request $request){
        $bookTitles = $request->except('_token','name','ph_no','address');
        $order_id = date('dHis') . rand(1,9);
        $request->validate([
            'name' => 'required|max:255',
            'ph_no' => 'required|digits:9',
            'address' => 'required',
        ]);
        foreach($bookTitles as $titleVal){
            $validateBookTitles = Book::where('name', '=', $titleVal)->get();
            if(count($validateBookTitles) == 0){
                return redirect()->route('cartItemOrder')->with('error','We have not '.$titleVal. ', please remove that book and try again');
            }
        }
        foreach($bookTitles as $titleVal){
            $validateBookTitles = Book::where('name', '=', $titleVal)->get();
            foreach($validateBookTitles as $bookVal){
                $order = Order::create([
                    'order_id' => $order_id,
                    'name' => $request->name,
                    'ph_no' => $request->ph_no,
                    'address' => $request->address,
                    'book_name' => $bookVal->name,
                    'price' => $bookVal->price,
                    'status' => 3,
                ]);
            }
        }
        StoreOrderEvent::dispatch($order);
        return redirect()->route('home')->with('orderSuccess','Ordered Successfully');
    }

}
