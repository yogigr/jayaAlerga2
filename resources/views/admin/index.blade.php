@extends('master')
@section('title', 'Admin Area')
@section('breadcrumb')
<li class="breadcrumb-item active">Admin Area</li>
@endsection
@section('content')
<div class="row bar">
	@include('admin.menu')
</div>
@endsection