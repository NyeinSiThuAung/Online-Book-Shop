<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
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

    public function author () 
    {
        $authors = Author::orderBy('name')->get();
        return view('author', compact('authors'));
    }

    public function authordesc () 
    {
        $authors = Author::orderBy('name','desc')->get();
        return view('author', compact('authors'));
    }
    
    public function authorBook ($id) 
    {
        $author = Author::find($id);
        $books = $author->books;
        // dd($books);
        return view('author_book', compact('books'));
    }

    public function category () 
    {
        $categories = Category::orderBy('name')->get();
        return view('category', compact('categories'));
    }

    public function categorydesc () 
    {
        $categories = Category::orderBy('name','desc')->get();
        return view('category', compact('categories'));
    }
    
    public function cateBook ($id) 
    {
        $category = Category::find($id);
        $books = $category->books;
        // dd($books);
        return view('category_book', compact('books'));
    }

    public function search (Request $request) 
    {
        $search_val = $request->search;
        $books = Book::where('name','like','%'.$search_val.'%')->get();
        return view('search',compact('books'));
    }
}
