@extends('master')
@section('title', 'Konfirmasi Pembayaran Pesanan '.$order->getCode())
@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Member</a></li>
<li class="breadcrumb-item"><a href="{{ url('member/order') }}">Pesanan</a></li>
<li class="breadcrumb-item"><a href="{{ url('member/order/'.$order->code) }}">{{ $order->getCode() }}</a></li>
<li class="breadcrumb-item active">Konfirmasi Pembayaran</li>
@endsection
@section('content')
<div class="row bar">
	@include('member.menu')
	<div class="col-md-9">
		<p>Sebelum mengisi form konfirmasi pembayaran pastikan anda sudah melakukan pembayaran dengan transfer ke salah satu rekening kami berikut ini.</p>
		<div class="card">
			<div class="card-body text-center">
				<h3>Jumlah Pembayaran</h3>
				<h3 class="text-primary">{{ $order->totalStringFormatted() }}</h3>
			</div>
		</div>
		<div class="row mb-3">
			@foreach($adminBanks as $bank)
			<div class="col-sm-4">
				<div class="card">
					<div class="card-body">
						<img src="{{ asset('images/web/'.$bank->logo) }}" class="img-fluid mx-auto d-block" 
						style="max-height: 92.64px">
					</div>
					<div class="card-footer">
						<p class="text-center">
							Bank {{ $bank->bank_name }} <br>
							{{ $bank->bank_account }} <br>
							a/n {{ $bank->under_the_name }}
						</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<p>Setelah Transfer, Segera anda konfirmasi dengan mengisi form dibawah ini.</p>
		<div class="card">
			<div class="card-header">
				<h4>Form Konfirmasi Pembayaran</h4>
			</div>
			<div class="card-body">
				@include('member.paymentconfirmation.form')
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script>
	$(function(){
		$('.datepicker').datepicker({
			autoclose: true,
			format: 'dd/mm/yyyy'
		});
	});
</script>
@endpush