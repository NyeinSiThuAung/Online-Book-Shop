<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index (Request $addedItems) {
        $addedItems = $addedItems->except('_token');
        // $test2 = "";
        // foreach($cartRequest as $val){
        //     $test = Book::where('name', '=', $val)->get();
        //     foreach($test as $val){
        //         $test2 .= $val->name;
        //     }
        // }
        // dd($test2);
        return view('order.orderRegister',compact('addedItems'));
    }

    public function store(Request $request){
        $bookTitles = $request->except('_token','name','ph_no','address');
        $order_id = date('dHis') . rand(1,99);
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
                $orders = new Order;
                $orders->order_id = $order_id;
                $orders->name = $request->name;
                $orders->ph_no = $request->ph_no;
                $orders->address = $request->address;
                $orders->book_name = $bookVal->name;
                $orders->price = $bookVal->price;
                $orders->status = 3;
                $orders->save();
            }
        }
    }

}
