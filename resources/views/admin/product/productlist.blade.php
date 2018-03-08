@extends('admin.layouts.app')

@section('title', 'Product')

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
            <a href="{{ route('product.create') }}" class="col-lg-offset-4 btn btn-success btn-sm">Add new</a>
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
                <th>Name</th>
                <th width="5%">Detail</th>
                <th>Catagory</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Vat</th>
                <th>Shipping</th>
                <th>Image</th>
                <th>Edit</th>
                <th>DElete</th>
                <th>Creat</th>
                
              </tr>
              </thead>
              <tbody>

              	@foreach ($products as $product)
              	<tr>
	                <td>{{$loop->index + 1}}</td>
                  <td>{{$product->name}}</td>
                  <td>{!! substr(htmlspecialchars_decode($product->details),0,50)!!}{{strlen( $product->details ) > 50 ? "..." : ''}}</td>
                  <td>{{-- {{$product->catagory->name}} --}}
                        
                    @foreach ($product->catagory as $cat)
                      {{-- {{$loop->first ? '' : ','}} --}}
                      {{ $cat->name }}{{!$loop->last ? ',' : ''}}
                    @endforeach

                  </td>
                  <td>{{$product->brand['name']}}</td>
                  <td>{{$product->price}}</td>
                  <td>{{$product->vat}}%</td>
                  <td>{{$product->shippingcost}}</td>
	                <td><img src="{{ asset('storage/'. $product->image) }}" alt="{{$product->name}}" width="80px" height="60"></td>
	                <td><a href="{{ route('product.edit', $product->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
	                <td>{{-- <a href=""><i class="fa fa-trash-o"></i></a> --}}
				  	<form class="form-group " action="{{ route('product.destroy', $product->id) }}" method="post">
				  	@method('DELETE')
            @csrf				  		
				  		<button type="submit" style="border: none;" onclick="return confirm('Are You sure');"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
					</form>
	                </td>
	                <td>{{$product->created_at->diffForHumans()}}</td>
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