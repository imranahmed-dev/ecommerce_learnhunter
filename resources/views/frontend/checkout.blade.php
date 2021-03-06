@extends('frontend.layouts.master')
@section('title','Checkout')
@section('content')


<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/styles/cart_responsive.css">

<div class="cart_section pt-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="cart_title mb-3">Checkout</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="cart_container">
                    <div class="cart_items mt-0">
                        <ul class="card" style="border-radius: 0;">
                            <div class="card-body">
                                <h4>Product</h4>
                            </div>
                            @foreach(Cart::content() as $product)
                            <li class="cart_item clearfix">
                                <div class="cart_item_image"><img src="{{asset($product->options->image)}}" alt=""></div>
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title">Name</div>
                                        <div class="cart_item_text">{{$product->name}}</div>
                                    </div>
                                    <div class="cart_item_quantity cart_info_col">
                                        <div class="cart_item_title">Quantity</div>
                                        <div class="cart_item_text">{{$product->qty}}</div>
                                    </div>
                                    <div class="cart_item_price cart_info_col">
                                        <div class="cart_item_title">Price</div>
                                        <div class="cart_item_text">${{$product->price}}</div>
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Total</div>
                                        <div class="cart_item_text">${{$product->total}}</div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                <!-- Order Total -->
                <div class="row">

                    <div class="col-md-12">
                        <div class="your-order mt-4">
                            @php
                            $shipping = 50;
                            @endphp
                            <table class="table table-bordered">
                                <tr>
                                    <th>Sub Total</th>
                                    <td>${{Cart::subtotalFloat()}}</td>
                                </tr>
                                <tr>
                                    <th>Shipping Charge</th>
                                    <td>${{$shipping}}</td>
                                </tr>
                                @if(Session::has('coupon'))
                                <tr>
                                    <th>Coupon Discount : ({{Session::get('coupon')['name']}}) </th>
                                    <td>-${{Session::get('coupon')['discount']}}</td>
                                </tr>
                                @else
                                <tr>
                                    <th>Coupon Discount</th>
                                    <td>$0</td>
                                </tr>
                                @endif

                                <tr>
                                    <th>Total</th>
                                    @if(Session::has('coupon'))
                                    <td>${{(Cart::subtotalFloat() - Session::get('coupon')['discount']) + $shipping}}</td>
                                    @else
                                    <td>${{Cart::subtotalFloat() + $shipping}}</td>
                                    @endif
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <form action="{{route('payment.process')}}" method="post">
                    @csrf
                    <div class="card card-body" style="border-radius: 0;">
                        <h4 class="mb-4">Billing Information</h4>
                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input type="text" name="name" placeholder="Full name" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" placeholder="Phone number" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" placeholder="Email" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="">Division</label>
                            <select class="form-control form-control-sm m-0" name="division_id" id="division_id">
                                <option value="">Select Division</option>
                                @foreach($divisions as $division)
                                <option value="{{$division->id}}" {{ old('division_id') == $division->id ? 'selected' : '' }}>{{$division->division_name}}</option>
                                @endforeach
                            </select>
                            <div style='color:red; padding: 0 5px;'>{{($errors->has('division_id'))?($errors->first('division_id')):''}}</div>
                        </div>
                        <div class="form-group">
                            <label for="">District</label>
                            <select class="form-control form-control-sm m-0" name="district_id" id="district_id">
                                <option value="">Select District</option>
                            </select>
                            <div style='color:red; padding: 0 5px;'>{{($errors->has('district_id'))?($errors->first('district_id')):''}}</div>
                        </div>
                        <div class="form-group">
                            <label for="">Full Address</label>
                            <textarea name="address" id="" rows="4" class="form-control form-control-sm" placeholder="Full Address"></textarea>
                        </div>
                        <div class="form-group mt-2">
                            <h4>Payment Method</h4>
                        </div>
                        <div class="form-group">
                            <input type="radio" id="stripe" name="payment" value="Stripe">
                            <label class="mr-2" for="stripe"> Stripe</label>

                            <!-- <input type="radio" id="paypal" name="payment" value="Paypal">
                            <label class="mr-2" for="paypal"> Paypal</label> -->

                            <input type="radio" id="ideal" name="payment" value="Ideal">
                            <label class="mr-2" for="ideal"> Ideal</label>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Pay Now</button>
                </form>
            </div>
        </div>
    </div>
</div>


@section('customjs')
<script>
    $(function() {
        $(document).on('change', '#division_id', function() {
            var division_id = $(this).val();
            $.ajax({
                type: "Get",
                url: "{{url('/get/division/')}}/" + division_id,
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">Select District</option>';
                    $.each(data, function(key, val) {
                        html += '<option value="' + val.id + '">' + val.district_name + '</option>';
                    });
                    $('#district_id').html(html);
                },

            });
        });
    });
</script>
@endsection
@endsection