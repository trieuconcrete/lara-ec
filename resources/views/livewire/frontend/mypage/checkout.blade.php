<div>
    <main class="main">
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-25">
                            <h4>Billing Details</h4>
                        </div>
                        <form method="post">
                            <div class="form-group">
                                <input type="text" required="" wire:model.defer="first_name" id="first_name" name="first_name" placeholder="First name *">
                                @error('first_name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="form-group">
                                <input type="text" required="" wire:model.defer="last_name" id="last_name" name="last_name" placeholder="Last name *">
                                @error('last_name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="form-group">
                                <input type="text" wire:model.defer="billing_address" id="billing_address" name="billing_address" required="" placeholder="Address *">
                                @error('billing_address')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="form-group">
                                <input type="text" wire:model.defer="billing_address2" name="billing_address2" required="" placeholder="Address line2">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" wire:model.defer="city" name="city" placeholder="City / Town *">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" wire:model.defer="country" name="country" placeholder="Country *">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" wire:model.defer="zipcode" id="zipcode" name="zipcode" placeholder="Postcode / ZIP *">
                                @error('zipcode')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="form-group">
                                <input required="" type="text" wire:model.defer="phone" id="phone" name="phone" placeholder="Phone *">
                                @error('phone')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="form-group">
                                <input required="" type="text" wire:model.defer="email" id="email" name="email" placeholder="Email address *" value="{{ $email }}">
                                @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="mb-20">
                                <h5>Additional information</h5>
                            </div>
                            <div class="form-group mb-30">
                                <textarea rows="5" wire:model.defer="notes" placeholder="Order notes"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($carts)
                                            @foreach($carts as $item)
                                            <tr>
                                                <td class="image product-thumbnail">
                                                    <img src="{{ $item->product->getImage() }}" alt="#">
                                                </td>
                                                <td>
                                                    <h5><a href="{{ route('frontend.product.detail', $item->product_id) }}">{{ $item->product->name }}</a></h5>
                                                    <span class="product-qty">x {{ $item->quantity }}</span>
                                                </td>
                                                <td>${{ $item->sub_total_price }}</td>
                                            </tr>
                                            @endforeach
                                        <tr>
                                            <th>SubTotal</th>
                                            <td class="product-subtotal" colspan="2">${{ $carts->sum('sub_total_price') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td colspan="2"><em>Free Shipping</em></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">${{ $carts->sum('sub_total_price') }}</span></td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                            <div class="payment_method">
                                <div class="mb-25">
                                    <h5>Payment</h5>
                                </div>
                                <div class="payment_option">
                                    @error('payment_mode')<small class="text-danger">{{ $message }}</small>@enderror
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" wire:model.defer="payment_mode" name="payment_mode" checked id="exampleRadios3" value="Cash On Delivery">
                                        <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#cashOnDelivery" aria-controls="cashOnDelivery">Cash On Delivery</label>                                        
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" wire:model.defer="payment_mode" name="payment_mode" id="exampleRadios4" value="Card Payment">
                                        <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#cardPayment" aria-controls="cardPayment">Card Payment</label>                                        
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" wire:model.defer="payment_mode" name="payment_mode" id="exampleRadios5" value="Paypal">
                                        <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Paypal</label>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="btn-fill-out btn-block mt-30">
                                <button type="button" wire:click="createOrder" wire.loading.attr="disabled" class="btn btn-fill-out btn-block mt-30">
                                    <span wire:loading.remove wire.target="createOrder">Place Order</span>
                                    <span wire:loading wire.target="createOrder">Placing Order...</span>
                                </button>
                                <div id="paypal-button-container" class="mt-30"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@push('script')
<script src="https://www.paypal.com/sdk/js?client-id=AW1G1I2yEOpb8udW_TNGVCcHR39Wd4rxVStaz-fCE8hycwtSK5Ddtl8Fq2cjjlZo8MKC_EH6wJ7aqDrO&currency=USD"></script>
<script>
    paypal.Buttons({
        // onClick is called when the button is clicked
        onClick()  {
            // Show a validation error if the checkbox is not checked
            if (!document.getElementById('first_name').value
                || !document.getElementById('last_name').value
                || !document.getElementById('phone').value
                || !document.getElementById('billing_address').value
                || !document.getElementById('zipcode').value
                || !document.getElementById('email').value
            ) {
                // document.querySelector('#error').classList.remove('hidden');
                Livewire.emit('validationForAll');
                return false;
            } else {

                @this.set('first_name', document.getElementById('first_name').value);
                @this.set('last_name', document.getElementById('last_name').value);
                @this.set('billing_address', document.getElementById('billing_address').value);
                @this.set('zipcode', document.getElementById('zipcode').value);
                @this.set('phone', document.getElementById('phone').value);
                @this.set('email', document.getElementById('email').value);
            }
        },
        // Order is created on the server and the order id is returned
        createOrder(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: "{{ $carts->sum('sub_total_price') }}"
                    }
                }]
            });
        },
        // Finalize the transaction on the server after payer approval
        onApprove(data, actions) {
            return actions.order.capture().then(function(orderData) {
                // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                const transaction = orderData.purchase_units[0].payments.captures[0];
                alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                // When ready to go live, remove the alert and show a success message within this page. For example:
                // const element = document.getElementById('paypal-button-container');
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  window.location.href = 'thank_you.html';
            })
            // return fetch("/my-server/capture-paypal-order", {
            //     method: "POST",
            //     headers: {
            //     "Content-Type": "application/json",
            //     },
            //     body: JSON.stringify({
            //     orderID: data.orderID
            //     })
            // })
            // .then((response) => response.json())
            // .then((orderData) => {
            //     // Successful capture! For dev/demo purposes:
            //     console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            //     const transaction = orderData.purchase_units[0].payments.captures[0];
            //     alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            //     // When ready to go live, remove the alert and show a success message within this page. For example:
            //     // const element = document.getElementById('paypal-button-container');
            //     // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            //     // Or go to another URL:  window.location.href = 'thank_you.html';
            // });
        }
    }).render('#paypal-button-container');
  </script>
@endpush
