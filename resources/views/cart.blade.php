@section('pageTitle', 'JH Furniture Cart')
@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="text-center fs-2 mb-5">Your Cart</h1>

    <div id="cart-data"></div>

    <h2 id="total" class="text-black text-center fs-2 mt-5"></h2>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary m-auto d-flex mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Proceed To Checkout
    </button>


</div>

<script>
    const totalText = document.getElementById('total')
    const container = document.getElementById('cart-data')
    const products = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem("cart")) : [];


    const formatRp = (value) => {
        const formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
        });
        return formatter.format(value).replace(/,00/, '');
    };

    window.onload = () => {

        if (products.length < 1) {
            container.innerHTML += `<p class="text-center"> No Data </p`
        } else {
            products.forEach(item => {
                container.innerHTML += `
            <div class="d-flex align-items-center gap-5 justify-content-center mb-2">

                <img class="mw-100 h-auto" style="width: 6rem; object-fit: cover;" src={{ asset('storage/product/${item.image}') }} alt="">

                <div>
                    <ul class="list-group">
                        <li class="list-group-item">Name: ${item.name}</li>
                        <li class="list-group-item">Price: <span id=${item.id}-price>${item.price}</span></li>
                        <li class="list-group-item">Qty: <span id=${item.id}-qty>${item.qty}</span></li>

                    </ul>
                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-primary" id=${item.id} type="button" onclick="addQty(${item.id})"><i class="bi bi-plus-lg"></i></button>
                    <button class="btn btn-primary" id=${item.id} type="button" onclick="minQty(${item.id})"><i class="bi bi-dash-lg"></i></button>
                </div>


            </div>
            
            `
            })
        }

        totalText.innerHTML = "Total " + formatRp(products.reduce((a, b) => Number(a) + Number(b.totalPrice), 0)) || 0

        console.log(products)
    }


    function addQty(id) {

        const objToAdd = {}

        const idQty = document.getElementById(`${id}-qty`)
        const idPrice = document.getElementById(`${id}-price`)

        idQty.innerHTML = Number(idQty.innerHTML) + 1

        const findExistingProduct = products.find(item => Number(item.id) === id)

        if (findExistingProduct) {
            findExistingProduct.totalPrice = Number(idQty.innerHTML) * Number(idPrice.innerHTML);
            findExistingProduct.qty = Number(idQty.innerHTML)
        } else {
            objToAdd.id = id;
            objToAdd.price = Number(idQty.innerHTML) * Number(idPrice.innerHTML);

            products.push(objToAdd)

        }


        totalText.innerHTML = "Total " + formatRp(products.reduce((a, b) => Number(a) + Number(b.totalPrice), 0))
        localStorage.setItem('cart', JSON.stringify(products))

    }

    function minQty(id) {

        const objToAdd = {}
        const idQty = document.getElementById(`${id}-qty`)
        const idPrice = document.getElementById(`${id}-price`)


        idQty.innerHTML = Number(idQty.innerHTML) - 1

        const findExistingProduct = products.find(item => Number(item.id) === id)

        if (findExistingProduct) {
            findExistingProduct.totalPrice = Number(idQty.innerHTML) * Number(idPrice.innerHTML);
            findExistingProduct.qty = Number(idQty.innerHTML)
        } else {
            objToAdd.id = id;
            objToAdd.price = Number(idQty.innerHTML) * Number(idPrice.innerHTML);

            products.push(objToAdd)

        }

        totalText.innerHTML = "Total " + formatRp(products.reduce((a, b) => Number(a) + Number(b.totalPrice), 0))


        if (Number(idQty.innerHTML < 1)) {
            products.splice(products.findIndex(function(i) {
                return Number(i.id) === id;
            }), 1);

            window.location.reload()
        }

        localStorage.setItem('cart', JSON.stringify(products))
    }
</script>
@endsection

@include('layouts.checkoutmodal')