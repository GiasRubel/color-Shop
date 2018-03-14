@extends('user.layouts.app')

@section('title', 'Eshop')

@section('body')
	
<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						@foreach ($products->slice(0,3) as $product)
							<li data-target="#slider-carousel" data-slide-to="{{$loop->index}}" class="@if ($loop->first)
								active
							@endif"></li>
						@endforeach
					</ol>
					
					<div class="carousel-inner">
						@foreach ($products->slice(0,3) as $product)
						
						<div class="item @if ($loop->first)
							active
						@endif">
							<div class="col-sm-6">
								<h1><span>E</span>-SHOPPER</h1>
								<h2>{{$product->name}}</h2>
								<p>{!! substr(htmlspecialchars_decode($product->details),0,50)!!}{{strlen( $product->details ) > 50 ? "..." : ''}} </p>
								<button type="button" class="btn btn-default get">Get it now</button>
							</div>
							<div class="col-sm-6">
								<img src="{{ asset('storage/'. $product->image) }}" class="girl img-responsive" alt="" />
								{{-- <img src="images/home/pricing.png"  class="pricing" alt="" /> --}}
							</div>
						</div>
						@endforeach
					</div>
					
					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>
				
			</div>
		</div>
	</div>
</section><!--/slider-->

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Category</h2>
					<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						@foreach ($catagories as $catagory)
							{{-- expr --}}
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordian" href="#{{$catagory->name}}">
										<span class="badge pull-right"><i class="fa fa-plus"></i></span>
										{{$catagory->name}}
									</a>
								</h4>
							</div>
							
							<div id="{{$catagory->name}}" class="panel-collapse collapse">
								<div class="panel-body">
									
									<ul>
										@foreach ($catagory->products as $product)
											<li><a href="#">{{$product->name}} </a></li>
										@endforeach
									</ul>
									
								</div>
							</div>
							
						</div>

						@endforeach
						
					</div><!--/category-products-->
				
					<div class="brands_products"><!--brands_products-->
						<h2>Brands</h2>
						<div class="brands-name">
							<ul class="nav nav-pills nav-stacked">
								@foreach ($brands as $brand)
									<li><a href="#"> <span class="pull-right">({{count($brand->products)}})</span>{{$brand->name}}</a></li>
								@endforeach
								
								
							</ul>
						</div>
					</div><!--/brands_products-->
					
					<div class="price-range"><!--price-range-->
						<h2>Price Range</h2>
						<div class="well text-center">
							 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
							 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
						</div>
					</div><!--/price-range-->
					
					<div class="shipping text-center"><!--shipping-->
						<img src="images/home/shipping.jpg" alt="" />
					</div><!--/shipping-->
				
				</div>
			</div>
			
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Features Items</h2>
				@foreach ($products as $product)
					<div class="col-sm-4">
							{{-- expr --}}
						<div class="product-image-wrapper">
							
							<div class="single-products">
							
								<div class="productinfo text-center">
									<img src="{{ asset('storage/'. $product->image) }}" alt="" width="268px" height="249px" />
									<h2>{{$product->price}}</h2>
									<a href="{{ route('product.single',$product->id) }}"><p>{{$product->name}}</p></a>
									<a href="{{ route('product.single',$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
							</div>

							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div>
						</div>		
					</div>
				@endforeach
					
				</div><!--features_items-->
				
				<div class="category-tab"><!--category-tab-->
					<div class="col-sm-12">
						<ul class="nav nav-tabs">
							@foreach ($catagories as $element)
								{{-- expr --}}
						
							<li class="{{$loop->first ? 'active' : ""}}"><a href="#120{{$element->name}}" data-toggle="tab">{{$element->name}}</a></li>
							
							@endforeach
						</ul>
					</div>
					<div class="tab-content">
						@foreach ($catagories as $cat)
							{{-- expr --}}
						
						<div class="tab-pane fade {{$loop->first ? 'active in' : ""}}" id="120{{ $cat->name}}" >
							@foreach ($cat->products->slice(0,4) as $procat)
								{{-- expr --}}
							
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{ asset('storage/'. $procat->image) }}" alt="" />
											<h2>${{$procat->price}}</h2>
											<p>{{$procat->name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										
									</div>
								</div>
							</div>
							@endforeach
							
						</div>
						@endforeach
					</div>
				</div><!--/category-tab-->
				
				<div class="recommended_items"><!--recommended_items-->
					<h2 class="title text-center">recommended items</h2>
					
					<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							
								
							@foreach($products->chunk(3) as $count => $item)
							<div class="item {{ $count == 0 ? 'active' : '' }}">
							@foreach ($item as $product)	
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('storage/'.$product->image) }}" alt="" />
												<h2>$56</h2>
												<p>{{$product->name}}</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								@endforeach
							
							</div>
							@endforeach
						
						</div>
						 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						  </a>
						  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
							<i class="fa fa-angle-right"></i>
						  </a>			
					</div>
				</div><!--/recommended_items-->
				
			</div>
		</div>
	</div>
</section>

@endsection