<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> @yield('title') </title>
	@include('new_view.layouts.head')
	@section('css')
	@show
</head>
<body>

 <div class="super_container">

	@include('new_view.layouts.header')

	@section('body')
	@show

	@include('new_view.layouts.footer')

	@section('js')
	@show

</div>

</body>
</html>