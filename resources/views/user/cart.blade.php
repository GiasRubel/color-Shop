@extends('user.layouts.app')

@section('title', 'Cart')

@section('body')


<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Shopping Cart</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image" width="15%">Item</td>
						<td class="description"></td>
						<td class="price">Price</td>
						<td class="quantity">Vat</td>
						<td class="total">Shipping</td>
						<td class="total" width="15%">Quantity</td>
						<td class="total">Total</td>
						<td class="total">Action</td>
						
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach ($carts as $cart)
						{{-- expr --}}
					
					<tr>
						<td class="cart_product">
							<a href=""><img src="{{ asset('storage/'. $cart->products->image) }}" alt="" width="100px" height="100px"></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{$cart->products->name}}</a></h4>
							<p>Web ID: {{$cart->products->id}}</p>
						</td>
						<td class="cart_price">
							<p>${{$cart->products['price']}}</p>
						</td>
						<td class="cart_price">
							<p>{{$cart->products->vat}}%</p>
						</td>
						<td class="cart_price">
							<p>${{$cart->products->shippingcost}}</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								{{-- <a class="cart_quantity_up" href=""> + </a>
								<input class="cart_quantity_input" type="text" name="quantity" value="{{$cart->quantity}}" autocomplete="off" size="2">
								<a class="cart_quantity_down" href=""> - </a> --}}
								<div class="input-group" style="width: 200px;">

									
										<span class="input-group-btn">
										    <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
										      <span class="glyphicon glyphicon-minus"></span>
										    </button>
										</span>

										<form id="cart-form" action="{{ route('cart.update', $cart->id)}}" method="post" >
											@csrf
											@method('PUT')
											<input type="text" id="quantity" name="qty" class="form-control input-number" value="{{$cart->quantity}}" min="1" max="100" style="margin-bottom: -24px;">
										</form>

										<span class="input-group-btn">
										    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
										        <span class="glyphicon glyphicon-plus"></span>
										    </button>
										</span>

										<span class="input-group-btn" style="padding: 10px;">
										    <button type="submit" class="" onclick="
										    event.preventDefault();
										    document.getElementById('cart-form').submit();
										      return confirm('Are you sure For update');">
										        <span class="glyphicon glyphicon-edit"></span>
										    </button>
										</span>
                                    
                                </div>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">${{( $cart->products->price + ($cart->products->price * $cart->products->vat/100 + $cart->products->shippingcost))*$cart->quantity}}</p>
						</td>
						<td class="cart_delete">
							
							 <form id="delcart-form" action="{{ route('cart.delete', $cart->id) }}" method="POST">
							 	@method('delete')
                                @csrf
                              
                                <button type="submit" style="border: none;" onclick="return confirm('Are You sure');">{{-- <i class="fa fa-trash-o" aria-hidden="true"></i> --}}
									<span class="glyphicon glyphicon-trash"></span>
                                </button>
                               
                            </form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->

<section id="do_action">
	<div class="container">
		{{-- <div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		</div> --}}
		<div class="row">
			<div class="col-sm-6">
				{{-- <div class="chose_area">
					<ul class="user_option">
						<li>
							<input type="checkbox">
							<label>Use Coupon Code</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Use Gift Voucher</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Estimate Shipping & Taxes</label>
						</li>
					</ul>
					<ul class="user_info">
						<li class="single_field">
							<label>Country:</label>
							<select>
								<option>United States</option>
								<option>Bangladesh</option>
								<option>UK</option>
								<option>India</option>
								<option>Pakistan</option>
								<option>Ucrane</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>
							
						</li>
						<li class="single_field">
							<label>Region / State:</label>
							<select>
								<option>Select</option>
								<option>Dhaka</option>
								<option>London</option>
								<option>Dillih</option>
								<option>Lahore</option>
								<option>Alaska</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>
						
						</li>
						<li class="single_field zip-field">
							<label>Zip Code:</label>
							<input type="text">
						</li>
					</ul>
					<a class="btn btn-default update" href="">Get Quotes</a>
					<a class="btn btn-default check_out" href="">Continue</a>
				</div> --}}
			</div>
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						{{-- <li>Cart Sub Total <span>$59</span></li>
						<li>Shipping Cost <span>Free</span></li> --}}
						<li>Total <span style="color: red;"><b>${{$sum}}</b></span></li>
					</ul>
						<a class="btn btn-default update" href="{{ route('order.show') }}">Order</a>
						{{-- <a class="btn btn-default check_out" href="">Check Out</a> --}}
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->

@endsection

@section('js')

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
	            if(quantity>0){
	            $('#quantity').val(quantity - 1);
	            }
	    });
	    
	});
</script>

@endsection