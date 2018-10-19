@extends('new_view.layouts.app')

@section('title', 'Wish List Page')

@section('css')
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
@endsection

@section('body')
	<div class='container' style="margin-top: 200px;">
					<div class="table-responsive cart_info">
						<table class="table table-condensed">
							<thead>
								<tr class="cart_menu" style="background: aliceblue;">
									<td class="image" width="15%">Item</td>
									<td class="description" width="35%"></td>
									<td class="price">Price</td>
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
										<h4><a href="{{ route('product.single', $wish->products->id) }}">{{$wish->products->name}}</a></h4>
										<p>{!!substr(htmlspecialchars_decode($wish->products->details),0,200)!!}</p>
									</td>
									<td class="order_price">
										<p>${{$wish->products['price']}}</p>
									</td>
									
								
									<td class="order_delete">
  
			                                <button type="submit" style="border: none;" onclick="return confirm('Are You sure');" id="removeWish{{ $wish->id }}">
												<span class="glyphicon glyphicon-trash"></span>
												<input type="hidden" id="wishId{{ $wish->id }}" value="{{ $wish->id }}">
			                                </button>   
									</td>
								</tr>
								@endforeach
							</tbody>
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

			@foreach ($wishes as $wish)
				{{-- expr --}}
			
			$(document).on('click', '#removeWish{{ $wish->id }}', function(event) {
				event.preventDefault();
				/* Act on the event */

				var wId = $('#wishId{{ $wish->id }}').val();

			
				// console.log(wId);

						$.ajax({

				           type:'POST',

				           url:'/wishDel/'+ wId ,

				           data:{wId:wId},

				           success:function(data){

				              // alert(data.success);
				              console.log(data);
				              $('.checwish').load(location.href + ' .checwish')
				              $('.table-condensed').load(location.href + ' .table-condensed')
				              // $('.checkout').load(location.href + ' .checkout')

				           }

				        });

				});

			@endforeach
		});


	</script>
@endsection