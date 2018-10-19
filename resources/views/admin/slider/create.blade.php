@extends('admin.layouts.app')

@section('title', 'Slider')

@section('body')
	<div class="content-wrapper">
		<section class="content">
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				<div class="box box-primary">
				  <div class="box-header with-border">
				    <h3 class="box-title">Slider Form</h3>
				  </div>
				  <!-- /.box-header -->
				  <!-- form start -->
				  @if(session()->has('message'))
					<h5 class="alert alert-success">{{ session()->get('message') }}</h5>
				  @endif
				  <form role="form" method="post" action="{{ route('slide.store') }}" enctype="multipart/form-data">
				  	@csrf
				    <div class="box-body">
				      <div class="form-group">
				        <label for="caption">First Caption</label>
				        <input type="text" class="form-control" name="caption1" placeholder="Enter First caption" value="{{old('name')}}">
						@if ($errors->has('caption1'))
						  <p class="text-danger">{{$errors->first('caption1')}}</p>
						@endif
				        <label for="caption">Second Caption</label>
				        <input type="text" class="form-control" name="caption2" placeholder="Enter Second caption" value="{{old('name')}}">
				        @if ($errors->has('caption2'))
						  <p class="text-danger">{{$errors->first('caption2')}}</p>
						@endif
				        <label for="image">Select mage</label>
				        <input type="file" name="image" class="form-control">
				        @if ($errors->has('image'))
						  <p class="text-danger">{{$errors->first('image')}}</p>
						@endif
				        {{-- <input type="file" name="image"> --}}
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
@endsection