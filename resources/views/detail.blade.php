@extends('layouts.layout')
@section('content')
<body>
<div class="container mt-4">
    @auth
    @if(Auth::user()->admin_id)
    <a href="{{route('admin')}}"><button class="btn btn-primary mb-4">Back</button></a>
    @else
    <a href="{{route('home')}}/#test"><button class="btn btn-primary mb-4">Back</button></a>
    @endif
    @endauth
    @guest
    <a href="{{route('home')}}/#test"><button class="btn btn-primary mb-4">Back</button></a>
    @endguest
    <div class="row bg-light rounded p-3">
        <div class="col-2">
            <img src="/images/{{$admin->image}}" alt="" class="mb-3 rounded" width="200">
            <h5 class="text-center">{{$admin->author->name}} <hr>{{$admin->price}}MMK</h5>
        </div>
        <div class="col-10">
            <h4 class="card-header">{{$admin->name}} ({{$admin->category->name}})</h4>
            <p class="text-break fs-6 p-3" style="line-height:30px;letter-spacing:1px; text-align:justify;">{{$admin->description}}</p>
        </div>
    </div>
</div>
</body>
@endsection