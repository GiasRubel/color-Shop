@extends('user.layouts.app')

@section('title', 'Wish-List')

@section('body')


<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Customer Wishes</li>
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
						
						<td class="total">Add cart</td>
						<td> Action</td>
						
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach ($wishes as $wish)
					<tr>
						<td class="order_product">
							<a href=""><img src="{{ asset('storage/'. $wish->products->image) }}" alt="" width="100px" height="100px"></a>
						</td>
						<td class="order_description">
							<h4><a href="">{{$wish->products->name}}</a></h4>
							<p>Web ID: {{$wish->products->id}}</p>
						</td>
						<td class="order_price">
							<p>${{$wish->products['price']}}</p>
						</td>
						<td class="order_price">
							<p>{{$wish->products->vat}}%</p>
						</td>
						<td class="order_price">
							<p>${{$wish->products->shippingcost}}</p>
						</td>
						<td class="cart_wish">
							
							 <form  action="{{ route('product.single', $wish->products->id) }}" method="get" style="margin-left: -44px;">
                                @csrf
                              
                                <button type="Submit" class="btn btn-fefault cart">
									<i class="fa fa-shopping-cart"></i>
									Add to cart
								</button>
                               
                            </form>
						</td>
						
						<td class="order_delete">
							
							 <form action="{{ route('wish.destroy', $wish->id) }}" method="POST">
							 	@method('delete')
                                @csrf
                              
                                <button type="submit" style="border: none;" onclick="return confirm('Are You sure');">
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



@endsection

