@extends('master')
@section('title', 'Pengaturan Web')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ url('admin') }}">Admin</a></li>
<li class="breadcrumb-item active">Pengaturan Web</li>
@endsection
@section('content')
<div class="row bar">
	@include('admin.menu')
	<div class="col-lg-9">
		@if(session('status'))
			<div role="alert" class="alert alert-success alert-dismissible">
				<button type="button" data-dismiss="alert" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				{{ session('status') }}
			</div>
		@endif
		@include('admin.setting.company_data')
	</div>
</div>
@endsection