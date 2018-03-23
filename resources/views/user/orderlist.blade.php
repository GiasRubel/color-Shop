@extends('user.layouts.app')

@section('title', 'order-List')

@section('body')


<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Shopping Orders</li>
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
						<td class="total">Status</td>
						<td class="total">Action</td>
						
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach ($orders as $order)
					<tr>
						<td class="order_product">
							<a href=""><img src="{{ asset('storage/'. $order->products->image) }}" alt="" width="100px" height="100px"></a>
						</td>
						<td class="order_description">
							<h4><a href="">{{$order->products->name}}</a></h4>
							<p>Web ID: {{$order->products->id}}</p>
						</td>
						<td class="order_price">
							<p>${{$order->products['price']}}</p>
						</td>
						<td class="order_price">
							<p>{{$order->products->vat}}%</p>
						</td>
						<td class="order_price">
							<p>${{$order->products->shippingcost}}</p>
						</td>
						<td class="order_quantity">
							<p>{{$order->quantity}}</p>
						</td>
						<td class="order_total">
							<p class="order_total_price">${{( $order->products->price + ($order->products->price * $order->products->vat/100 + $order->products->shippingcost))*$order->quantity}}</p>
						</td>
						<td>
							@if ($order->status == 0)
								Pending
								@else
								permited
							@endif
						</td>
						<td class="order_delete">
							
							 <form id="delorder-form" action="" method="POST">
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
</section> <!--/#order_items-->

<section id="do_action">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
			</div>
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Total <span style="color: red;"><b>${{$sum}}</b></span></li>
					</ul>
						
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->

@endsection

