@extends('master')
@section('title', 'Register')
@section('breadcrumb')
<li class="breadcrumb-item active">register</li>
@endsection
@section('content')
<div class="row bar justify-content-center">
	<div class="col-lg-6">
		<div class="box mt-0">
			<h2 class="text-uppercase">AKUN BARU</h2>
		    <p class="lead">Silahkan Registrasi akun baru kamu disini</p>
		    <form action="{{ url('register') }}" method="post">
		    	{{ csrf_field() }}
				<div class="form-group">
					<label>Nama Depan</label>
					<input name="first_name" type="text" value="{{ old('first_name') }}" 
					class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" 
					autocomplete="off" autofocus>
					@if($errors->has('first_name'))
					<div class="invalid-feedback">
						{{ $errors->first('first_name') }}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label>Nama Belakang</label>
					<input name="last_name" type="text" value="{{ old('last_name') }}" 
					class="form-control {{ $errors->has('last_name') ? 'is-invalid' : ''}}" autocomplete="off">
					@if($errors->has('last_name'))
					<div class="invalid-feedback">
						{{ $errors->first('last_name') }}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label>Email</label>
					<input name="email" type="text" value="{{ old('email') }}" 
					class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" autocomplete="off">
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
				<div class="text-center">
					<button type="submit" class="btn btn-template-outlined"><i class="fa fa-user-md"></i> Register</button>
				</div>
		    </form>
		</div>
	</div>
</div>
@endsection