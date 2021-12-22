@extends('layouts.layout')

@section('content')
<div class="container mt-3">
    <a href="{{ route('home') }}" class="btn btn-primary mb-3">Back</a>
    <div class="dropdown float-end">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Sort By
        </button>
        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="{{ route('category') }}">Ascending<i class="fas fa-sort-alpha-down fs-6 ps-3 text-white"></i></a></li>
            <li><a class="dropdown-item" href="{{ route('categorydesc') }}">Descending<i class="fas fa-sort-alpha-down-alt fs-6 ps-2 text-white"></i></a></li>
        </ul>
    </div>
    <div class="author-table">
    <table class="table table-bordered border-warning table-light caption-top table-responsive table-hover table-striped align-middle">
        <tbody>
            <tr>
                <th>Categories</th>
            </tr>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection