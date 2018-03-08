<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> @yield('title') </title>

    @include('user.layouts.head')

    @section('css')
    @show

</head>
<body>
	
	@include('user.layouts.header')

	@section('body')
	@show

	@include('user.layouts.footer')

	@section('js')
	@show

</body>
</html>