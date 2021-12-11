@extends('layouts.layout')

@section('content')
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
          <a class="nav-link" href="#">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Author</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Category</a>
        </li>
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
        </ul>
    </div>
    </div>
  </div>
</nav>
<div class="text">
    <h1>Get Your Books With <br> The Best Price</h1>
    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search">
        <button class="btn" type="submit">Search</button>
    </form>
</div>
</header>
<main class="container" id="navScroll">
  <div class="best-selling">
  <h2 class="text-center pt-4" id="test">Best Selling Books</h2>
    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="text-center">
            @foreach($fBooks as $fBook)
            <a href="{{ route('admin.show', [$fBook->id]) }}"><img src="/images/{{$fBook->image}}" class="d-inline-block carousel-img-style" alt="..."></a>
            @endforeach
          </div>
        </div>
        @if($sBooks != [])
        <div class="carousel-item">
          <div class="d-flex justify-content-center">
            @foreach($sBooks as $sBook)
            <img src="images/{{$sBook->image}}" class="d-inline-block carousel-img-style" alt="...">
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
    <div class="text-center"><button class="btn btn-warning mb-4">View All</button></div>
  </div>
  <script>
    const navWaypoint = new Waypoint({
    element: document.getElementById('navScroll'),
    handler: function(direction) {
        if(direction === "down"){
          document.getElementsByClassName('nav-waypoint')[0].classList.add("fixed-top");
          document.getElementsByClassName('nav-waypoint')[0].classList.add("bg-color");
        }else{
          document.getElementsByClassName('nav-waypoint')[0].classList.remove("fixed-top");
          document.getElementsByClassName('nav-waypoint')[0].classList.remove("bg-color");
        }
    },
    offset: '32%'
  })
  </script>
</main>
@endsection
