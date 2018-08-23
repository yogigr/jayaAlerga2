@extends('master')
@section('title', 'Pesanan')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Member</a></li>
<li class="breadcrumb-item active">Pesanan</li>
@endsection
@section('content')
<div class="row bar">
	@include('member.menu')
	<div id="customer-orders" class="col-md-9">
		<p class="text-muted lead">
			Jika Anda memiliki pertanyaan, jangan ragu untuk <a href="{{ url('contact') }}">menghubungi kami</a>, pusat layanan pelanggan kami bekerja untuk Anda 24 Jam.
		</p>
		<div class="box mt-0 mb-lg-0">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Kode Pesanan</th>
							<th>Tanggal</th>
							<th>Total Tagihan</th>
							<th>Status</th>
							<th>#</th>
						</tr>
					</thead>
					<tbody>
						@if($orders->count() > 0)
							@foreach($orders as $order)
							<tr>
								<td><strong>{{ $order->getCode() }}</strong></td>
								<td>{{ $order->tanggalWaktu() }}</td>
								<td>{{ $order->totalStringFormatted() }}</td>
								<td>
									<span class="{{ $order->getBadge() }}">
										{{ $order->order_status->name }}
									</span>
									<button type="button" class="btn btn-secondary btn-sm rounded-circle" data-container="body" data-toggle="popover" data-placement="right" data-content="{{ $order->order_status->description }}">
									<i class="fa fa-question"></i>
									</button>
								</td>
								<td>
									<a href="{{ url('member/order/'.$order->code) }}" 
									class="btn btn-template-outlined btn-sm">View</a>
								</td>
							</tr>
							@endforeach
						@else
						<tr><td colspan="5">Tidak ada pesanan</td></tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection