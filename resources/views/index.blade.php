@section('pageTitle', 'JH Furniture')
@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="text-center fs-2 mb-5">Welcome to JH Furniture</h1>
    <div class="row justify-content-center flex-wrap">

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100" style=" height: auto; object-fit: cover;">
                <img src="https://wallpaperaccess.com/full/2076086.jpg" class="card-img-top mw-100" alt="...">
                <div class="card-body">

                    <a href="/details">
                        <h5 class="card-title">Mjolnir</h5>
                    </a>

                    <p class="card-text">Rp 120.000</p>

                    <div class="d-flex gap-2">
                        @guest
                        <a href="" class="btn btn-light bg-dark text-white w-100">Add to Cart</a>

                        @else

                        @if(Str::endsWith(Auth::user()->email, '@jh.com'))
                        <a class="btn btn-primary" href="/add-item">Update</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                        @else
                        <a href="" class="btn btn-light bg-dark text-white w-100">Add to Cart</a>

                        @endif

                        @endguest

                    </div>

                </div>
            </div>
        </div>


    </div>


</div>
@endsection