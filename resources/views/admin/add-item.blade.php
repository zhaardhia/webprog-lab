@section('pageTitle', 'JH Furniture')
@extends('layouts.master')
@section('content')

<?php
$slide = 'Add';
if (isset($_GET['id'])) {
    $slide = 'Update';
}
?>


<div class="container">
    <h1 class="text-center fs-2 mt-5">{{$slide}} Furniture</h1>
    @if(session('success'))
    <div class="alert alert-success" id="alert" role="alert">
        Success {{$slide}} Furniture!
    </div>
    @endif

    <div class="d-flex justify-content-center mt-5">
        <form action="/add-furniture" method="POST" class="w-25">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="" class="form-control" id="" aria-describedby="" name="name">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input type="" class="form-control" id="" name="price">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Type</label>
                <select class="form-select" aria-label="select type" name="type">
                    <option selected>Select type</option>
                    <option value="chair">Chair</option>
                    <option value="bed">Bed</option>
                    <option value="couch">Couch</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Color</label>
                <select class="form-select" aria-label="select color" name="color">
                    <option selected>Select the color</option>
                    <option value="merah">Red</option>
                    <option value="green">Green</option>
                    <option value="yellow">Yellow</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input type="text" name="image">
                <!-- <input class="form-control" type="file" id="formFile"> -->
            </div>
            <button type="submit" class="btn btn-primary">{{$slide}} Furniture</button>
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