@extends('new_view.layouts.app')

@section('title', 'Colorshop')

@section('css')
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('new_view/plugins/themify-icons/themify-icons.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('new_view/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('new_view/styles/single_styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('new_view/styles/single_responsive.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('new_view/plugins/rateyo/jquery.rateyo.css') }}">
	

	<style>
		.mybutton{
			margin-left: 25px;border: antiquewhite; background: coral;width: 155px; height: 35px;
		}

		.mybutton a{
			color: antiquewhite;
		}
		.quantity-left-minus{
			height: 33px;

		}
		.quantity-right-plus{
			height: 33px;
		}
		.input-number{
			width: 35px; height: 33px; font-size: initial;
		}

	</style>
@endsection

@section('body')
	
<div class="container single_product_container">
	<div class="row">
		<div class="col">

			<!-- Breadcrumbs -->

			<div class="breadcrumbs d-flex flex-row align-items-center">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="categories.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Men's</a></li>
					<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Single Product</a></li>
				</ul>
			</div>

		</div>
	</div>

	<div class="row">
		<div class="col-lg-7">
			<div class="single_product_pics">
				<div class="row">
					<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
						<div class="single_product_thumbnails">
							<ul>
								@foreach ($product->multi as $element)
									
								
								<li><img src="{{ asset('images/'. $element->file) }}" alt="" data-image="{{ asset('images/'. $element->file) }}"></li>
								
								@endforeach
							</ul>
						</div>
					</div>
					<div class="col-lg-9 image_col order-lg-2 order-1">
						<div class="single_product_image">
							<div class="single_product_image_background" style="background-image:url({{ asset('storage/'. $product->image) }})"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-5">
			<div class="product_details">
				<div class="product_details_title">
					<h2>{{ $product->name }}</h2>
					<p>{!! substr(htmlspecialchars_decode($product->details),0,250)!!}{{strlen( $product->details ) > 250 ? "..." : ''}}</p>
				</div>
				<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
					<span class="ti-truck"></span><span>free delivery</span>
				</div>
				<div class="original_price">$629.99</div>
				<div class="product_price">${{ $product->price }}</div>
				{{-- <ul class="star_rating">
					<li><i class="fa fa-star" aria-hidden="true"></i></li>
					<li><i class="fa fa-star" aria-hidden="true"></i></li>
					<li><i class="fa fa-star" aria-hidden="true"></i></li>
					<li><i class="fa fa-star" aria-hidden="true"></i></li>
					<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
				</ul> --}}
				<ul><div class="star-rating rateYoAvg" ></div></ul>
				
				<input type="hidden" value="{{ $rating_avg }}" id="rate_avg">
				<div class="product_color">
					<span>Select Color:</span>
					<ul>
						<li style="background: #e54e5d"></li>
						<li style="background: #252525"></li>
						<li style="background: #60b3f3"></li>
					</ul>
				</div>
			<form  method="post" action="{{ route('cart', $product->id) }}" id="cart_form">
				@csrf
				@method('post')
				<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
					<span>Quantity: </span>
					
						{{-- <div class="quantity_selector"> --}}

							<span class="input-group-btn">
                                <button type="button" class="quantity-left-minus btn btn-default btn-number"  data-type="minus" data-field="" style="margin-left: 10px;">
                                  <span class="glyphicon glyphicon-minus"></span>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="qty" class="form-control input-number" value="1" min="1" max="100" />
                            <span class="input-group-btn">
                                <button type="button" class="quantity-right-plus btn btn-default btn-number" data-type="plus" data-field="">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </span>
							{{-- <span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
							<span id="quantity_value">1</span> 
							<span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span> --}}
						{{-- </div> --}}
						<input type="hidden"  name="userId" value="
									@if (Auth::check())
									{{ Auth::user()->id}}
								@endif"/>
						<button type="submit" class="btn btn-danger mybutton">Add to cart</button>

					{{-- <div class="red_button add_to_cart_button"><a href="#">add to cart </a></div> --}}
					@if (count($wish_check) > 0)
						<div class="product_favorite d-flex flex-column align-items-center justify-content-center active">
					@else
						<div class="product_favorite d-flex flex-column align-items-center justify-content-center">		
					@endif
					
						<input type="hidden"  id="userId" value="
									@if (Auth::check())
									{{ Auth::user()->id}}
								@endif"/>
						<input type="hidden" id="proId" value="{{ $product->id }}">
						@foreach ($wish_check as $element)
							<input type="hidden" id="wishId" value="{{ $element->id}}">
						@endforeach
						
					</div>
				</div>
				@if (session()->has('massage'))
				    <p class="alert-danger">{{session()->get('massage')}}</p>
				@endif
			</form>

			</div>
		</div>
	</div>

</div>



<!-- Tabs -->

<div class="tabs_section_container">

	<div class="container">
		<div class="row">
			<div class="col">
				<div class="tabs_container">
					<ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
						<li class="tab active" data-active-tab="tab_1"><span>Description</span></li>
						<li class="tab" data-active-tab="tab_2"><span>Additional Information</span></li>
						<li class="tab" data-active-tab="tab_3"><span>Reviews (2)</span></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">

				<!-- Tab Description -->

				<div id="tab_1" class="tab_container active">
					<div class="row">
						<div class="col-lg-5 desc_col">
							<div class="tab_title">
								<h4>Description</h4>
							</div>
							<div class="tab_text_block">
								<h2>Pocket cotton sweatshirt</h2>
								<p>Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...</p>
							</div>
							<div class="tab_image">
								<img src="images/desc_1.jpg" alt="">
							</div>
							<div class="tab_text_block">
								<h2>Pocket cotton sweatshirt</h2>
								<p>Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...</p>
							</div>
						</div>
						<div class="col-lg-5 offset-lg-2 desc_col">
							<div class="tab_image">
								<img src="images/desc_2.jpg" alt="">
							</div>
							<div class="tab_text_block">
								<h2>Pocket cotton sweatshirt</h2>
								<p>Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...</p>
							</div>
							<div class="tab_image desc_last">
								<img src="images/desc_3.jpg" alt="">
							</div>
						</div>
					</div>
				</div>

				<!-- Tab Additional Info -->

				<div id="tab_2" class="tab_container">
					<div class="row">
						<div class="col additional_info_col">
							<div class="tab_title additional_info_title">
								<h4>Additional Information</h4>
							</div>
							<p>COLOR:<span>Gold, Red</span></p>
							<p>SIZE:<span>L,M,XL</span></p>
						</div>
					</div>
				</div>

				<!-- Tab Reviews -->

				<div id="tab_3" class="tab_container">
					<div class="row">

						<!-- User Reviews -->

						<div class="col-lg-6 reviews_col">
							<div class="tab_title reviews_title">
								<h4>Reviews (2)</h4>
							</div>

							<!-- User Review -->
							@foreach ($ratings as $rating)
							
							<div class="user_review_container d-flex flex-column flex-sm-row">
								<div class="user">
									<div class="user_pic"></div>
									<div class="user_rating">
										<div class="star-rating rateYo" data-rating='{{ $rating->rate }}'></div>
									</div>
								</div>
								<div class="review">
									<div class="review_date">{{ $rating->created_at }}</div>
									<div class="user_name">{{ $rating->users->name }}</div>
									<p>{{ $rating->comment }}</p>

								</div>
							</div>

							@endforeach

							

						</div>

						<!-- Add Review -->
						@if (Auth::user())	
							@if (count($rating_check) ==0 )
								{{-- expr --}}
							
						<div class="col-lg-6 add_review_col">

							<div class="add_review">
								<form id="review_form" action="post">
									<div>
										<h1>Add Review</h1>
										
									</div>

									<div>
										<h1>Your Rating:</h1>
										{{-- <ul class="user_star_rating">
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
										</ul> --}}
										<div id="rateYo"></div>
										<textarea id="review_message" class="input_review" name="message"  placeholder="Your Review" rows="4" required data-error="Please, leave us a review."></textarea>
										<input type="hidden" value="{{ $product->id }}" id="product_id">
										<input type="hidden" value="@if (Auth::check())
											{{ Auth::user()->id }}
										@endif" id="user_id">
										@csrf
									</div>
									<div class="text-left text-sm-right">
										<button id="review_submit" type="submit" class="red_button review_submit_btn trans_300" value="Submit">submit</button>
									</div>
								</form>
							</div>

						</div>
						@endif
					@else
						{{-- <div> --}}
							<h4><a href="{{ url('login') }}">Login For review</a></h4>
							{{-- <ul class="user_star_rating">
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
							</ul>	 --}}
						{{-- </div> --}}
					@endif	
						<!--And of Review submition-->
					
					</div>
				</div>

			</div>
		</div>
	</div>

</div>
@endsection

@section('js')
	<script src="{{ asset('new_view/plugins/rateyo/jquery.rateyo.js') }}"></script>
	<script src="{{ asset('new_view/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
	<script src="{{ asset('new_view/js/single_custom.js') }}"></script>

	<script>
		jQuery(document).ready(function($) {
			
		
			 //For storing rating

			$('#rateYo').rateYo({
				rating:4,
				halfStar: true,	
			});

			 var $rateYo = $("#rateYo").rateYo();


  			 $(document).on('click', '#review_submit', function(event) {
  			 	event.preventDefault();
  			 	var rating = $rateYo.rateYo("rating");
  			 	var mess = $("#review_message").val();
  			 	var product_id = $("#product_id").val();
  			 	var user_id = $("#user_id").val();
  			 	// console.log(user_id);
  			 	if(mess == ""){
  			 		window.alert("Text required");
  			 	}else{
  			 		// console.log(mess + " " + rating + " " + product_id);
  			 		 $.post('/single-product/'+ product_id , {'rate':rating,'comment':mess,'product_id':product_id,'user_id':user_id,'_token':$('input[name=_token]').val()}, function(data, html) {
                     
                     // $(".tabs_section_container").load(location.href + " .tabs_section_container");
                     // $("#tab_3").replaceWith($("#tab_3", $(html)));
                     window.location.reload();
                     console.log(data);
                   });
  			 	}
  			 	
  			 });

			//For Show all rating

			  $('.rateYo').each(function() {
			  	$(this).rateYo({
				    halfStar: true,
				    rating: this.dataset.rating,
				    readOnly: true,
				    starWidth: "15px"
			  });
			});

			  //For show average Rating
			
			 	var rate_avg = $("#rate_avg").val();
			  
			  	$('.rateYoAvg').rateYo({
				    
				    rating: rate_avg,
				    halfStar: true,
				    // rating: 4,
				    readOnly: true,
				    starWidth: "30px"
			  });

		});
	</script>

	<script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>1){
		            $('#quantity').val(quantity - 1);
		            }
		    });

		    
		});
	</script>

	<script>
		$.ajaxSetup({

	       headers: {

	           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

	       }

	   });


	    @if (count($wish_check) == 0)
	   	  $(document).on('click', '.product_favorite', function(event) {
	     	event.preventDefault();
	     	/* Act on the event */

	     	var uId = $('#userId').val();
	     	var pId = $('#proId').val();
	     	console.log(uId);
	     	$.ajax({
	     		url: '/wish/'+ pId,
	     		type: 'POST',
	     		
	     		data: {uId:uId, pId:pId},

	     		success:function(data){
	     			console.log(data);
	     			// $('.checwish').load(location.href + ' .checwish');
	     			// $('#fullref').load(location.href + ' #fullref');
	     			window.location.reload();
	     		}
	     	})

	     	// console.log(uId);
	     });
	   	@else
	   			$(document).on('click', '.product_favorite', function(event) {
	   		  	event.preventDefault();
	   		  	/* Act on the event */

	   		  	// console.log('have one');

	   		  	var wId = $('#wishId').val();
	   		  
	   		  	// console.log(wId);

	   		  	$.ajax({
	   		  		url: '/wishDel/'+ wId,
	   		  		type: 'POST',
	   		  		
	   		  		data: {wId:wId},

	   		  		success:function(data){
	   		  			console.log(data);
	   		  			// $('.checwish').load(location.href + ' .checwish');
	   		  			// $('#fullref').load(location.href + ' #fullref');
	   		  			window.location.reload();
	   		  		}
	   		  	})

	   		  	// console.log(uId);
	   		  });

		@endif


	</script>

@endsection