@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Order Form</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('order.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="ph" class="col-md-4 col-form-label text-md-right">{{ __('Ph Number') }}</label>

                            <div class="col-md-6">
                                <input id="ph" type="text" class="form-control @error('ph_no') is-invalid @enderror" name="ph_no" value="{{ old('ph_no') }}" autocomplete="ph_no">

                                @error('ph_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @foreach($addedItems as $key => $addedItem)
                        <input type="hidden" value="{{$addedItem}}" name="{{$key}}">
                        @endforeach
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" onclick="removeAllLs()" class="btn btn-primary">Submit</button>
                                <a href="{{ route('cartItemOrder') }}" class="btn btn-warning ms-2">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    removeAllLs = () => {
        localStorage.clear();
    }
</script>
@endsection