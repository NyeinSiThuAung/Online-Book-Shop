@extends('layout')
@section('content')
<div class="container mt-4">
    <a href="{{route('admin')}}"><button class="btn btn-primary mb-4">Back</button></a>
    <div class="card">
    <h5 class="card-header">Creat pannel</h5>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('create'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('edit') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card-body">
        <form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Name</label>
                <input name="name" type="text" class="form-control" id="title" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input name="price" type="number" class="form-control" id="price" value="{{ old('price') }}">
            </div>
            <div class="mb-3">
                <select class="form-select" name="category_id">
                    <option value="">Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : ''  }}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" name="author_id">
                    <option value="">Author</option>
                    @foreach($authors as $author)
                    <option value="{{$author->id}}" {{ old('author_id') == $author->id ? 'selected' : ''  }}>{{$author->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="descr" class="form-label">Description</label>
                <textarea name="description" id="descr" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-11">
                        <input type="file" name="image" class="form-control mt-4" oninput="CreateImg(this.value)" id="myImgFile">
                    </div>
                    <div class="col-1">
                        <p class="myText mt-2">No photo</p>
                        <img src="" alt="Creat Img" width='70' height='80' id="myImg" style="display:none">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success float-end">Submit</button>
        </form>
    </div>
    </div>
</div>
<script>
function CreateImg(data){
    let myImgFile = document.getElementById("myImgFile");
    let imgName = myImgFile.files[0].name;
    document.getElementsByClassName('myText')[0].style.display = "none";
    myImg.style.display = "inline-block";
    myImg.src = "/css/img/"+ imgName;
    return imgName;
}
</script>
@endsection