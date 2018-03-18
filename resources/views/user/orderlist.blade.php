@extends('user.layouts.app')

@section('title', 'Orderlist')

@section('body')
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
				<div class="row">

					<div class="col-sm-7 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form>
									<input type="text" placeholder="Company Name">
									<input type="text" placeholder="Email*">
									<input type="text" placeholder="Title">
									<input type="text" placeholder="First Name *">
									<input type="text" placeholder="Middle Name">
									<input type="text" placeholder="Last Name *">
									<input type="text" placeholder="Address 1 *">
									<input type="text" placeholder="Address 2">
								</form>
							</div>
							<div class="form-two">
								<form>
									<input type="text" placeholder="Zip / Postal Code *">
									<select>
										<option>-- Country --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<select>
										<option>-- State / Province / Region --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<input type="password" placeholder="Confirm password">
									<input type="text" placeholder="Phone *">
									<input type="text" placeholder="Mobile Phone">
									<input type="text" placeholder="Fax">
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
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