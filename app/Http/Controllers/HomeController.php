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
    { //ru = Recently uploaded
        $ruFbooks = Book::orderBy('id','desc')->limit(4)->get();
        $ruSbooks = Book::orderBy('id','desc')->limit(4)->offset(4)->get();
        $ruTbooks = Book::orderBy('id','desc')->limit(4)->offset(8)->get();
        $fBooks =Book::limit(4)->get();
        $sBooks = Book::limit(4)->offset(4)->get();
        $tBooks = Book::limit(4)->offset(8)->get();
        // dd($sBooks);
        return view('home',compact('ruFbooks', 'ruSbooks', 'ruTbooks', 'fBooks','sBooks','tBooks'));
    }

    public function recentViewMore () 
    {
        $books = Book::orderBy('id','desc')->limit(20)->get();
        return view('viewMore.recently',compact('books'));
    }

    public function allViewMore ()
    {
        $books = Book::paginate(9);
        return view('viewMore.all',compact('books'));
    }
}
