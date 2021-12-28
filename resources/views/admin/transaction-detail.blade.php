@section('pageTitle', 'JH Furniture')
@extends('layouts.master')
@section('content')

<div class="container">
    <div class="card w-100 mt-5" style="">
        <div class="card-body">
          <h5 class="card-title">Transaction Id: {{ $details[0]->transaction_id }}</h5>
          <p class="card-text">Transaction date: {{ $details[0]->created_at }}</p>
          {{-- <p class="card-text">Method: {{ $transaction->method }}</p>
          <p class="card-text">Card: {{ $transaction->card_number }}</p>
          @if (Str::endsWith(Auth::user()->email, '@jh.com'))
          <p class="card-text">User's Name: {{ $transaction->user->name}}</p>
          @endif --}}
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Furniture's Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Price For Each Furnitures</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($details as $detail)
                    
                    <tr>
                        <td>{{ $detail->furniture->name }}</td>
                        <td>{{ $detail->furniture->price }}</td>
                        <td>{{ $detail->qty }}</td>
                        <td>{{ $detail->price }}</td>
                      </tr>
                @endforeach
              <tr>
                <th scope="row" colspan="3">Total Price</th>
                <td><strong>Rp {{ $sum }}</strong></td>
              </tr>
            </tbody>
        </table>
          <a href="/tr-history"><< Back</a>
        </div>
    </div>
    
</div>


@endsection