@section('pageTitle', 'JH Furniture')
@extends('layouts.master')
@section('content')
    <div class="container">
        <h1 class="text-center fs-2 m-5">Mamat's Profile</h1>
        <div class="d-flex justify-content-center">
            <div>
                <p>Name: Mjolnir</p>
                <p>Price: Rp 999.999.000</p>
                <p>Type: Chair</p>
                <p>Color: Maroon</p>
            </div>
        </div>
        <div class="d-flex justify-content-center gap-3 m-5">
            <button class="btn btn-danger">Logout</button>
            <button class="btn btn-warning">View Transaction History</button>
            <button class="btn btn-info">Update Profile</button>
        </div>
    </div>
@endsection