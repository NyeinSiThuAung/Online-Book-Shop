@extends('layout')
@section('content')
<div class="container">
    <a href="/"><button class="btn btn-primary mt-4 mb-4">Back</button></a>
    <div class="card">
    <div class="card-header">
        <a href="{{route('admin.create')}}"><button class="btn btn-success mt-4 mb-4">Create</button></a>
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
                <a href="{{ route('admin.show', [$book->id]) }}"><button class="btn btn-primary">Detail</button></a>
                <a href="{{ route('admin.edit', [$book->id]) }}"><button class="btn btn-warning">Edit</button></a>
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