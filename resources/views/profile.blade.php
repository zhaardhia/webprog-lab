@section('pageTitle', 'JH Furniture')
@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="text-center fs-2 m-5">Mamat's Profile</h1>
    <div class="d-flex justify-content-center">
        <div>
            @guest
            @else
            <p>Fullname: Mjolnir</p>
            <p>Email: Rp 999.999.000</p>
            <p>Role: Chair</p>


            @if(!Str::endsWith(Auth::user()->email, '@jh.com'))
            <p>Gender: Male</p>
            <p>Address: hjhjhj</p>
            @else

            @endif
            @endguest

        </div>
    </div>
    <div class="d-flex justify-content-center gap-3 m-5">
        <button class="btn btn-danger">Logout</button>
        <button class="btn btn-warning">View Transaction History</button>
        <a class="btn btn-info" href="/update-profile">
            Update Profile
        </a>
        <!-- <button class="btn btn-info">Update Profile</button> -->
    </div>
</div>
@endsection