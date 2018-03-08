@extends('admin.layouts.app')

@section('title', 'Edit Brand')

@section('body')


<div class="content-wrapper">
	<section class="content">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="box box-primary">
			  <div class="box-header with-border">
			    <h3 class="box-title">Brand Edit Form</h3>
			  </div>
			  <!-- /.box-header -->
			  <!-- form start -->
			  <form role="form" method="post" action="{{ route('brand.update', $brand->id) }}">
			  	@csrf
			  	@method('put')
			    <div class="box-body">
			      <div class="form-group">
			        <label for="exampleInputEmail1">Brand Name</label>
			        <input type="text" class="form-control" name="name" placeholder="Enter Brand" value="{{$brand->name}}">

			        @if ($errors->has('name'))
			          <p class="text-danger">{{$errors->first('name')}}</p>
			        @endif
			      </div>
			     
			    </div>
			    <!-- /.box-body -->

			    <div class="box-footer">
			      <button type="submit" class="btn btn-primary">Submit</button>
			    </div>
			  </form>
			</div>
		</div>
	</div>
</div>
</section>
@endsection