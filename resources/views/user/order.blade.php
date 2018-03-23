@extends('user.layouts.app')

@section('title', 'Orderlist')

@section('body')
<style>
	input, .form-one > form > input {
	    background: #F0F0E9;
	    border: 0 none;
	    margin-bottom: 10px;
	    padding: 10px;
	    width: 100%;
	    font-weight: 300;
	}

	.user_info input, select, textarea {
		 /*margin-top: 8px;*/
		 margin-bottom: 10px;
		 font-weight: 300;
	}

	#loader{
		visibility:hidden;
	}

</style>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->



			<div class="register-req">
				<p>Please Provide the contact information for shipping your product</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row" class="form-one">
					<form action="{{ route('order.store') }}" method="POST" class="newform">
						@csrf
						<div class="col-sm-4">
								<input type="text" placeholder="Customer Name" name="name" value="{{old('name')}}">
								@if ($errors->has('name'))
								  <p class="text-danger">{{$errors->first('name')}}</p>
								@endif
								<input type="email" placeholder="Email*" name="email" value="{{old('email')}}" >
								@if ($errors->has('email'))
								  <p class="text-danger">{{$errors->first('email')}}</p>
								@endif
								<input type="text" placeholder="Phone" name="phone" value="{{old('phone')}}">
								@if ($errors->has('phone'))
								  <p class="text-danger">{{$errors->first('phone')}}</p>
								@endif
								<textarea name="adress"  placeholder="Adress" rows="2"></textarea>

								@if ($errors->has('adress'))
								  <p class="text-danger">{{$errors->first('adress')}}</p>
								@endif
						</div>

						<div class="col-sm-4">
							<input type="text" placeholder="Zip / Postal Code *" name="zip" value="{{old('zip')}}">
							@if ($errors->has('zip'))
							  <p class="text-danger">{{$errors->first('zip')}}</p>
							@endif
									<select name="country">
										<option>--Select Country--</option>
										@foreach ($countries as $country)
											<option value="{{ $country->id }}"> {{ $country->name }}</option>
										@endforeach
									</select>
										@if ($errors->has('country'))
										  <p class="text-danger">{{$errors->first('country')}}</p>
										@endif
									<select name="city">
										<option>--Select City--</option>
									</select>
										@if ($errors->has('city'))
										  <p class="text-danger">{{$errors->first('city')}}</p>
										@endif
									<div class="col-md-2"><span id="loader"><i class="fa fa-spinner fa-3x fa-spin"></i></span></div>
						</div>

						<div class="col-sm-4">
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="10"></textarea>
						</div>

					<div class="col-md-12 text-center"> 
					    <button class="btn btn-success">Confirm Offline order</button> 
					</div>

					</form>
						
				</div>
			</div>
			<div class="review-payment">
				<h2>Review Your Item's</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="price">Vat</td>
							<td class="price">Shipping</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
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
								<p>${{$cart->products->price}}</p>
							</td>
							<td class="cart_price">
								<p>{{$cart->products->vat}}%</p>
							</td>
							<td class="cart_price">
								<p>${{$cart->products->shippingcost}}</p>
							</td>
							<td class="cart_quantity">
								
								<p>{{$cart->quantity}}</p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">${{( $cart->products->price + ($cart->products->price * $cart->products->vat/100 + $cart->products->shippingcost))*$cart->quantity}}</p>
							</td>
							
						</tr>

						@endforeach
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									{{-- <tr>
										<td>Cart Sub Total</td>
										<td>$59</td>
									</tr> --}}
									<tr>
										<td>Total</td>
										<td><span>${{$sum}}</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->

@endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/ajax-bootstrap-select/1.4.3/css/ajax-bootstrap-select.css"></script>
	 {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
 	<script src="{{ asset('js/dependent.js') }}"></script>
@endsection