@section('pageTitle', 'JH Furniture')
@extends('layouts.master')
@section('content')

<div class="container">
    <h1 class="text-center fs-2 m-5">{{ Auth::user()->name }}'s Profile</h1>
    <div class="d-flex justify-content-center">
        <div>
            @guest
            @else
            <p>Fullname: {{ Auth::user()->name }}</p>
            <p>Email: {{ Auth::user()->email }}</p>


            @if(Str::endsWith(Auth::user()->email, '@jh.com'))
            <p>Role: Admin</p>
            @else
            <p>Role: Member</p>
            @endif


            @if(!Str::endsWith(Auth::user()->email, '@jh.com'))
            <p>Gender: {{ Auth::user()->gender }}</p>
            <p>Address: {{ Auth::user()->address }}</p>
            @else

            @endif
            @endguest

        </div>
    </div>
    <div class="d-flex justify-content-center gap-3 m-5">
        <button class="btn btn-danger">Logout</button>
        <a href="/tr-history" class="btn btn-warning">View Transaction History</a>
        {{-- <button class="btn btn-warning">View Transaction History</button> --}}
        <a class="btn btn-info" href="/update-profile">
            Update Profile
        </a>
        <!-- <button class="btn btn-info">Update Profile</button> -->
    </div>
</div>
@endsection