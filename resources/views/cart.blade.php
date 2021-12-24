@section('pageTitle', 'JH Furniture Cart')
@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="text-center fs-2 mb-5">Your Cart</h1>


    <div class="d-flex align-items-center gap-5 justify-content-center mb-2">

        <img class="mw-100 h-auto" style="width: 6rem; object-fit: cover;" src="https://images.tokopedia.net/img/cache/500-square/product-1/2019/5/18/787530/787530_6597e33b-4c84-4e7a-aed0-7391a6e6bc11_960_960.jpg" alt="">

        <div>
            <ul class="list-group">
                <li class="list-group-item">Name: An item</li>
                <li class="list-group-item">Price: <span id="123-price">120000</span></li>
                <li class="list-group-item">Qty: <span id="123-qty">1</span></li>

            </ul>
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary" id="123" type="button" onclick="addQty(this.id)"><i class="bi bi-plus-lg"></i></button>
            <button class="btn btn-primary" id="123" type="button" onclick="minQty(this.id)"><i class="bi bi-dash-lg"></i></button>
        </div>


    </div>

    <div class="d-flex align-items-center gap-5 justify-content-center">

        <img class="mw-100 h-auto" style="width: 6rem; object-fit: cover;" src="https://images.tokopedia.net/img/cache/500-square/product-1/2019/5/18/787530/787530_6597e33b-4c84-4e7a-aed0-7391a6e6bc11_960_960.jpg" alt="">

        <div>
            <ul class="list-group">
                <li class="list-group-item">Name: An item</li>
                <li class="list-group-item">Price: <span id="125-price">1000</span></li>
                <li class="list-group-item">Qty: <span id="125-qty">1</span></li>

            </ul>
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary" id="125" type="button" onclick="addQty(this.id)"><i class="bi bi-plus-lg"></i></button>
            <button class="btn btn-primary" id="125" type="button" onclick="minQty(this.id)"><i class="bi bi-dash-lg"></i></button>
        </div>


    </div>

    <h2 id="total" class="text-black text-center fs-2 mt-5"></h2>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary m-auto d-flex mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Proceed To Checkout
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Checkout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Select Payment</option>
                            <option value="1">Credit Card</option>
                            <option value="2">Debit</option>
                        </select>

                        <button class="btn btn-primary mt-3">Pay</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


</div>

<script>
    const totalText = document.getElementById('total')
    const products = []


    const formatRp = (value) => {
        const formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
        });
        return formatter.format(value).replace(/,00/, '');
    };

    window.onload = () => {
        totalText.innerHTML = "Total " + formatRp(products.reduce((a, b) => a + b.price, 0)) || 0
    }


    function addQty(id) {

        const objToAdd = {}

        const idQty = document.getElementById(`${id}-qty`)
        const idPrice = document.getElementById(`${id}-price`)

        idQty.innerHTML = Number(idQty.innerHTML) + 1

        const findExistingProduct = products.find(item => item.id === id)

        if (findExistingProduct) {
            findExistingProduct.price = Number(idQty.innerHTML) * Number(idPrice.innerHTML);
        } else {
            objToAdd.id = id;
            objToAdd.price = Number(idQty.innerHTML) * Number(idPrice.innerHTML);

            products.push(objToAdd)

        }

        totalText.innerHTML = "Total " + formatRp(products.reduce((a, b) => a + b.price, 0))
    }

    function minQty(id) {

        const objToAdd = {}
        const idQty = document.getElementById(`${id}-qty`)
        const idPrice = document.getElementById(`${id}-price`)


        idQty.innerHTML = Number(idQty.innerHTML) - 1

        const findExistingProduct = products.find(item => item.id === id)

        if (findExistingProduct) {
            findExistingProduct.price = Number(idQty.innerHTML) * Number(idPrice.innerHTML);
        } else {
            objToAdd.id = id;
            objToAdd.price = Number(idQty.innerHTML) * Number(idPrice.innerHTML);

            products.push(objToAdd)

        }

        totalText.innerHTML = "Total " + formatRp(products.reduce((a, b) => a + b.price, 0))
    }
</script>
@endsection