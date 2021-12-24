@extends('layouts.layout')
@section('content')
<div class="container mt-4">
    <a href="{{route('admin')}}"><button class="btn btn-primary mb-4">Back</button></a>
    <div class="card">
    <h5 class="card-header">Edit pannel</h5>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-body">
        <form action="{{route('admin.update', [$admin->id])}}" method="post" enctype= multipart/form-data>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Name</label>
                <input name="name" type="text" class="form-control" id="title" value="{{old('name', $admin->name)}}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input name="price" type="number" class="form-control" id="price" value="{{old('price', $admin->price)}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    <option value="">Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ $admin->category_id==$category->id ? "selected" : "" }}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Author</label>
                <select class="form-select" name="author_id">
                    <option value="">Author</option>
                    @foreach($authors as $author)
                    <option value="{{$author->id}}" {{ $admin->author_id==$author->id ? "selected" : "" }}>{{$author->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="descr" class="form-label">Description</label>
                <textarea name="description" id="descr" cols="30" rows="10" class="form-control">{{old('price', $admin->description)}}</textarea>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-11">
                        <input type="file" name="image" class="form-control mt-4" onchange="CreateImg(this)" accept="image/*" value="{{$admin->image}}">
                    </div>
                    <div class="col-1">
                        <img src="/images/{{$admin->image}}" alt="" width="70" height="80" id="oldPhoto">
                        <img src="" alt="Creat Img" width='70' height='80' id="newPhoto" style="display:none">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success float-end">Submit</button>
        </form>
    </div>
    </div>
</div>
<script src="/js/javascript.js"></script>
@endsection