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
                                <input type="text" required="" wire:model="first_name" name="first_name" placeholder="First name *">
                                @error('first_name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="form-group">
                                <input type="text" required="" wire:model="last_name" name="last_name" placeholder="Last name *">
                                @error('last_name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="form-group">
                                <input type="text" wire:model="billing_address" name="billing_address" required="" placeholder="Address *">
                                @error('billing_address')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="form-group">
                                <input type="text" wire:model="billing_address2" name="billing_address2" required="" placeholder="Address line2">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" wire:model="city" name="city" placeholder="City / Town *">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" wire:model="country" name="country" placeholder="Country *">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" wire:model="zipcode" name="zipcode" placeholder="Postcode / ZIP *">
                                @error('zipcode')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="form-group">
                                <input required="" type="text" wire:model="phone" name="phone" placeholder="Phone *">
                                @error('phone')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="form-group">
                                <input required="" type="text" wire:model="email" name="email" placeholder="Email address *" value="{{ $email }}">
                                @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="mb-20">
                                <h5>Additional information</h5>
                            </div>
                            <div class="form-group mb-30">
                                <textarea rows="5" wire:model="notes" placeholder="Order notes"></textarea>
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
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_mode" id="exampleRadios3">
                                        <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#cashOnDelivery" aria-controls="cashOnDelivery">Cash On Delivery</label>                                        
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_mode" id="exampleRadios4">
                                        <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#cardPayment" aria-controls="cardPayment">Card Payment</label>                                        
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_mode" id="exampleRadios5">
                                        <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Paypal</label>                                        
                                    </div>
                                </div>
                            </div>
                            <a wire:click="createOrder" class="btn btn-fill-out btn-block mt-30">Place Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
