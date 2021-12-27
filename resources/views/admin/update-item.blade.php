@section('pageTitle', 'JH Furniture')
@extends('layouts.master')
@section('content')


<div class="container">
    <h1 class="text-center fs-2 mt-5">Update Furniture</h1>
    @if(session('success'))
    <div class="alert alert-success" id="alert" role="alert">
        Success Update Furniture!
    </div>
    @endif

    <div class="d-flex justify-content-center mt-5">
        <form onsubmit="updateFurniture()" class="w-25">
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
                <input type="text" name="image" value="{{$furniture->image}}" id="image">
                <!-- <input class="form-control" type="file" id="formFile"> -->
            </div>
            <button type="submit" class="btn btn-primary">Update Furniture</button>
        </form>
    </div>

</div>

<script>
    const updateFurniture = () => {
        event.preventDefault()
        const name = document.getElementById('name').value
        console.log("{{$furniture->id}}")

        //     const pictureLink = document.getElementById('password').value;
        //     const img = document.getElementById('img')
        //     const form = document.getElementById('form-profile')
        //     const button = document.getElementById('btn-submit')
        //     button.innerHTML = `
        //     <div class="spinner-border text-light" role="status">
        //                 <span class="visually-hidden">Loading...</span>
        //     </div>
        //    `
        $.ajax({
            type: "POST",
            url: "/update-furniture",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": "{{ $furniture->id }}",
                "name": name,
            },
            success: function(result) {
                console.log(result)
            },
            error: (err) => {
                console.log(err)
            }
        })
    }
</script>
@endsection