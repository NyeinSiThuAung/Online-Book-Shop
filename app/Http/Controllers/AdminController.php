<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Admin;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreBookRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',Admin::class);
        $books = Book::orderBy('id','desc')->get();
        return view('admin',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Admin::class);
        $categories = Category::all();
        $authors = Author::all();
        return view('create',compact('categories','authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $this->authorize('create',Admin::class);
        $validatedData = $request->validated();
        $imgName = $this->moveImg($request->image);
        $validatedData['image'] = "$imgName";

        if($desc = $request->description){
            Book::create($validatedData + ['description' => $desc]);
        }else{
            Book::create($validatedData + ['description' => 'No description yet']);
        }
        return redirect()->route('admin.create')->with('create', 'Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $admin)
    {
        return view('detail',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $admin)
    {
        // $this->authorize('update',Admin::findOrFail(1)->id);
        $this->authorize('update', Admin::find(1));
        $categories = Category::all();
        $authors = Author::all();
        return view('edit', compact('admin','categories','authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $admin)
    {
        $this->authorize('update', Admin::find(1));
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'category_id' => 'required',
            'author_id' => 'required',
        ]);
        $inputData = $request->all();
        if($request->image){
            $request->validate(['image' => 'required|image']);
            // delete image section
            $deleteImgPath = "images/". $admin->image;
            File::delete($deleteImgPath);
            // end
            $imgName = $this->moveImg($request->image);
            $inputData['image'] = "$imgName";
        }
        $admin->update($inputData);
        return redirect()->route('admin.edit', [$admin->id])->with('edit', 'Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $admin)
    {
        $this->authorize('delete', Admin::find(1));
        $admin->delete();
        return redirect()->route('admin');
    }
    public function moveImg($image){
        $imgName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $destinationPath = 'images/';
        $image->move($destinationPath, $imgName);
        return $imgName;
    }
}
