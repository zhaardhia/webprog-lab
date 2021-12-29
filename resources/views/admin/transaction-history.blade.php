@section('pageTitle', 'JH Furniture')
@extends('layouts.master')
@section('content')
<div class="container">
  <h1 class="text-center fs-2 mt-5">Transaction History</h1>
  @if( count($transactions) == 0)
  <div class="d-flex justify-content-center text-center mt-5">
    <p class="text-black fs-1">😥 No Transaction Found 😥</p>
  </div>
  @else
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
      <a href="/tr-history/{{ $transaction->id }}" class="">View Detail >> </a>
    </div>
  </div>
  @endforeach
  @endif
</div>
@endsection