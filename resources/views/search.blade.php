@extends('layouts.layout')
@section('content')
<aside>
  <i class="fas fa-times mt-4 me-3 fs-5 d-block float-end faTimesIcon"></i>
  <div class="text-center mt-3">
    <i class="fas fa-shopping-bag fs-4 me-3" style="cursor:default"></i><h4 class="d-inline-block">Your item</h4>
    <div class="text-center">
      <button class="btn btn-warning text-light mt-3 mb-3" onclick="window.location.href='{{ route('cartItemOrder') }}'">Order</button>
    </div>
  </div>
  <div class="container mt-3">
    <div class="container" id="showCart">
      <hr>
    </div>
  </div>
</aside>
<aside class="asideLeft"></aside>
<div class="container">
    <a href="/" class="btn btn-primary mt-4 mb-4">Back</a>
    <div style="position:relative;left:1%" class="d-inline-block cartIcon">
        <i class="fas fa-shopping-cart fs-5"></i>
        <span style="position:absolute;top:-70%;font-size:0.9rem;border-radius:50%;background-color:#FF8353;padding:0 35%;color:rgb(49, 49, 49)" class="cartCountNo">0</span>
    </div>
    <div class="card">
    <div class="card-header">
        <h4>Result:</h4>
    </div>
    <div class="card-body">
        @foreach($books as $book)
        <div class="row">
            <div class="col-2">
                <img src="images/{{$book->image}}" alt="" width="170" height="200" >
            </div>
            <div class="col-2">
                <p class="card-text">Name: <br><br> Category: <br><br> Author: <br><br> Price: <br><br> Description: </p>
            </div>
            <div class="col-8">
                <input type="hidden" value="{{ $book->name }}" name="name">
                <input type="hidden" value="{{ $book->price }}" name="price">
                <input type="hidden" value="{{ $book->image }}"  name="image">
                <p class="card-text">{{$book->name}} <br><br> {{$book->category->name}} <br><br> {{$book->author->name}} <br><br>{{$book->price}} MMK <br><br>{{ \Illuminate\Support\Str::limit($book->description, 200, $end='...') }}</p>
                <button class="btn addCartButton" onclick="addToCartFunction(event)">Add to Cart</button>
                <a class="btn orderButton" onclick="addToCartFunction(event)" href="{{ route('cartItemOrder') }}">Order</a>
                <a href="{{ route('admin.show', [$book->id]) }}" class="btn btn-primary">Detail</a>
            </div>
        </div>
        <hr>
        @endforeach
    </div>
    </div>
</div>
<script src="/js/javascript.js"></script>
@endsection