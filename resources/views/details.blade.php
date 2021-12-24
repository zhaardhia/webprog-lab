@section('pageTitle', 'JH Furniture')
@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="text-center fs-2 mt-5">Mjolnir</h1>
    <div class="d-flex justify-content-evenly mt-5">
        <img class="" src="https://wallpaperaccess.com/full/2076086.jpg" alt="" style="width: 11rem">
        <div>
            <p>Name: Mjolnir</p>
            <p>Price: Rp 999.999.000</p>
            <p>Type: Chair</p>
            <p>Color: Maroon</p>
        </div>
    </div>
    <div class="d-flex justify-content-evenly mt-5">
        <button type="button" class="btn btn-dark">Previous</button>

        @guest
        <button type="button" class="btn btn-info">Add To Cart</button>

        @else

        @if(Str::endsWith(Auth::user()->email, '@jh.com'))
        <button>Update</button>
        <button>Delete</button>
        @else
        <button type="button" class="btn btn-info">Add To Cart</button>

        @endif

        @endguest



    </div>
</div>
@endsection