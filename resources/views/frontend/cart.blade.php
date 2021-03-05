@extends('frontend.layouts.master')
@section('title','Cart')
@section('content')
<!-- Cart -->

<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/styles/cart_responsive.css">

<div class="cart_section pt-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="cart_container">
					<div class="cart_title">Shopping Cart</div>
					<div class="cart_items">
						<ul class="cart_list">
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

					<!-- Order Total -->
					<div class="card card-body mt-4">
						<div class="row">
							<div class="col-md-6">
								@if(!Session::has('coupon'))
								<form action="{{route('apply.coupon')}}" method="post">
									@csrf
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<input type="text" name="coupon" placeholder="Coupon" class="form-control">
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="submit" class="btn btn-primary">
												</div>
											</div>
										</div>
									</div>
								</form>
								@endif
							</div>
							<div class="col-md-6">
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
										<th>Coupon Discount : ({{Session::get('coupon')['name']}}) <a class="ml-2" href="{{route('coupon.remove')}}"><i class="fa fa-times"></i></a> </th>
										<td>${{Session::get('coupon')['discount']}}</td>
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
										<td>${{Cart::subtotalFloat() - $shipping - Session::get('coupon')['discount']}}</td>
										@else
										<td>${{Cart::subtotalFloat() - $shipping}}</td>
										@endif
									</tr>

								</table>
							</div>
						</div>
					</div>

					<div class="cart_buttons mt-3">
						<a href="#" class="button cart_button_clear">Continue Shopping</a>
						<a href="#" class="button cart_button_checkout">Checkout</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection