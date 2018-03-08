@extends('admin.layouts.app')

@section('title', 'Catagory')

@section('head')
	<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('body')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <h1>
      Catagory Tables
      <small>advanced tables</small>
    </h1>
  
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Data tables</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Table With Catagory List</h3>
            <a href="{{ route('catagory.create') }}" class="col-lg-offset-4 btn btn-success btn-sm">Add new</a>
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
                <th width="30%">Name</th>
                <th width="10%">Edit</th>
                <th width="10%">DElete</th>
                <th>Created at</th>
                
              </tr>
              </thead>
              <tbody>

              	@foreach ($catagories as $catagory)
              	<tr>
	                <td>{{$loop->index + 1}}</td>
	                <td>{{$catagory->name}}</td>
	                <td><a href="{{ route('catagory.edit', $catagory->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
	                <td>{{-- <a href=""><i class="fa fa-trash-o"></i></a> --}}
				  	<form class="form-group " action="{{ route('catagory.destroy', $catagory->id) }}" method="post">
				  	{{method_field('DELETE')}}
				  		{{csrf_field()}}
				  		
				  		<button type="submit" style="border: none;" onclick="return confirm('Are You sure');"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
					</form>
	                </td>
	                <td>{{$catagory->created_at->diffForHumans()}}</td>
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
    <!-- /.row -->
  </section>
  <!-- /.content -->
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