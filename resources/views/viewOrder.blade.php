@extends('layouts.layout')

@section('content')
<div class="container mt-3">
    <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
@foreach($orders as $key => $order)
<div class="card text-center mt-3">
    <h4 class="card-header">order_id: {{$key}} <span></span></h4>
    <div class="card-body">
        @php $test = 0; @endphp
        @foreach($order as $val)
        @php $test++ @endphp
        @if($test == 1)
        <div class="row">
            <div class="col-6"><p class="card-text text-end">Name: <br>Ph_no: <br>Address:</p></div>
            <div class="col-6"><p class="card-text text-start">{{$val->name}} <br>{{$val->ph_no}} <br>{{$val->address}}</p></div>
            <h5 class="card-text mt-3 mb-3 text-decoration-underline">Ordered Books</h5>
        </div>
        @endif
        <p class="card-text">{{$val->book_name}}</p>
        @endforeach
        <button class="btn btn-warning mt-3">Accept</button>
        <a href="/viewOrder/{{$key}}" class="btn btn-success mt-3">Done</a>
        <a href="#" class="btn btn-danger mt-3">Refuse</a>
    </div>
</div>
@endforeach
</div>
@endsection