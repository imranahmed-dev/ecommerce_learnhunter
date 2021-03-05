@extends('frontend.layouts.master')
@section('title','Product Details')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/styles/product_responsive.css">

<!-- Single Product -->
<div class="single_product">
	<div class="container">
		<div class="row">

			<!-- Images -->
			<div class="col-lg-2 order-lg-1 order-2">
				<ul class="image_list">
					<li data-image="{{asset($product->default_image)}}"><img src="{{asset($product->default_image)}}" alt=""></li>
					<li data-image="{{asset($product->sub_image_one)}}"><img src="{{asset($product->sub_image_one)}}" alt=""></li>
					<li data-image="{{asset($product->sub_image_two)}}"><img src="{{asset($product->sub_image_two)}}" alt=""></li>
				</ul>
			</div>

			<!-- Selected Image -->
			<div class="col-lg-5 order-lg-2 order-1">
				<div class="image_selected"><img src="{{asset($product->default_image)}}" alt=""></div>
			</div>

			<!-- Description -->
			<div class="col-lg-5 order-3">
				<div class="product_description">
					<div class="product_category">{{$product->category->category_name}}</div>
					<div class="product_name">{{$product->product_name}}</div>
					<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
					<div class="product_text">
						{!! $product->product_description !!}
					</div>
					<div class="order_info d-flex flex-row">
						<form action="{{route}}">
							<div class="clearfix" style="z-index: 1000;">

								<!-- Product Quantity -->
								<div class="product_quantity clearfix mb-4">
									<span>Quantity: </span>
									<input id="quantity_input" type="text" pattern="[0-9]*" value="1">
									<div class="quantity_buttons">
										<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
										<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
									</div>
								</div>

								@php 
								$colors = App\Models\ProductColor::where('product_id',$product->id)->get();
								$sizes = App\Models\ProductSize::where('product_id',$product->id)->get();
								@endphp

								<!-- Product Color -->
								<p class="mb-1"><strong>Select Color:</strong></p>
								@foreach($colors as $color)
								<input type="radio" id="color_{{$color->color->color}}" name="color" value="{{$color->color->color}}">
								<label class="mr-2" for="color_{{$color->color->color}}"> {{$color->color->color}}</label>
								@endforeach

								<!-- Product Size -->
								<p class="mb-1 mt-3"><strong>Select Size:</strong></p>
								@foreach($sizes as $size)
								<input type="radio" id="size_{{$size->size->size}}" name="size" value="{{$size->size->size}}">
								<label for="size_{{$size->size->size}}"> {{$size->size->size}}</label><br>
								@endforeach

							</div>

							@if($product->price_active == 1)
							<div class="product_price discount mt-3">${{$product->selling_price}}<span></div>
							@else
							<div class="product_price discount mt-3">${{$product->discount_price}}<span><del>${{$product->selling_price}}</del></span></div>
							@endif
							<div class="button_container">
								<button type="button" class="button cart_button">Add to Cart</button>
								<div class="product_fav"><i class="fas fa-heart"></i></div>
							</div>

						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

@php
$recent = App\Models\Product::where('status',1)->where('category_id',$product->category_id)->get();
@endphp
<!-- Recently Viewed -->
<div class="viewed">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="viewed_title_container">
					<h3 class="viewed_title">Related Product</h3>
					<div class="viewed_nav_container">
						<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
					</div>
				</div>

				<div class="viewed_slider_container">

					<!-- Recently Viewed Slider -->

					<div class="owl-carousel owl-theme viewed_slider">
						@foreach($recent as $product)
						<!-- Recently Viewed Item -->
						<div class="owl-item">
							<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
								<div class="viewed_image"><img src="{{asset($product->default_image)}}" alt=""></div>
								<div class="viewed_content text-center">
									@if($product->price_active == 1)
									<div class="viewed_price">${{$product->selling_price}}</div>
									@else
									<div class="viewed_price">${{$product->discount_price}}<span>${{$product->selling_price}}</span></div>
									@endif
									<div class="viewed_name"><a href="{{route('product.details',$product->product_slug)}}">{{ Str::limit($product->product_name, 15) }}</a></div>
								</div>
								<ul class="item_marks">

									@if($product->price_active == 2)
									@if($product->discount_type == 1)
									<li class="item_mark product_discount">-${{$product->discount}}</li>
									@else
									<li class="item_mark item_discount">-{{$product->discount}}%</li>
									@endif
									@endif
									<!-- <li class="product_mark product_new">new</li> -->
								</ul>
							</div>
						</div>
						@endforeach

					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- Brands -->
<div class="brands">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="brands_slider_container">

					<!-- Brands Slider -->

					<div class="owl-carousel owl-theme brands_slider">
						@foreach($brands as $brand)
						<div class="owl-item">
							<div class="brands_item d-flex flex-column justify-content-center"><img style="width: 100px;" src="{{asset($brand->brand_logo)}}" alt=""></div>
						</div>
						@endforeach

					</div>

					<!-- Brands Slider Navigation -->
					<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
					<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

				</div>
			</div>
		</div>
	</div>
</div>

@section('customjs')
<script src="{{asset('frontend')}}/js/product_custom.js"></script>
<script src="{{asset('frontend')}}/js/custom.js"></script>
@endsection
@endsection