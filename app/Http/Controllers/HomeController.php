<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fBooks =Book::limit(4)->get();
        $sBooks = Book::limit(5)->offset(4)->get();
        // dd($sBooks);
        return view('home',compact('fBooks','sBooks'));
    }
}
