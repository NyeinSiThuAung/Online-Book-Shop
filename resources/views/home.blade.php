@extends('layouts.layout')

@section('content')
<body>
@if (session('orderSuccess'))
        <div class="alert alert-warning alert-dismissible fade show fixed-top" role="alert">
            {{ session('orderSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
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
<header>
  <nav class="navbar navbar-expand-lg nav-waypoint">
  <div class="container">
    <a class="navbar-brand flex-grow-1" href="#"><img src="/css/img/header_icon.png" alt="" height="45" width="45"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active-link">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Author</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Category</a>
        </li>
        @auth
        @if(Auth::user()->admin_id)
        <li class="nav-item">
          <a class="nav-link" href="{{ route('viewOrder') }}">Order</a>
        </li>
        @endif
        @endauth
      </ul>
      <div class="d-flex">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @auth
          <li class="nav-item">
            @if(Auth::user()->admin_id)
            <a class="nav-link" href="{{route('admin')}}">{{Auth::user()->name}}</a>
            @else
            <p class="nav-link" style="cursor:default">{{Auth::user()->name}}</p>
            @endif
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('logOut')}}">Logout</a>
          </li>
          @endauth
          @guest
            <li class="nav-item">
              <a class="nav-link" href="/register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/login">LogIn</a>
            </li>
          @endguest
          <li class="nav-item ms-1 cartIcon">
            <span class="nav-link">
              <div style="position:relative">
                <i class="fas fa-shopping-cart"></i>
                <span style="position:absolute;top:-50%;font-size:0.9rem;border-radius:50%;background-color:#FF8353;padding:0 35%;color:rgb(49, 49, 49)" class="cartCountNo">0</span>
              </div>
            </span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<div class="text">
    <h1 id="testWp">Get Your Books With <br> The Best Price</h1>
    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search">
        <button class="btn" type="submit">Search</button>
    </form>
</div>
</header>
<main class="container" id="navScrollWp">
  <div class="popularBooks">
    <h2 class="text-center pt-4">Recently Uploaded Books</h2>
    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="d-flex justify-content-center mb-5">
            @foreach($ruFbooks as $fBook)
              <div>
                <a href="{{ route('admin.show', [$fBook->id]) }}"><img src="/images/{{$fBook->image}}" class="carousel-img-style" alt="..."></a>
                <div class="text-center">
                  <input type="hidden" value="{{ $fBook->name }}" name="name">
                  <input type="hidden" value="{{ $fBook->price }}" name="price">
                  <input type="hidden" value="{{ $fBook->image }}"  name="image">
                  <button class="btn addCartButton" onclick="addToCartFunction(event)">Add to Cart</button>
                  <a class="btn orderButton" onclick="addToCartFunction(event)" href="{{ route('cartItemOrder') }}">Order</a>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        @if(count($ruSbooks) > 0)
        <div class="carousel-item">
          <div class="d-flex justify-content-center mb-5">
            @foreach($ruSbooks as $sBook)
              <div>
                <a href="{{ route('admin.show', [$sBook->id]) }}"><img src="/images/{{$sBook->image}}" class="carousel-img-style" alt="..."></a>
                <div class="text-center">
                  <input type="hidden" value="{{ $sBook->name }}" name="name">
                  <input type="hidden" value="{{ $sBook->price }}" name="price">
                  <input type="hidden" value="{{ $sBook->image }}"  name="image">
                  <button class="btn addCartButton" onclick="addToCartFunction(event)">Add to Cart</button>
                  <button class="btn orderButton">Order</button>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        @endif
        @if(count($ruTbooks) > 0)
        <div class="carousel-item">
          <div class="d-flex justify-content-center mb-5">
            @foreach($ruTbooks as $tBook)
              <div>
                <a href="{{ route('admin.show', [$tBook->id]) }}"><img src="/images/{{$tBook->image}}" class="carousel-img-style" alt="..."></a>
                <div class="text-center">
                  <input type="hidden" value="{{ $tBook->name }}" name="name">
                  <input type="hidden" value="{{ $tBook->price }}" name="price">
                  <input type="hidden" value="{{ $tBook->image }}"  name="image">
                  <button class="btn addCartButton" onclick="addToCartFunction(event)">Add to Cart</button>
                  <button class="btn orderButton">Order</button>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        @endif
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
        <i class="fas fa-chevron-circle-left"  aria-hidden="true"></i>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
        <i class="fas fa-chevron-circle-right"  aria-hidden="true"></i>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <div class="text-center"><button class="btn btn-warning mb-4">View More</button></div>
  </div>
<!-- All -->
  
<div class="popularBooks">
    <h2 class="text-center pt-4">All Books</h2>
    <div id="carouselExampleControlsNoTouching2" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="d-flex justify-content-center mb-5">
            @foreach($fBooks as $fBook)
              <div>
                <a href="{{ route('admin.show', [$fBook->id]) }}"><img src="/images/{{$fBook->image}}" class="carousel-img-style" alt="..."></a>
                <div class="text-center">
                  <input type="hidden" value="{{ $fBook->name }}" name="name">
                  <input type="hidden" value="{{ $fBook->price }}" name="price">
                  <input type="hidden" value="{{ $fBook->image }}"  name="image">
                  <button class="btn addCartButton" onclick="addToCartFunction(event)">Add to Cart</button>
                  <button class="btn orderButton">Order</button>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        @if(count($sBooks) > 0)
        <div class="carousel-item">
          <div class="d-flex justify-content-center mb-5">
            @foreach($sBooks as $sBook)
              <div>
                <a href="{{ route('admin.show', [$sBook->id]) }}"><img src="/images/{{$sBook->image}}" class="carousel-img-style" alt="..."></a>
                <div class="text-center">
                  <input type="hidden" value="{{ $sBook->name }}" name="name">
                  <input type="hidden" value="{{ $sBook->price }}" name="price">
                  <input type="hidden" value="{{ $sBook->image }}"  name="image">
                  <button class="btn addCartButton" onclick="addToCartFunction(event)">Add to Cart</button>
                  <button class="btn orderButton">Order</button>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        @endif
        @if(count($tBooks) > 0)
        <div class="carousel-item">
          <div class="d-flex justify-content-center mb-5">
            @foreach($tBooks as $tBook)
              <div>
                <a href="{{ route('admin.show', [$tBook->id]) }}"><img src="/images/{{$tBook->image}}" class="carousel-img-style" alt="..."></a>
                <div class="text-center">
                  <input type="hidden" value="{{ $tBook->name }}" name="name">
                  <input type="hidden" value="{{ $tBook->price }}" name="price">
                  <input type="hidden" value="{{ $tBook->image }}"  name="image">
                  <button class="btn addCartButton" onclick="addToCartFunction(event)">Add to Cart</button>
                  <button class="btn orderButton">Order</button>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        @endif
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching2" data-bs-slide="prev">
        <i class="fas fa-chevron-circle-left"  aria-hidden="true"></i>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching2" data-bs-slide="next">
        <i class="fas fa-chevron-circle-right"  aria-hidden="true"></i>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <div class="text-center"><button class="btn btn-warning mb-4">View More</button></div>
  </div>
</main>
<script src="/js/javascript.js"></script>
</body>
@endsection
