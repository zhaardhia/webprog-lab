@section('pageTitle', 'JH Furniture')
@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="text-center fs-2 mt-5">Update Profile</h1>
    <div class="d-flex justify-content-center mt-5">
        <form action="" method="POST" class="w-50">
            @guest

            @else
            <div class="mb-3">
                <label for="" class="form-label">Full Name</label>
                <input type="" class="form-control" id="" aria-describedby="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" id="">
            </div>
            @if(!Str::endsWith(Auth::user()->email, '@jh.com'))
            <div class="mb-3">
                <label for="" class="form-label">Address</label>
                <textarea class="form-control" placeholder="Input Your Address" id="floatingTextarea2" style="height: 100px"></textarea>
            </div>
            @endif
            @endguest


            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>

</div>
@endsection