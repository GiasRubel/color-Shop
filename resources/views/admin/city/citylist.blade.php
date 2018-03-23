@extends('admin.layouts.app')

@section('title', 'City')

@section('head')
	<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('body')


<div class="content-wrapper">
	<section class="content">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="box box-primary">
			  <div class="box-header with-border">
			    <h3 class="box-title">City Form</h3>
			  </div>
			  <!-- /.box-header -->
			  <!-- form start -->
			  <form role="form" method="post" action="{{ route('city.store') }}">
			  	@csrf
			    <div class="box-body">
			      <div class="form-group">
			        <label for="exampleInputEmail1">City Name</label>
			        <input type="text" class="form-control" name="name" placeholder="Enter City" value="{{old('name')}}">

			        @if ($errors->has('name'))
			          <p class="text-danger">{{$errors->first('name')}}</p>
			        @endif
			      </div>

            <div class="form-group">
              <label for="exampleInputCountry">Select Country</label>
             {{--  <input type="text" class="form-control" name="name" placeholder="Enter City" value="{{old('name')}}"> --}}
            <select name="country" class="form-control">
              <option value="">--select Country --</option>
              @foreach ($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
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
	</section>


	 <div class="row">
       <div class="col-xs-10 col-xs-offset-1">
         

         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Data Table With city List</h3>
           </div>
           @if (session()->has('massage'))
               <h4 class="alert alert-success">{{session()->get('massage')}}</h4>
           @endif
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
               	<th width="5%">Serial no</th>
                 <th width="30%">City</th>
                 <th width="30%">Country</th>
                 <th width="10%">Edit</th>
                 <th width="10%">DElete</th>
                 <th>Created at</th>
                 
               </tr>
               </thead>
               <tbody>

               	@foreach ($cities as $city)
               	<tr>
 	                <td>{{$loop->index + 1}}</td>
                  <td>{{$city->name}}</td>
 	                <td>{{$city->country->name}}</td>
 	                <td><a href="{{ route('city.edit', $city->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
 	                <td>{{-- <a href=""><i class="fa fa-trash-o"></i></a> --}}
 				  	<form class="form-group " action="{{ route('city.destroy', $city->id) }}" method="post">
 				  	    @method('DELETE')
            		@csrf				  		
 				  		<button type="submit" style="border: none;" onclick="return confirm('Are You sure');"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
 					</form>
 	                </td>
 	                <td>{{$city->created_at->diffForHumans()}}</td>
 	             </tr>
               	@endforeach
               
               
               </tfoot>
             </table>
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->
       </div>
       <!-- /.col -->
     </div>
</div>
@endsection

@section('foot')
	<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
	<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection