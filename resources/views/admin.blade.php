@extends('layouts.layout')
@section('content')
<div class="container">
    <a href="/" class="btn btn-primary mt-4 mb-4">Back</a>
    <div class="card">
    <div class="card-header">
        <a href="{{route('admin.create')}}" class="btn btn-success mt-4 mb-4">Create</a>
        @if (session('delete'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('delete') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('create'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('create') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('edit'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('edit') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="card-body">
        @foreach($books as $book)
        <div class="row">
            <div class="col-2">
                <!-- <h5 class="card-title">Special title treatment</h5> -->
                <img src="images/{{$book->image}}" alt="" width="170" height="200" >
            </div>
            <div class="col-2">
                <p class="card-text">Name: <br><br> Category: <br><br> Author: <br><br> Price: <br><br> Description: </p>
            </div>
            <div class="col-8">
                <p class="card-text">{{$book->name}} <br><br> {{$book->category->name}} <br><br> {{$book->author->name}} <br><br>{{$book->price}} MMK <br><br>{{ \Illuminate\Support\Str::limit($book->description, 200, $end='...') }}</p>
                <a href="{{ route('admin.show', [$book->id]) }}" class="btn btn-primary">Detail</a>
                <a href="{{ route('admin.edit', [$book->id]) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('admin.destroy', [$book->id]) }}" class="d-inline-block" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        <hr>
        @endforeach
    </div>
    </div>
</div>
@endsection