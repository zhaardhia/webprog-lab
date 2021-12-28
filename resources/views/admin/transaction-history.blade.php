@section('pageTitle', 'JH Furniture')
@extends('layouts.master')
@section('content')
    <div class="container">
        <h1 class="text-center fs-2 mt-5">Transaction History</h1>
        @foreach ($transactions as $transaction)
        <div class="card w-100 mt-5 mb-5" style="">
            <div class="card-body">
              <h5 class="card-title">Transaction Id: {{ $transaction->id }}</h5>
              <p class="card-text">Transaction date: {{ $transaction->created_at }}</p>
              <p class="card-text">Method: {{ $transaction->method }}</p>
              <p class="card-text">Card: {{ $transaction->card_number }}</p>
              @if (Str::endsWith(Auth::user()->email, '@jh.com'))
              <p class="card-text">User's Name: {{ $transaction->user->name}}</p>
              @endif
              {{-- <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Furniture's Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price For Each Furnitures</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Larry the Bird</td>
                    <td>@twitter</td>
                    <td>wkwk</td>
                  </tr>
                  <tr>
                    <th scope="row" colspan="3">Total Price</th>
                    <td><strong>Rp 2000</strong></td>
                  </tr>
                </tbody>
              </table> --}}
              <a href="/tr-history/{{ $transaction->id }}" class="">View Detail >> </a>
            </div>
        </div>
        @endforeach
    </div>
@endsection