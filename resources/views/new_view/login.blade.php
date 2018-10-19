@extends('new_view.layouts.app')

@section('title', 'Eshop new login')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('new_view/styles/contact_styles.css') }}">
<style>
	.contact_container{
		padding-bottom: 0px;
	}
	.get_in_touch_col{
		padding: 30px;
	}
</style>
@endsection

@section('body')

	<div class="container contact_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Login</a></li>
					</ul>
				</div>

			</div>
		</div>

	</div>
		<div class="row">
			
				<div class="col-lg-5  get_in_touch_col">
					<div class="get_in_touch_contents">
						<h4>Login with valid credential</h4>
						<form method="POST" action="{{ route('login') }}">
						    @csrf
							<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus><br>

							@if ($errors->has('email'))
							    <span class="invalid-feedback">
							        <strong>{{ $errors->first('email') }}</strong>
							    </span>
							@endif

							<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required><br>

							@if ($errors->has('password'))
							    <span class="invalid-feedback">
							        <strong>{{ $errors->first('password') }}</strong>
							    </span>
							@endif

							<span>
								<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button> <br>

							<a class="btn btn-link" 
							 href="{{ route('password.request') }}">
							    Forgot Your Password?
							</a>
						</form>
					</div>
				</div>		
					
					
				
			
			<div class="col-lg-1">
				<h2 class="or">OR</h2>
			</div>
			<div class="col-lg-5">
				<div class="signup-form"><!--sign up form-->
					<h2>New User Signup!</h2>
					<form method="POST" action="{{ route('register') }}">
					    @csrf
						<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus><br>

			            @if ($errors->has('name'))
			                <span class="invalid-feedback">
			                    <strong>{{ $errors->first('name') }}</strong>
			                </span>
			            @endif

						<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required><br>

						@if ($errors->has('email'))
						    <span class="invalid-feedback">
						        <strong>{{ $errors->first('email') }}</strong>
						    </span>
						@endif

						<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required><br>

			            @if ($errors->has('password'))
			                <span class="invalid-feedback">
			                    <strong>{{ $errors->first('password') }}</strong>
			                </span>
			            @endif

			            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required><br>

						<button type="submit" class="btn btn-default">Signup</button>
					</form>
				</div><!--/sign up form-->
			</div>
		</div>


@endsection