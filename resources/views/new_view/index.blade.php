@extends('new_view.layouts.app')

@section('title', 'Colorshop')

@section('body')


<!-- Slider -->
@foreach ($slider as $slide)
	{{-- expr --}}

<div class="main_slider" style="background-image:url({{ asset('images/'.$slide->image) }})">
	<div class="container fill_height">
		<div class="row align-items-center fill_height">
			<div class="col">
				<div class="main_slider_content">
					<h6>{{ $slide->caption1 }}</h6>
					<h1>{{ $slide->caption2 }}</h1>
					<div class="red_button shop_now_button"><a href="#">shop now</a></div>
				</div>
			</div>
		</div>
	</div>
</div>

@endforeach

<!-- Banner -->

<div class="banner">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="banner_item align-items-center" style="background-image:url(images/banner_1.jpg)">
					<div class="banner_category">
						<a href="categories.html">women's</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="banner_item align-items-center" style="background-image:url(images/banner_2.jpg)">
					<div class="banner_category">
						<a href="categories.html">accessories's</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="banner_item align-items-center" style="background-image:url(images/banner_3.jpg)">
					<div class="banner_category">
						<a href="categories.html">men's</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- New Arrivals -->

<div class="new_arrivals">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_title new_arrivals_title">
					<h2>New Arrivals</h2>
				</div>
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col text-center">
				<div class="new_arrivals_sorting">
					<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
						<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
						@foreach ($catagories as $cat)
							{{-- expr --}}
						
						<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".{{ $cat->name }}">{{ $cat->name }}</li>
						
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

					<!-- Product 1 -->
				@foreach ($catagories as $element)
					{{-- expr --}}
					@foreach ($element->products->slice(0,4) as $procat)
					{{-- expr --}}
				
					<div class="product-item {{ $element->name }}">
						<div class="product discount product_filter">
							<div class="product_image">
								<img src="{{ asset('storage/'.$procat->image) }}" alt="">
							</div>
							<div class="favorite favorite_left"></div>
							<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
							<div class="product_info">
								<h6 class="product_name"><a href="single.html">{{$procat->name}}</a></h6>
								<div class="product_price">${{ $procat->price }}<span>${{ $procat->price }}</span></div>
							</div>
						</div>
						<div class="red_button add_to_cart_button"><a href="{{ route('product.single', $procat->id) }}">add to cart</a></div>
					</div>
					@endforeach
				@endforeach
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection