<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryStoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store($request, $model, $data, $str)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        $model->name = $request->name;
        $model->save($validatedData);
        return redirect()->route('admin.create')->with($data, 'Added ' .$str. ' Successfully!');
    }

    public function storeCategory(Request $request)
    {
        $category = new Category();
        return $this->store($request, $category, "storeCate","New Category");
    }

    public function storeAuthor(Request $request)
    {
        $author = new Author();
        return $this->store($request, $author, "storeAuthor", "New Author");
    }

}
