@extends('layout')
@section('content')
<div class="container mt-4">
    <a href="{{route('admin')}}"><button class="btn btn-primary mb-4">Back</button></a>
    <div class="row bg-light rounded p-3">
        <div class="col-2">
            <img src="/images/{{$admin->image}}" alt="" class="mb-3 rounded">
            <h5 class="text-center">{{$admin->author->name}} <hr>{{$admin->price}}MMK</h5>
        </div>
        <div class="col-10">
            <h4 class="card-header">{{$admin->name}} ({{$admin->category->name}})</h4>
            <p class="text-break fs-6 p-3">{{$admin->description}}</p>
        </div>
    </div>
</div>
@endsection