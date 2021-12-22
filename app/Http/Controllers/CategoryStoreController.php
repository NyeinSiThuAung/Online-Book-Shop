<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryStoreController extends Controller
{
    public function store($request, $validationName, $uniqueModel, $model, $ses, $mes)
    {
        $this->authorize('create',Admin::class);
        $request->validate([
            $validationName => 'required|max:255|unique:'.$uniqueModel.',name',
        ]);
        $model->name = $request->$validationName;
        $model->save();
        return redirect()->back()->with($ses, 'Added ' .$mes. ' Successfully!');
    }

    public function storeCategory(Request $request)
    {
        $category = new Category();
        return $this->store($request, 'category_name', 'categories', $category, 'storeCate', 'New Category');
    }

    public function storeAuthor(Request $request)
    {
        $author = new Author();
        return $this->store($request, 'author_name', 'authors', $author, 'storeAuthor', 'New Author');
    }

}
