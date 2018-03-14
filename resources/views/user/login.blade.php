@extends('user.layouts.app')

@section('title', 'Eshop Login')

@section('body')

<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form"><!--login form-->
					<h2>Login to your account</h2>
					<form method="POST" action="{{ route('login') }}">
					    @csrf
						<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

						@if ($errors->has('email'))
						    <span class="invalid-feedback">
						        <strong>{{ $errors->first('email') }}</strong>
						    </span>
						@endif

						<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

						@if ($errors->has('password'))
						    <span class="invalid-feedback">
						        <strong>{{ $errors->first('password') }}</strong>
						    </span>
						@endif

						<span>
							<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
							Keep me signed in
						</span>
						<button type="submit" class="btn btn-default">Login</button> 

						<a class="btn btn-link" style=" margin-top:-50px; margin-left: 90px;"
						 href="{{ route('password.request') }}">
						    Forgot Your Password?
						</a>
					</form>
				</div><!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or">OR</h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form"><!--sign up form-->
					<h2>New User Signup!</h2>
					<form method="POST" action="{{ route('register') }}">
					    @csrf
						<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

			            @if ($errors->has('name'))
			                <span class="invalid-feedback">
			                    <strong>{{ $errors->first('name') }}</strong>
			                </span>
			            @endif

						<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>

						@if ($errors->has('email'))
						    <span class="invalid-feedback">
						        <strong>{{ $errors->first('email') }}</strong>
						    </span>
						@endif

						<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

			            @if ($errors->has('password'))
			                <span class="invalid-feedback">
			                    <strong>{{ $errors->first('password') }}</strong>
			                </span>
			            @endif

			            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>

						<button type="submit" class="btn btn-default">Signup</button>
					</form>
				</div><!--/sign up form-->
			</div>
		</div>
	</div>
</section><!--/form-->

@endsection