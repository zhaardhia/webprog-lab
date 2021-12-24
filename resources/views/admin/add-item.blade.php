@section('pageTitle', 'JH Furniture')
@extends('layouts.master')
@section('content')

<?php
$slide = 'Add Furniture';
if (isset($_GET['id'])) {
    $slide = 'Update Furniture';
}
?>


<div class="container">
    <h1 class="text-center fs-2 mt-5">{{$slide}}</h1>
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
            <button type="submit" class="btn btn-primary">{{$slide}}</button>
        </form>
    </div>

</div>
@endsection