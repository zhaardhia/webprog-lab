@section('pageTitle', 'JH Furniture')
@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="text-center fs-2 mb-5">Welcome to JH Furniture</h1>
    <div class="row justify-content-center flex-wrap">


        @if( count($furnitures) == 0)
        <div class="d-flex justify-content-center text-center">
            <p class="text-black fs-1">😥 No City Found 😥</p>
        </div>
        @else
        @foreach ($furnitures as $furniture)

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100" style=" height: auto; object-fit: cover;">
                <img src="{{$furniture->image}}" class="card-img-top mw-100" alt="...">
                <div class="card-body">

                    <a href="/details">
                        <h5 class="card-title">{{$furniture->name}}</h5>
                    </a>

                    <p class="card-text">Rp {{$furniture->price}}</p>

                    <div class="d-flex gap-2">
                        @guest
                        <a href="" class="btn btn-light bg-dark text-white w-100">Add to Cart</a>

                        @else

                        @if(Str::endsWith(Auth::user()->email, '@jh.com'))
                        <a class="btn btn-primary" href="/add-item">Update</a>
                        <button id="{{$furniture->id}}" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteModal(this.id)">
                            Delete
                        </button>

                        @else
                        <a href="" class="btn btn-light bg-dark text-white w-100">Add to Cart</a>

                        @endif

                        @endguest

                    </div>

                </div>
            </div>
        </div>

        @endforeach
        @endif

    </div>


</div>

@include('layouts.delete-modal')
@endsection