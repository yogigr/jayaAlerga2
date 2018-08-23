@extends('master')
@section('title', 'Pesanan '.$order->getCode())
@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Member</a></li>
<li class="breadcrumb-item"><a href="{{ url('member/order') }}">Pesanan</a></li>
<li class="breadcrumb-item active">{{ $order->getCode() }}</li>
@endsection
@section('content')
<div class="row bar">
	@include('member.menu')
	<div id="customer-order" class="col-lg-9">
		@if(session('status'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			{{ session('status') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif
		<p class="lead">
			Pesanan {{ $order->getCode() }} telah dibuat pada <strong>{{ $order->tanggalWaktu() }}</strong> dan dalam status <strong>{{ $order->order_status->name }}</strong>.
			<button type="button" class="btn btn-secondary btn-sm rounded-circle" data-container="body" data-toggle="popover" data-placement="right" data-content="{{ $order->order_status->description }}">
				<i class="fa fa-question"></i>
			</button>
		</p>
		@if($order->order_status_id == 1)
			<a href="{{ url('member/payment-confirmation/'.$order->code) }}"
			class="btn btn-warning mb-2">Konfirmasi Pembayaran</a>
		@endif
		<div class="card">
			<div class="card-body">
				<h3 class="text-uppercase">Detail Pesanan</h3>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th colspan="2">Produk</th>
								<th>jumlah</th>
								<th>Harga</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							@foreach($order->details as $detail)
								<tr>
									<td>
										<a href="{{ url('product/'.$detail->product->slug) }}">
											<img src="{{ is_null($detail->product->photo) ? asset('images/product/null.jpg') 
											: asset('images/product/'.$detail->product->photo)}}" alt="{{ $detail->product->name }}" class="img-fluid">
										</a>
									</td>
									<td>{{ $detail->product->name }}</td>
									<td>{{ $detail->qty }}</td>
									<td>{{ $detail->priceStringFormatted() }}</td>
									<td class="text-right">{{ $detail->totalStringFormatted() }}</td>
								</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th colspan="4" class="text-right">Subtotal</th>
								<th class="text-right">{{ $order->subtotalStringFormatted() }}</th>
							</tr>
							<tr>
								<th colspan="4" class="text-right">Biaya Pengiriman (JNE {{ $order->delivery_service }})</th>
								<th class="text-right">{{ $order->shippingCostStringFormatted() }}</th>
							</tr>
							<tr>
								<th colspan="4" class="text-right">Total</th>
								<th class="text-right"><strong>{{ $order->totalStringFormatted() }}</strong></th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
			
		<div class="card">
			<div class="card-body">
				<h3 class="text-uppercase">Alamat Pengiriman</h3>
				<p>{{ $order->full_name }}<br>{{ $order->address }}<br>{{ $order->city->name }}<br>{{ $order->province->name }}<br>{{ $order->postal_code }}<br>Telp {{ $order->phone }}</p>
			</div>
		</div>
	</div>
</div>
@endsection