@extends('admin.layouts.app')

@section('title', 'Order-list')

@section('head')
	<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('body')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <h1>
      Product Table
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
            <h3 class="box-title">Data Table With Product List</h3>
            {{-- <a href="{{ route('product.create') }}" class="col-lg-offset-4 btn btn-success btn-sm">Add new</a> --}}
          </div>
          @if (session()->has('massage'))
              <h4 class="alert alert-success">{{session()->get('massage')}}</h4>
          @endif
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
              	<th width="1%">Serial no</th>
                <th>product Name</th>
                <th>Image</th>
                <th width="5%">Price</th>
                <th>vat</th>
                <th>Shipping</th>
                <th>Customer name</th>
                <th>Adress</th>
                <th>city</th>
                <th>country</th>
                <th>Status</th>
                <th>DElete</th>
                <th>Order Time</th>
                
                
              </tr>
              </thead>
              <tbody>
           {{--  @foreach ($orders as $order)
              {{$order->products["name"]}}
            @endforeach --}}
              	@foreach ($orders as $order)
              	<tr>
	                <td>{{$loop->index + 1}}</td>
                  <td><a href="{{ route('adminorder.show', $order->id) }}">{{$order->products->name}}</a></td>
                  <td><img src="{{ asset('storage/'. $order->products->image) }}" alt="{{$order->products->name}}" width="80px" height="60"></td>
                  <td>{{$order->products->price}}</td>
                  <td>{{$order->products->vat}}</td>
                  <td>{{$order->products->shippingcost}}</td>
                  <td>{{$order->name}}</td>
                  <td>{{$order->adress}}%</td>
                  <td>{{$order->city->name}}</td>
                  <td>{{$order->country->name}}</td>
	                <td>
                   @if ($order->status == 0)
                     <span style="">pending</span>
                     @else
                     <span style="background-color: yellow;">Granted</span>
                   @endif
                    </td>
	                <td>
              		  	<form class="form-group " action="{{ route('order.delete', $order->id) }}" method="post">
              		  	@method('DELETE')
                      @csrf				  		
              		  		<button type="submit" style="border: none;" onclick="return confirm('Are You sure');"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
              			 </form>
	                </td>
	                <td>{{$order->created_at->diffForHumans()}}</td>
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