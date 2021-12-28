   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Checkout</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                   <div class="alert alert-success d-none" role="alert" id="alert">
                       Transaction Success!
                   </div>

                   <div class="alert alert-warning d-none" role="alert" id="info">
                       <p>Oops! there is no item in your cart :(</p>
                   </div>

                   <form action="">
                       <select required class="form-select" aria-label="Method" id="method">
                           <option value="" selected>Select Payment</option>
                           <option value="credit">Credit Card</option>
                           <option value="debit">Debit</option>
                       </select>

                       <div class="my-3">
                           <input required type="text" class="form-control" placeholder="card number" id="card-number">
                       </div>

                       <button class="btn btn-primary mt-3" type="button" onclick="payTransaction()">Pay</button>
                   </form>
               </div>

           </div>
       </div>
   </div>

   <script>
       function payTransaction() {
           event.preventDefault()


           const alertComponent = document.getElementById('alert')
           const infoComponent = document.getElementById('info')

           const products = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : []
           const totalPrice = products.reduce((a, b) => Number(a) + Number(b.totalPrice), 0);
           const method = document.getElementById('method').value;
           const cardNumber = document.getElementById('card-number').value

           if (products.length < 1) {
               infoComponent.classList.remove('d-none')

               setTimeout(() => {
                   infoComponent.classList.add('d-none')
               }, 3000);
               return;
           }


           $.ajax({
               type: "POST",
               url: "/insert-transaction",
               data: {
                   "_token": "{{ csrf_token() }}",
                   totalPrice,
                   method,
                   cardNumber,
                   product: JSON.stringify(products)
               },
               success: function(result) {
                   alertComponent.classList.remove('d-none')
                   localStorage.clear('cart');

                   setTimeout(() => {
                       alertComponent.classList.add('d-none')
                       window.location.reload();

                   }, 3000);
               },
               error: (err) => {
                   console.log(err)
               }
           })
       }
   </script>