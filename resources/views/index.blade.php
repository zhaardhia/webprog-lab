@section('pageTitle', 'JH Furniture')
@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="text-center fs-2 mb-5">Welcome to JH Furniture</h1>
    <div class="row justify-content-center flex-wrap">

        <div class="alert alert-success d-none" id="alert" role="alert">
            Success Delete Furniture
        </div>


        @if( count($furnitures) == 0)
        <div class="d-flex justify-content-center text-center">
            <p class="text-black fs-1">😥 No Furniture Found 😥</p>
        </div>
        @else
        @foreach ($furnitures as $furniture)

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100" style=" height: auto; object-fit: cover;">
                <img src="{{$furniture->image}}" class="card-img-top mw-100" alt="product photo" style="height: 12rem; width: 100%; object-fit: cover;">
                <div class="card-body">

                    <a href="/details/{{ $furniture->name }}" class="text-decoration-none">
                        <h5 class="card-title">{{$furniture->name}}</h5>
                    </a>

                    <p class="card-text" id="price">Rp {{$furniture->price}}</p>

                    <div class="d-flex gap-2">
                        @guest
                        <button class="btn btn-light bg-dark text-white w-100" onclick="addToCart()" type="button">
                            Add To Cart
                        </button>
                        @else

                        @if(Str::endsWith(Auth::user()->email, '@jh.com'))
                        <a class="btn btn-primary" id="update-btn" href="/add-item">Update</a>
                        <button id="{{$furniture->id}}" type="button" class="btn btn-danger" onclick="deleteModal(this.id)">
                            Delete
                        </button>

                        @else
                        <button class="btn btn-light bg-dark text-white w-100" id="{{$furniture->id}}" onclick="addToCart('{{$furniture}}')" type="button">
                            Add To Cart
                        </button>

                        <button class="btn btn-light bg-dark text-white w-100" id="{{$furniture->id}}" onclick="kcoak()" type="button">
                            Console
                        </button>

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

<script>
    function deleteModal(id) {
        const alert = document.getElementById('alert')


        $.ajax({
            type: "POST",
            url: "/delete-furniture",
            data: {
                "_token": "{{ csrf_token() }}",
                "furniture_id": id,
            },
            success: function(result) {
                alert.classList.remove('d-none')
                setTimeout(() => {
                    alert.classList.add('d-none')
                }, 1000);
                window.location.reload()
            },
            error: (err) => {
                console.log(err)
            }
        })
    }

    function kcoak() {
        console.log(JSON.parse(localStorage.getItem("cart")));
    }

    function addToCart(furnitureObj) {
        const user = '{{Auth::user()}}'

        const {
            id,
            image,
            name,
            price
        } = JSON.parse(furnitureObj)

        if (!user) {
            window.history.pushState(null, null, '/login')
            window.location.reload()
        }

        let existingCookie = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem("cart")) : [];

        const objToAdd = {}

        const existData = existingCookie.find(item => item.id === id);
        if (existData) {
            // existData.qty += 1;
            // existData.price = 5;
            return;
        } else {
            objToAdd.id = Number(id);
            objToAdd.price = price;
            objToAdd.totalPrice = price;
            objToAdd.image = image;
            objToAdd.qty = 1;
            objToAdd.name = name;
            existingCookie = [...existingCookie, objToAdd]
        }

        localStorage.setItem('cart', JSON.stringify(existingCookie))

    }
</script>

@endsection