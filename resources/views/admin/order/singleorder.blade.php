@extends('admin.layouts.app')

@section('title', 'single order')

@section('head')
<link rel="stylesheet" href="{{ asset('admin/dist/css/panels.css') }}">
@endsection

@section('body')
	<div class="content-wrapper">
		<div class="container">
		    <div class="row profile">
		    	<div class="col-md-3">
					<div class="profile-sidebar">
						
						<div class="profile-usertitle">
							<div class="profile-usertitle-name">
								Adress: {{$order->adress}},{{$order->city->name}},{{$order->country->name}}
							</div>
							<div class="profile-usertitle-name">
								Zip: {{$order->zip}}
							</div>
							<div class="profile-usertitle-name">
								Phone: {{$order->phone}}
							</div>
							<div class="profile-usertitle-name">
								Email: {{$order->email}}
							</div>
							<div class="profile-usertitle-job">
								Order at - {{date(" ha: dS F Y", strtotime($order->created_at))}}
							</div>
						</div>
						
						<div class="profile-userbuttons">

							<form action="{{ route('order.statusupdate', $order->id) }}" method="POST">
							@method('put')
							@csrf

							<button type="submit" class="btn btn-success btn-sm">Grant permission</button>
								
							</form>							
						</div>
						
						<div class="profile-usermenu">
							<ul class="nav">
								<li class="active">
									<a href="{{ route('admin.orderlist') }}">
									<i class="glyphicon glyphicon-home"></i>
									 Home</a>
								</li>
								
								<li>
									<a href="{{ route('admins.home') }}" target="_blank">
									<i class="glyphicon glyphicon-ok"></i>
									Order List</a>
								</li>
								
							</ul>
						</div>
						<!-- END MENU -->
					</div>
				</div>
				<div class="col-md-9">
		            <div class="profile-content">
					  <div class="row"> 
					  	<div class="col-md-8">
					  		
					  		<img src="{{ asset('storage/'. $order->products->image) }}" alt="" width="200px" height="200px">

					  		<p>{!! htmlspecialchars_decode($order->products->details) !!}</p>
					  	</div>
					  	<div class="col-md-4 ">
					  		<div class="profile-sidebar-right">
					  			<div class="panel panel-default">
					  			    <div class="panel-heading"><h3>{{$order->products->name}} <span style="font-size:14px;">WebId:{{$order->products->id}}</span></h3></div>
					  			    <div class="panel-body">
					  			    	<table class="tblpan">
					  			    		<tr>
					  			    			<th width="10%">Price</th>
					  			    			<td width="5%">:</td>
					  			    			<td width="10%">${{$order->products->price}}</td>
					  			    		</tr>

					  			    		<tr>
					  			    			<th>Vat</th>
					  			    			<td>:</td>
					  			    			<td>{{$order->products->vat}}%</td>
					  			    		</tr>

					  			    		<tr>
					  			    			<th>Shipping</th>
					  			    			<td>:</td>
					  			    			<td>${{$order->products->shippingcost}}</td>
					  			    		</tr>

					  			    		<tr>
					  			    			<th>Quantity</th>
					  			    			<td>:</td>
					  			    			<td>{{$order->quantity}} ps</td>
					  			    		</tr>

					  			    		<tr>
					  			    			<th>Total</th>
					  			    			<td>:</td>
					  			    			<td>${{( $order->products->price + ($order->products->price * $order->products->vat/100 + $order->products->shippingcost))*$order->quantity}}</td>
					  			    		</tr>
					  			    	</table>
					  			 
					  			    </div>
					  			    
					  			  </div>
										
								  @if ($order->message)
								  	<h2>Spacial Message:</h2>
									  <div class="panel panel-default">
									    <div class="panel-body">{!! htmlspecialchars_decode($order->message) !!}</div>
									  </div>
								  @endif
					  			  
					  		</div>
					  	</div>
					  </div>
		            </div>
				</div>
			</div>
		</div>
		<center>
		</center>
		<br>
		<br>
	</div>
@endsection