@extends('admin.layouts.app')

@section('title', 'single Product')


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
								{{$product->name}}
							</div>
							<div class="profile-usertitle-job">
								web Id:{{$product->id}}
							</div>
							<small>Created: {{date(" ha dS F Y", strtotime($product->created_at))}}</small>
						</div>
						<!-- END SIDEBAR USER TITLE -->
						<!-- SIDEBAR BUTTONS -->
						<div class="profile-userbuttons">
								<button type="button" class="btn btn-success btn-sm"><a href="{{ route('product.edit', $product->id) }}" style="color: #fff;">Edit</a></button>
							<button type="button" class="btn btn-danger btn-sm"><a href=""  style="color: #fff;" onclick="event.preventDefault();
							document.getElementById('del-form').submit();
							return confirm('Are You Sure'); ">Delete</a></button>

							<form action="{{ route('product.destroy', $product->id) }}" method="post" id="del-form">
								@method('delete')
								@csrf
							</form>
						</div>
						<!-- END SIDEBAR BUTTONS -->
						<!-- SIDEBAR MENU -->
						<div class="profile-usermenu">
							<ul class="nav">
								<li class="active">
									<a href="#">
									<i class="glyphicon glyphicon-home"></i>
									Home </a>
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
					   		<img src="{{ asset('storage/'. $product->image) }}" alt="" width="300px" height="300px">

					   		<p>{!! htmlspecialchars_decode($product->details) !!}</p>
					   	</div>
					   	<div class="col-md-4">
					   		<div class="profile-sidebar-right">
					   			<div class="panel panel-default">
					   			    <div class="panel-heading"><h4>Basic Info</h4></div>
					   			    <div class="panel-body">
					   			    	<table class="tblpan">
					   			    		<tr>
					   			    			<th width="10%">Price</th>
					   			    			<td width="5%">:</td>
					   			    			<td width="10%">${{$product->price}}</td>
					   			    		</tr>

					   			    		<tr>
					   			    			<th>Vat</th>
					   			    			<td>:</td>
					   			    			<td>{{$product->vat}}%</td>
					   			    		</tr>

					   			    		<tr>
					   			    			<th>Shipping</th>
					   			    			<td>:</td>
					   			    			<td>${{$product->shippingcost}}</td>
					   			    		</tr>

					   			    	</table>
					   			 
					   			    </div>
					   			    
					   			  </div>
					   		{{-- </div> --}}
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