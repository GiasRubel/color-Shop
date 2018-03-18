@extends('admin.layouts.app')

@section('title', 'Edit Country')

@section('body')


<div class="content-wrapper">
	<section class="content">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="box box-primary">
			  <div class="box-header with-border">
			    <h3 class="box-title">Country Edit Form</h3>
			  </div>
			  <!-- /.box-header -->
			  <!-- form start -->
			  <form role="form" method="post" action="{{ route('country.update', $country->id) }}">
			  	@csrf
			  	@method('put')
			    <div class="box-body">
			      <div class="form-group">
			        <label for="exampleInputEmail1">country Name</label>
			        <input type="text" class="form-control" name="name" placeholder="Enter Country" value="{{$country->name}}">

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