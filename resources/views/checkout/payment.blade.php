@extends('master')
@section('title', 'Checkout - Payment Method')
@section('breadcrumb')
<li class="breadcrumb-item active">Checkout - Payment Method</li>
@endsection
@section('content')
<div class="row">
	<div id="checkout" class="col-lg-9">
		<div class="box border-bottom-0">
			<form method="post" action="{{ url('checkout/payment') }}">
				{{ csrf_field() }}
				@include('checkout.wizard')
				@include('checkout.payment_form')
				<div class="box-footer d-flex flex-wrap align-items-center justify-content-between">
					<div class="left-col"><a href="{{ url('checkout/shipping') }}" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i>Kembali ke metode pengiriman</a></div>
					<div class="right-col">
						<button type="submit" class="btn btn-template-main">Review Pesanan<i class="fa fa-chevron-right"></i></button>
					</div>
				</div>
			</form>
		</div>
	</div>
	@include('checkout.right_sidebar')
</div>
@endsection