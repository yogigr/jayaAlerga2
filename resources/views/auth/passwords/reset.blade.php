@extends('master')
@section('title', 'Reset Password')
@section('breadcrumb')
<li class="breadcrumb-item active">Reset Password</li>
@endsection
@section('content')
<div class="row bar justify-content-center">
	<div class="col-lg-6">
		<div class="box mt-0">
		    <p class="lead">Atur ulang kata sandi</p>
		    <form action="{{ url('password/reset') }}" method="post">
		    	{{ csrf_field() }}
		    	<input type="hidden" name="token" value="{{ $token }}">
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
				<div class="form-group">
					<label>Konfirmasi Password</label>
					<input name="password_confirmation" type="password" class="form-control">
				</div>
				<div class="text-left">
					<button type="submit" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Reset</button>
				</div>
		    </form>
		</div>
	</div>
</div>
@endsection