@section('pageTitle', 'JH Furniture')
@extends('layouts.master')
@section('content')
<div class="container">

    <div class="alert alert-success d-none" id="cart-alert" role="alert">
        Success Add To Cart
    </div>

    <h1 class="text-center fs-2 mt-5">{{ $furniture->name }}</h1>



    <div class="d-flex justify-content-evenly mt-5">
        <img class="" src="{{ asset('storage/product/'.$furniture->image) }}" alt="" style="width: 11rem">
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
        <a class="btn btn-primary" href="/update-item/{{$furniture->id}}">Update</a>
        <button class="btn btn-danger" onclick="deleteModal(this.id)" id="{{$furniture->id}}">Delete</button>
        @else
        <button type="button" class="btn btn-info" onclick="addToCart('{{$furniture}}')">Add To Cart</button>

        @endif

        @endguest



    </div>
</div>
@endsection

<script>
    function deleteModal(id) {


        $.ajax({
            type: "POST",
            url: "/delete-furniture",
            data: {
                "_token": "{{ csrf_token() }}",
                "furniture_id": id,
            },
            success: function(result) {
                // alert.classList.remove('d-none')
                // setTimeout(() => {
                //     alert.classList.add('d-none')
                // }, 1000);

                window.history.pushState(null, null, '/');
                window.location.reload()
            },
            error: (err) => {
                console.log(err)
            }
        })
    }


    function addToCart(furnitureObj) {
        const user = '{{Auth::user()}}'
        const alertCart = document.getElementById('cart-alert')
        const {
            id,
            image,
            name,
            price
        } = JSON.parse(furnitureObj)

        if (!user) {
            window.history.pushState(null, null, '/login')
            window.location.reload()
            return;
        }

        let existingCookie = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem("cart")) : [];

        const objToAdd = {}

        const existData = existingCookie.find(item => item.id === id);
        if (existData) {
            // existData.qty += 1;
            // existData.price = 5;
            console.log('exist')
        } else {
            objToAdd.id = Number(id);
            objToAdd.price = price;
            objToAdd.totalPrice = price;
            objToAdd.image = image;
            objToAdd.qty = 1;
            objToAdd.name = name;
            existingCookie = [...existingCookie, objToAdd]
        }

        alertCart.classList.remove('d-none')
        setTimeout(() => {
            alertCart.classList.add('d-none')
        }, 1000);

        localStorage.setItem('cart', JSON.stringify(existingCookie))

    }
</script>