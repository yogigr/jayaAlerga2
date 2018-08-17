@extends('master')
@section('title', 'Lupa Password')
@section('breadcrumb')
<li class="breadcrumb-item">Lupa password</li>
@endsection
@section('content')
<div class="row bar justify-content-center">
	<div class="col-lg-6">
		<div class="box mt-0">
			@if(session('status'))
			<div role="alert" class="alert alert-success">
				{{ session('status') }}
			</div>
			@endif
		    <p class="lead">Silahkan Masukkan email anda</p>
		    <form action="{{ url('password/email') }}" method="post">
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
				<div class="text-left">
					<button type="submit" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Kirim</button>
				</div>
		    </form>
		</div>
	</div>
</div>
@endsection