@extends('layouts.layout')

@section('content')
<div class="container mt-3">
    <a href="{{ route('home') }}" class="btn btn-primary mb-3">Back</a>
    @if (session('approve'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('approve') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('done'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('done') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('refuse'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('refuse') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@foreach($orders as $key => $order)
<div class="card text-center mb-5">
    <h4 class="card-header">order_id: {{$key}}</h4>
    <div class="card-body">
        @php $test = 0; @endphp
        @foreach($order as $val)
        @php $test++ @endphp
        @if($test == 1)
        <h4 class="card-text">( {{$status[$val->status]}} )</h4>
        <div class="row">
            <div class="col-6"><p class="card-text text-end">Name: <br>Ph_no: <br>Address:</p></div>
            <div class="col-6"><p class="card-text text-start">{{$val->name}} <br>{{$val->ph_no}} <br>{{$val->address}}</p></div>
            <h5 class="card-text mt-3 mb-3 text-decoration-underline">Ordered Books</h5>
        </div>
        @endif
        <p class="card-text">{{$val->book_name}}</p>
        @endforeach
        <a href="{{ route('orderApprove', [$key]) }}" class="btn btn-warning mt-3">Approve</a>
        <a href="{{ route('orderDone', [$key]) }}" onclick="return confirm('Are u sure?')" class="btn btn-success mt-3">Done</a>
        <a class="btn btn-danger mt-3" onclick="return confirm('Remove this item?')" href="{{ route('orderRefuse', [$key]) }}">Refuse</a>
    </div>
</div>
@endforeach
</div>
@endsection