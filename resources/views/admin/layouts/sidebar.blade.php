<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview">
          <li class=""><a href="{{ route('product.index') }}"><i class="fa fa-circle-o"></i> Products</a></li>
          <li class=""><a href="{{ route('catagory.index') }}"><i class="fa fa-circle-o"></i> Catagory</a></li>
          <li class=""><a href="{{ route('brand.index') }}"><i class="fa fa-circle-o"></i> Brand</a></li>
          <li class=""><a href="{{ route('country.index') }}"><i class="fa fa-circle-o"></i> Country</a></li>
          <li class=""><a href="{{ route('city.index') }}"><i class="fa fa-circle-o"></i> City</a></li>
          <li class=""><a href="{{ route('admin.orderlist') }}"><i class="fa fa-circle-o"></i> Order List</a></li>
          <li class=""><a href="{{ route('slide.list') }}"><i class="fa fa-circle-o"></i> Slider</a></li>
      </li>
      
      
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
