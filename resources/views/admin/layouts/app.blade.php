<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>

	@include('admin.layouts.head')

	@section('head')
	@show
</head>
<body class="@yield('bmsg','hold-transition skin-blue sidebar-mini')">

<div class="wrapper">

	@include('admin.layouts.header')

	@include('admin.layouts.sidebar')

	@section('body')
	@show

	@include('admin.layouts.footer')

	@section('foot')
	@show

</div>
</body>
</html>