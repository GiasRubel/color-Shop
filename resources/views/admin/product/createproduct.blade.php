@extends('admin.layouts.app')

@section('title', 'Create Product')

@section('head')

	<link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
   <style>
   	.select2-selection__choice{
   		background-color: none;
   	}
   </style>

@endsection

@section('body')


<div class="content-wrapper">
	<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<div class="box box-primary">
			  <div class="box-header with-border">
			    <h3 class="box-title">Product Form</h3>
			  </div>
			  <!-- /.box-header -->
			  <!-- form start -->
			  <form role="form" method="post" action="{{ route('product.store') }}" enctype="multipart/form-data" >
			  	@csrf

			    <div class="box-body">

			    	<div class="row">
			    		<div class="col-lg-6">
			    			<div class="form-group">
			    			  <label for="exampleInputEmail1">Product Name</label>
			    			  <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{old('name')}}">

			    			  @if ($errors->has('name'))
			    			    <p class="text-danger">{{$errors->first('name')}}</p>
			    			  @endif
			    			</div>

			    			<div class="form-group">
			    			  <label for="exampleInputEmail1">Product Price</label>
			    			  <input type="text" class="form-control" name="price" placeholder="Enter Price" value="{{old('price')}}">

			    			  @if ($errors->has('price'))
			    			    <p class="text-danger">{{$errors->first('price')}}</p>
			    			  @endif
			    			</div>

			    			<div class="form-group">
			    			  <label for="exampleInputEmail1">Product vat</label>
			    			  <input type="text" class="form-control" name="vat" placeholder="Enter Vat in percentage" value="{{old('vat')}}">

			    			  @if ($errors->has('vat'))
			    			    <p class="text-danger">{{$errors->first('vat')}}</p>
			    			  @endif
			    			</div>

			    			<div class="form-group">
			    			  <label for="exampleInputEmail1">Shipping Cost</label>
			    			  <input type="text" class="form-control" name="shipping" placeholder="Enter shipping in dollar" value="{{old('shipping')}}">

			    			  @if ($errors->has('shipping'))
			    			    <p class="text-danger">{{$errors->first('shipping')}}</p>
			    			  @endif
			    			</div>

			    			<div class="form-group">
			    				<label for="select2"> select cat</label>
			    				<select class="form-control js-example-basic-multiple" name="catagory[]" multiple="multiple">
			    				 @foreach ($catagories as $catagory)
			    				 	<option value="{{ $catagory->id }}"> {{$catagory->name}}</option>
			    				 @endforeach
			    				</select>

			    				@if ($errors->has('catagory'))
			    				  <p class="text-danger">{{$errors->first('catagory')}}</p>
			    				@endif
			    			</div>

			    			  		{{-- <div class="form-group">
			    				     <label>cat</label>
			    				     <select class="form-control select2" name="catagory" style="width: 100%;">
			    				       @foreach ($catagories as $catagory)
			    				       	<option value="{{$catagory->id}}">{{$catagory->name}}</option>
			    				       @endforeach
			    				     </select>
			    				     @if ($errors->has('catagory'))
			    				       <p class="text-danger">{{$errors->first('catagory')}}</p>
			    				     @endif
			    				   </div>	
 --}}
			    		</div>

			    		<div class="col-lg-6">

					  		<div class="form-group">
						     <label>Brand</label>
						     <select class="form-control select2" name="brand" style="width: 100%;">
						       @foreach ($brands as $brand)
						       	<option value="{{$brand->id}}">{{$brand->name}}</option>
						       @endforeach
						     </select>
						     @if ($errors->has('brand'))
						       <p class="text-danger">{{$errors->first('brand')}}</p>
						     @endif
						   </div>	

						   <div class="form-group">
						     <label for="exampleInputFile">Product Image </label>
						     <input type="file" id="exampleInputFile" name="image">

						     <p class="help-block">Please enter a valid image.</p>

						     @if ($errors->has('image'))
						       <p class="text-danger">{{$errors->first('image')}}</p>
						     @endif
						   </div>
			    		</div>
			    	</div>

	      			   <div class="form-group">
	      			     <label for="exampleInputFile">Product Detail </label>
	      			     {{-- <textarea name="detail" id="" cols="30" rows="10"></textarea> --}}
	      			     <textarea id="editor1" rows="10" cols="80" name="detail">{{old('datail')}} </textarea>
	      			     @if ($errors->has('detail'))
	      			       <p class="text-danger">{{$errors->first('detail')}}</p>
	      			     @endif
	      			   </div>

	          		{{-- </div> --}}
			     
			    </div>
			    <!-- /.box-body -->

			    <div class="box-footer">
			      <button type="submit" class="btn btn-primary">Submit</button>
			      <button type="reset" class="btn btn-warning ">Reset</button>
			    </div>
			  </form>
			</div>
		</div>
	</div>
</div>
</section>
@endsection

@section('foot')
	<script src="{{ asset('admin/bower_components/ckeditor/ckeditor.js') }}"></script>
	<script>
	  $(function () {
	    // Replace the <textarea id="editor1"> with a CKEditor
	    // instance, using default configuration.
	    CKEDITOR.replace('editor1')
	    //bootstrap WYSIHTML5 - text editor
	    $('.textarea').wysihtml5()
	  })
	</script>

	{{-- select2 part --}}

	<script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
 
	<script>
		$(document).ready(function() {
		    $('.js-example-basic-multiple').select2();
		});
	</script>
@endsection