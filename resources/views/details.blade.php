@section('pageTitle', 'JH Furniture')
@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="text-center fs-2 mt-5">{{ $furniture->name }}</h1>
    <div class="d-flex justify-content-evenly mt-5">
        <img class="" src="{{ $furniture->image }}" alt="" style="width: 11rem">
        <div>
            <p>Name: {{ $furniture->name }}</p>
            <p>Price: Rp {{ $furniture->price }}</p>
            <p>Type: {{ $furniture->type }}</p>
            <p>Color: {{ $furniture->color }}</p>
        </div>
    </div>
    <div class="d-flex justify-content-evenly mt-5">
        {{-- <button type="button" class="btn btn-dark">Previous</button> --}}
        <a href="{{ url()->previous() }}" type="button" class="btn btn-dark">Previous</a>
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