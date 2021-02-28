@extends('frontend.layouts.master')
@section('title','Cart')
@section('content')
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset('frontend/images/bg-01.jpg')}});">
		<h2 class="ltext-105 cl0 txt-center">
			Shopping Cart
		</h2>
	</section>	

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 30px;">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Product</th>
								<th class="column-2"></th>
								<th class="column-3">Price</th>
								<th class="column-4">Quantity</th>
								<th class="column-5">Total</th>
								<th>Action</th>
							</tr>
							@foreach(Cart::content() as $cartproduct)
							<tr class="table_row">
								<td class="column-1">
									<div class="how-itemcart1">
										<img src="{{asset($cartproduct->options->image)}}" alt="IMG">
									</div>
								</td>
								<td class="column-2">{{$cartproduct->name}}</td>
								<td class="column-3">Tk {{$cartproduct->price}}</td>
								<td class="column-4">
									<div class="wrap-num-product flex-w m-l-auto m-r-0">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="{{$cartproduct->qty}}">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>
								</td>
								<td class="column-5">Tk {{$cartproduct->total}}</td>
								<td class="column-2"><a href="{{route('cart.destroy',$cartproduct->rowId)}}">X</a></td>
							</tr>
							@endforeach
						</table>
					</div>
				</div>

				<div class="col-md-12 col-lg-12 col-xl-12">
					<div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">
                                    <h5>What would you like to do next?</h5>
                                    <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                                </th>
                            </tr>
                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="total_area">
                                        <ul>
                                        <li>Sub Total <span>Tk {{Cart::subtotal()}}</span></li>
                                        <li>Tax <span> Tk {{Cart::tax()}}</span></li>
                                        <li>Shipping Cost <span>Free</span></li>
                                        <li>Total <span>Tk {{Cart::total()}}</span></li>
                                    </ul>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">
                            <a href="{{url('/')}}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Continue Shopping</a>
                            &nbsp;&nbsp;

                            <a href="{{route('cart.checkout')}}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Checkout</a>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</form>


@endsection