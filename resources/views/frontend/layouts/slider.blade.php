@php
	$slider = App\Models\Product::where('main_slider',1)->latest()->first(); 
@endphp	
	
	<!-- Banner -->
	<div class="banner">
		<div class="banner_background" style="background-image:url({{asset('frontend')}}/images/banner_background.jpg)"></div>
		<div class="container fill_height">
			<div class="row fill_height">
				<div class="banner_product_image"><img src="{{asset($slider->default_image)}}" alt=""></div>
				<div class="col-lg-5 offset-lg-4 fill_height">
					<div class="banner_content">
						<h1 class="banner_text">{{$slider->product_name}}</h1>
						@if($slider->price_active == 1)
						<div class="banner_price">${{$slider->selling_price}}</div>
						@else
						<div class="banner_price"><span>${{$slider->selling_price}}</span>${{$slider->discount_price}}</div>
						@endif
						<div class="banner_product_name">{{$slider->brand->brand_name}}</div>
						
						<div class="button banner_button"><a href="#">Shop Now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>