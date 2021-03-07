@extends('frontend.layouts.master')
@section('title','Payment process')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/styles/cart_responsive.css">

<style type="text/css">

	/**
	 * The CSS shown here will not be introduced in the Quickstart guide, but shows
	 * how you can use CSS to style your Element's container.
	 */
	.StripeElement {
	  box-sizing: border-box;

	  height: 40px;
	  width: 100%;

	  padding: 10px 12px;

	  border: 1px solid transparent;
	  border-radius: 4px;
	  background-color: white;

	  box-shadow: 0 1px 3px 0 #e6ebf1;
	  -webkit-transition: box-shadow 150ms ease;
	  transition: box-shadow 150ms ease;
	}

	.StripeElement--focus {
	  box-shadow: 0 1px 3px 0 #cfd7df;
	}

	.StripeElement--invalid {
	  border-color: #fa755a;
	}

	.StripeElement--webkit-autofill {
	  background-color: #fefde5 !important;
	}
</style>




<div class="cart_section pt-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="cart_title mb-3">Payment process</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <!-- Order Total -->
                <div class="row">

                    <div class="col-md-12">
                    <div class="your-order">
                            @php

                            $shipping_charge = 50;
                            $vat = 0;

                            if(Session::has('coupon')){
                            $coupon_name = Session::get('coupon')['name'];
                            $coupon_discount = Session::get('coupon')['discount'];
                            }else{
                            $coupon_name = '';
                            $coupon_discount = 0;
                            }

                            if(Session::has('coupon')){
                            $total = (Cart::subtotalFloat() - Session::get('coupon')['discount']) + $shipping_charge;
                            }else{
                            $total = Cart::subtotalFloat() + $shipping_charge;
                            }

                            @endphp
                            <table class="table table-bordered">
                                <tr>
                                    <th>Sub Total</th>
                                    <td>${{Cart::subtotalFloat()}}</td>
                                </tr>
                                <tr>
                                    <th>Shipping Charge</th>
                                    <td>${{$shipping_charge}}</td>
                                </tr>
                                <tr>
                                    <th>Vat</th>
                                    <td>${{$vat}}</td>
                                </tr>
                                <tr>
                                    <th>Coupon Discount @if(Session::has('coupon')) : ({{$coupon_name}}) @endif</th>
                                    <td> @if(Session::has('coupon')) -${{Session::get('coupon')['discount']}} @else $0 @endif</td>
                                </tr>

                                <tr>
                                    <th>Total</th>
                                    <td>${{$total}}</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card card-body" style="border-radius: 0;">
                    <h4 class="mb-4">Pay Now</h4>
                    <form action="{{route('stripe.charge')}}" method="post" id="payment-form">
                        @csrf
                        <div class="form-row">
                            <label for="card-element">
                                Credit or debit card
                            </label>
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>

                        <!-- passing data -->
                        <input type="hidden" name="name" value="{{$name}}">
                        <input type="hidden" name="phone" value="{{$phone}}">
                        <input type="hidden" name="email" value="{{$email}}">
                        <input type="hidden" name="division_id" value="{{$division_id}}">
                        <input type="hidden" name="division_id" value="{{$division_id}}">
                        <input type="hidden" name="district_id" value="{{$district_id}}">
                        <input type="hidden" name="address" value="{{$address}}">

                        <input type="hidden" name="payment_type" value="{{$payment_type}}">
                        <input type="hidden" name="shipping_charge" value="{{$shipping_charge}}">
                        <input type="hidden" name="coupon_discount" value="{{$coupon_discount}}">
                        <input type="hidden" name="vat" value="{{$vat}}">
                        <input type="hidden" name="total" value="{{$total}}">

                        <button class="btn btn-info btn-sm mt-2">Pay Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('customjs')
    <script type="text/javascript">
        // Create a Stripe client.
        var stripe = Stripe('pk_test_51IRtnOCYitchOLcaSe0yo9x6X9SMBQ1CtW978LZHI2JVQE4BsVgQeYkhVPyF7VBBi7gw2fuZz17IvYsHQx7rocBS0010Xz7ysl');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {
            style: style
        });

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>

    @endsection
    @endsection