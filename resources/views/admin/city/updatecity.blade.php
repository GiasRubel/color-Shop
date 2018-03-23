@extends('admin.layouts.app')

@section('title', 'Edit City')

@section('body')


<div class="content-wrapper">
	<section class="content">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="box box-primary">
			  <div class="box-header with-border">
			    <h3 class="box-title">City Edit Form</h3>
			  </div>
			  <!-- /.box-header -->
			  <!-- form start -->
			  <form role="form" method="post" action="{{ route('city.update', $city->id) }}">
			  	@csrf
			  	@method('put')
			    <div class="box-body">
			      <div class="form-group">
			        <label for="exampleInputEmail1">City Name</label>
			        <input type="text" class="form-control" name="name" placeholder="Enter City" value="{{$city->name}}">

			        @if ($errors->has('name'))
			          <p class="text-danger">{{$errors->first('name')}}</p>
			        @endif
			      </div>

			      <div class="form-group">
			        <label for="exampleInputCountry">Select Country</label>
			       {{--  <input type="text" class="form-control" name="name" placeholder="Enter City" value="{{old('name')}}"> --}}
			      <select name="country" class="form-control">
			        @foreach ($countries as $country)
			          <option value="{{$country->id}}" @if ($country->id == $city->country_id)
			          	selected
			          @endif>{{$country->name}}</option>
			        @endforeach
			      </select>
			        @if ($errors->has('country'))
			          <p class="text-danger">{{$errors->first('country')}}</p>
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