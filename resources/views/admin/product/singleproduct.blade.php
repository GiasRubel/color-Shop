@extends('admin.layouts.app')

@section('title', 'single Product')


@section('head')
<link rel="stylesheet" href="{{ asset('admin/dist/css/panels.css') }}">
<style>
	.btn-custom{
		background-color: yellow;
		font-weight: bold;
		border-radius: 5px;
		color: #000;
		padding: 0px 10px;
	}

	img {
	  /*filter: none; /* IE6-9 */*/
	  -webkit-filter: grayscale(1); /* Google Chrome, Safari 6+ & Opera 15+ */
	    -webkit-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
	    -moz-box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
	    box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
	    margin-bottom:20px;
	}

	img:hover {
	  filter: none; /* IE6-9 */
	  -webkit-filter: grayscale(0); /* Google Chrome, Safari 6+ & Opera 15+ */
	 
	}
</style>
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
							<ul class="nav">
								<li class="">
									<a href="#">
									<i class="glyphicon glyphicon-tags"></i>
									Brand: {{$product->brand->name}} </a>
								</li>
								
							</ul>
							
								<div class="newwv" style="padding: 5px;">
									<h5>Catagory</h5>
									@foreach ($product->catagory as $cat)
										{{-- <button class="btn btn-custom"></button> --}}
										<a href="{{ route('catbyproduct', $cat->id) }}" class="btn-custom">{{$cat->name}}</a>
									@endforeach
								</div>
							
						
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

			@if (count($product->multi) == null)

				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						@if (count($errors) > 0)
						      <ul>
						          @foreach ($errors->all() as $error)
						              <li>{{ $error }}</li>
						          @endforeach
						      </ul>
						  @endif
						<h2>Upload Multiple image for this product</h2>
						<form action="{{ route('multi-image.store', $product->id) }}" method="post" enctype="multipart/form-data">
						@csrf

						<input type="file" name="file[]" multiple><br>

						<input type="submit" value="submit">

						</form>
					</div>
				</div>
			

			@else
								
			<div class="row">
				<div class="row">
					<div class="col-md-6 col-md-offset-1">
						<h4>Related Images</h4>
					</div>
				</div>
				@foreach ($product->multi as $element)
				<div class="col-md-3 col-sm-4 col-xs-6"><img class="img-responsive" src="{{ asset('images/'. $element->file) }}" width="250" height="200" /></div>

			  	<form class="form-group" method="post" action="{{ route('multi-image.destroy', $element->id) }}">
			  	@method('DELETE')
       			 @csrf				  		
			  		<button type="submit" style="border: none;" onclick="return confirm('Are You sure');"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				  </form>
				@endforeach
			</div>

			@endif
		</div>
		<center>
		</center>
		<br>
		<br>
	</div>
@endsection