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
        <form action="" method="POST" class="w-25">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="" class="form-control" id="" aria-describedby="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input type="" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Type</label>
                <select class="form-select" aria-label="select type">
                    <option selected>Select type</option>
                    <option value="merah">Me</option>
                    <option value="jigong">Ji</option>
                    <option value="kuyang">Ku</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Color</label>
                <select class="form-select" aria-label="select color">
                    <option selected>Select the color</option>
                    <option value="merah">Me</option>
                    <option value="jigong">Ji</option>
                    <option value="kuyang">Ku</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <button type="submit" class="btn btn-primary">{{$slide}}</button>
        </form>
    </div>

</div>
@endsection