@extends('master')
@section('title', 'Akun Saya')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="javascript:void(0)">Member</a></li>
<li class="breadcrumb-item active">Akun Saya</li>
@endsection
@section('content')
<div class="row bar">
	@include('member.menu')
	<div id="customer-account" class="col-lg-9 clearfix">
		@if($user->isNulledAddress())
			<div role="alert" class="alert alert-warning alert-dismissible">
				<button type="button" data-dismiss="alert" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				Kamu belum melengkapi data alamat anda, silahkan lengkapi terlebih dahulu!
			</div>
		@endif
		@if(session('status'))
			<div role="alert" class="alert alert-success alert-dismissible">
				<button type="button" data-dismiss="alert" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				{{ session('status') }}
			</div>
		@endif
		@include('member.personal_detail')
		@include('member.password')
	</div>
</div>
@endsection