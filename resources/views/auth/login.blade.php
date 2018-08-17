@extends('master')
@section('title', 'Login')
@section('breadcrumb')
<li class="breadcrumb-item active">Login</li>
@endsection
@section('content')
<div class="row bar justify-content-center">
	<div class="col-lg-6">
		<div class="box mt-0">
			<h2 class="text-uppercase">Login</h2>
		    <p class="lead">Silahkan Masuk dengan akun yang dimiliki</p>
		    <form action="{{ url('login') }}" method="post">
		    	{{ csrf_field() }}
				<div class="form-group">
					<label>Email</label>
					<input name="email" type="text" value="{{ old('email') }}" 
					class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" autocomplete="off" autofocus>
					@if($errors->has('email'))
					<div class="invalid-feedback">
						{{ $errors->first('email') }}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label>Password</label>
					<input name="password" type="password" 
					class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
					@if($errors->has('password'))
					<div class="invalid-feedback">
						{{ $errors->first('password') }}
					</div>
					@endif
				</div>
				<div class="text-left">
					<button type="submit" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Login</button>
				</div>
				<a href="{{ url('password/reset') }}" class="mt-3">Lupa password?</a>
		    </form>
		</div>
	</div>
</div>
@endsection