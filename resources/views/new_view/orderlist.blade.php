@extends('new_view.layouts.app')

@section('title', 'Order Page')

@section('css')
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
@endsection

@section('body')
	<div class='container' style="margin-top: 200px;">
				<div class="table-responsive cart_info">
					<table class="table table-condensed">
						<thead>
							<tr class="cart_menu" style="background: darkkhaki;">
								<td class="image" width="15%">Item</td>
								<td class="description"></td>
								<td class="price">Price</td>
								<td class="quantity">Vat</td>
								<td class="total">Shipping</td>
								<td class="total" width="10%">Quantity</td>
								<td class="total">Total</td>
								<td class="total">Status</td>
								{{-- <td class="total">Action</td> --}}
								
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
										<span style="background-color: yellow;">permited</span>
									@endif
								</td>
								@if ($order->status != 0)
									{{-- expr --}}
							
								<td class="order_delete">
									
									 <form id="delorder-form" action="{{ route('order.destroy', $order->id) }}" method="POST">
									 	@method('delete')
		                                @csrf
		                              
		                                <button type="submit" style="border: none;" onclick="return confirm('Are You sure');">{{-- <i class="fa fa-trash-o" aria-hidden="true"></i> --}}
											<span class="glyphicon glyphicon-remove"></span>
		                                </button>
		                               
		                            </form>
								</td>

							@endif
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
	</div>
@endsection


@section('js')

@endsection