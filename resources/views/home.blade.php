@extends('layouts.layout')

@section('content')
<header>
  <nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand flex-grow-1" href="#"><img src="/css/img/header_icon.png" alt="" height="50" width="50"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
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
    <form class="d-flex">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @auth
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin')}}">{{Auth::user()->name}}</a>
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
    </form>
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
<main class="container">
  <h2 class="text-center">Trending post</h2>
  <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="d-flex justify-content-center">
          <img src="css/img/book1.jpg" class="d-inline-block carousel-img-style" alt="...">
          <img src="css/img/book2.jpg" class="d-inline-block carousel-img-style" alt="...">
          <img src="css/img/book3.jpg" class="d-inline-block carousel-img-style" alt="...">
          <img src="css/img/book1.jpg" class="d-inline-block carousel-img-style" alt="...">
          <img src="css/img/book2.jpg" class="d-inline-block carousel-img-style" alt="...">
        </div>
      </div>
      <div class="carousel-item">
        <div class="d-flex justify-content-center">
          <img src="css/img/book1.jpg" class="d-inline-block carousel-img-style" alt="...">
          <img src="css/img/book2.jpg" class="d-inline-block carousel-img-style" alt="...">
          <img src="css/img/book3.jpg" class="d-inline-block carousel-img-style" alt="...">
          <img src="css/img/book1.jpg" class="d-inline-block carousel-img-style" alt="...">
          <img src="css/img/book2.jpg" class="d-inline-block carousel-img-style" alt="...">
        </div>
      </div>
      <div class="carousel-item">
        <div class="d-flex justify-content-center">
          <img src="css/img/book1.jpg" class="d-inline-block carousel-img-style" alt="...">
          <img src="css/img/book2.jpg" class="d-inline-block carousel-img-style" alt="...">
          <img src="css/img/book3.jpg" class="d-inline-block carousel-img-style" alt="...">
          <img src="css/img/book1.jpg" class="d-inline-block carousel-img-style" alt="...">
          <img src="css/img/book2.jpg" class="d-inline-block carousel-img-style" alt="...">
        </div>
      </div>
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
</main>
@endsection