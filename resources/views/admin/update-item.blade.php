@section('pageTitle', 'JH Furniture')
@extends('layouts.master')
@section('content')


<div class="container">
    <h1 class="text-center fs-2 mt-5">Update Furniture</h1>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success" id="alert" role="alert">
        Success Update Furniture!
    </div>
    @endif

    <div class="d-flex justify-content-center mt-5">

        <form action="/update-furniture/{{$furniture->id}}" method="POST" class="w-25" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" value="{{$furniture->name}}" class="form-control" id="name" aria-describedby="" name="name">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input type="" value="{{$furniture->price}}" class="form-control" id="price" name="price">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Type</label>
                <select class="form-select" aria-label="select type" name="type" id="type">
                    <option selected>{{$furniture->type}}</option>
                    <option value="chair">Chair</option>
                    <option value="bed">Bed</option>
                    <option value="couch">Couch</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Color</label>
                <select class="form-select" aria-label="select color" name="color" id="color">
                    <option selected>{{$furniture->color}}</option>
                    <option value="merah">Red</option>
                    <option value="green">Green</option>
                    <option value="yellow">Yellow</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <!-- <input type="text" name="image" value="{{$furniture->image}}" id="image"> -->
                <input class="form-control" type="file" id="image" name="file">
            </div>
            <button type="submit" class="btn btn-primary">Update Furniture</button>
        </form>
    </div>

</div>

<script>
    const idAlert = document.getElementById('alert')

    const wait = async () => new Promise(resolve => setTimeout(resolve, 4000));

    const run = async () => {
        if (idAlert) {
            await wait()
            idAlert.classList.add('d-none')
        }
    }

    run()
</script>
@endsection