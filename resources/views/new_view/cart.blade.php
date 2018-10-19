@extends('new_view.layouts.app')

@section('title', 'Cart List')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('new_view/styles/contact_styles.css') }}">
	<style>
	.contact_container{
		padding-bottom: 0px;
	}

	.table>tbody>tr>td, .table>tfoot>tr>td{
	    vertical-align: middle;
	}
	@media screen and (max-width: 600px) {
	    table#cart tbody td .form-control{
			width:20%;
			display: inline !important;
		}
		.actions .btn{
			width:36%;
			margin:1.5em 0;
		}
		
		.actions .btn-info{
			float:left;
		}
		.actions .btn-danger{
			float:right;
		}
		
		table#cart thead { display: none; }
		table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
		table#cart tbody tr td:first-child { background: #333; color: #fff; }
		table#cart tbody td:before {
			content: attr(data-th); font-weight: bold;
			display: inline-block; width: 8rem;
		}
		
		
		
		table#cart tfoot td{display:block; }
		table#cart tfoot td .btn{display:block;}
	</style>
	}
@endsection

@section('body')
<div class="container contact_container">
	<div class="row">
		<div class="col">

			<!-- Breadcrumbs -->

			<div class="breadcrumbs d-flex flex-row align-items-center">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Cart Table</a></li>
				</ul>
			</div>

		</div>
	</div>

</div>
	<div class="container">
		<div class="row">
			<table id="cart" class="table table-hover table-condensed">
				<thead>
					<tr>
						<th style="width:50%">Product</th>
						<th style="width:10%">Price</th>
						<th style="width:8%">Quantity</th>
						<th style="width:8%">Shipping</th>
						<th style="width:8%" class="text-center">Vat</th>
						<th style="width:8%" class="text-center">Subtotal</th>
						<th style="width:8%">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($carts as $cart)
						{{-- expr --}}
					
					<tr>
						<td data-th="Product">
							<div class="row">
								<div class="col-sm-3 hidden-xs"><img src="{{ asset('storage/'. $cart->products->image) }}" alt="..." width="100" class="img-responsive"/></div>
								<div class="col-sm-9">
									<h4 class="nomargin">{{$cart->products->name}}</h4>
									<p>{!! substr(htmlspecialchars_decode($cart->products->details),0,200)!!}{{strlen( $cart->products->details ) > 200 ? "..." : ''}}</p>
								</div>
							</div>
						</td>
						<td data-th="Price">${{$cart->products['price']}}</td>
						<td data-th="Quantity">
							<input type="number" id="qty{{ $cart->id }}" class="form-control text-center" value="{{$cart->quantity}}" min="1">
							<input type="hidden" id="cartId{{ $cart->id }}" value="{{ $cart->id }}">
						</td>
						<td data-th="Subtotal" class="text-center">${{$cart->products->shippingcost}}</td>
						<td data-th="Subtotal" class="text-center">{{$cart->products->vat}}%</td>
						<td data-th="Subtotal" class="text-center">${{( $cart->products->price + ($cart->products->price * $cart->products->vat/100 + $cart->products->shippingcost))*$cart->quantity}}</td>
						<td class="actions" data-th="">
							{{-- <button class="btn btn-info btn-sm" id="refresh"><i class="fa fa-refresh"></i></button> --}}
							<a href="#" class="btn btn-info btn-sm" onclick="return confirm('Are You sure');" id="refresh"><i class="fa fa-refresh"></i>
								<input type="hidden" id="cId" value="">
								<input type="hidden" id="quantity" value="">
								<input type="hidden"  id="userId" value="
									{{-- @if (Auth::check()) --}}
									{{ Auth::user()->id}}
								{{-- @endif --}}"/>
							</a>
							<button class="btn btn-danger btn-sm" onclick="return confirm('Are You sure');"><i class="fa fa-trash-o" data-id="{{ $cart->id }}"></i></button>								
						</td>
					</tr>
				@endforeach
					{{-- <input type="hidden" id="quant" value=""> --}}
				</tbody>
				<tfoot>
					<tr class="visible-xs">
						<td class="text-center"><strong>Total: ${{ $sum }}</strong></td>
					</tr>
					<tr>
						<td><a href="{{ route('user.home') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
						<td colspan="2" class="hidden-xs"></td>
						<td class="hidden-xs text-center"><strong>Total: ${{ $sum }}</strong></td>
						<td><a href="{{ route('order.show') }}" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
	
@endsection

@section('js')
	<script>
		jQuery(document).ready(function($) {

			$.ajaxSetup({

			       headers: {

			           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

			       }

			   });
			
			@foreach ($carts as $cart)
				{{-- expr --}}
			
			$(document).on('change keyup', '#qty{{ $cart->id }}', function(event) {
				event.preventDefault();
				/* Act on the event */
				var quantity = $('#qty{{ $cart->id }}').val();
				var id =$('#cartId{{ $cart->id }}').val();
				$('#cId').val(id);
				$('#quantity').val(quantity);
				// console.log(quantity + " Id:" + id);
			});

			@endforeach    

			$(document).on('click', '#refresh', function(event) {
				event.preventDefault();
				/* Act on the event */
				var cId = $('#cId').val();
				var quantity = $('#quantity').val();
				var uId = $('#userId').val();
				// console.log(uId + "quant:" + quantity);
				$.ajax({

		           type:'POST',

		           url:'/carts/'+cId ,

		           data:{cId:cId, quantity:quantity, uId:uId},

		           success:function(data){

		              // alert(data.success);
		              console.log(data);
		              $('#cart').load(location.href + ' #cart')

		           }

		        });
			});


			$(document).on('click', '.fa-trash-o', function(event) {
				event.preventDefault();
				/* Act on the event */
				var $removeButton = $(this);
				var id = $removeButton.data('id');

				// console.log(id);
				$.ajax({

		           type:'POST',

		           url:'/cartdel/' ,

		           data:{id:id},

		           success:function(data){

		              // alert(data.success);
		              console.log(data);
		              $('#cart').load(location.href + ' #cart')
		              $('.checkout').load(location.href + ' .checkout')

		           }

		        });
			});



			
		});
	</script>
@endsection

