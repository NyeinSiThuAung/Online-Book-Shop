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
        <a href="{{ route('home') }}"class="btn btn-primary mt-3 mb-3">Back</a>
        <div style="position:relative;left:92%;" class="d-inline-block cartIcon">
            <i class="fas fa-shopping-cart fs-5"></i>
            <span style="position:absolute;top:-70%;font-size:0.9rem;border-radius:50%;background-color:#FF8353;padding:0 35%;color:rgb(49, 49, 49)" class="cartCountNo">0</span>
        </div>
    <div class="row">
        @foreach($books as $book)
        <div class="col-4 mb-5">
            <div class="card">
                <div class="card-body text-center">
                    <img src="images/{{$book->image}}" alt="" width="80%" class="mb-3">
                    <!-- js mhr parent nt call htr lo -->
                    <div> 
                        <input type="hidden" value="{{ $book->name }}" name="name">
                        <input type="hidden" value="{{ $book->price }}" name="price">
                        <input type="hidden" value="{{ $book->image }}"  name="image">
                        <button class="btn addCartButton" onclick="addToCartFunction(event)">Add to Cart</button>
                        <a class="btn orderButton" onclick="addToCartFunction(event)" href="{{ route('cartItemOrder') }}">Order</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $books->links() }}
    </div>
</div>
<script src="/js/javascript.js"></script>
@endsection