@extends('master')
@section('title', 'Daftar Pesanan')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ url('admin') }}">Admin</a></li>
<li class="breadcrumb-item active">Daftar Pesanan</li>
@endsection
@section('content')
<div class="row bar">
	@include('admin.menu')
	<div class="col-lg-9">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-6">
						<form method="get" action="{{ url('admin/order') }}">
							<div class="form-group">
								<input type="text" name="query" value="{{ request('query') }}" class="form-control"
								placeholder="Cari Kode Pesanan">
							</div>
						</form>
					</div>
				</div>
				
				<div class="table-responsive">
					<table class="table table-hover table-bordered">
						<thead class="thead-dark">
							<tr>
								<th>Kode Pesanan</th>
								<th>Tanggal</th>
								<th>Total</th>
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
										<a href="{{ url('admin/order/'.$order->code) }}" 
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
				{{ $orders->links() }}
			</div>
		</div>
	</div>
</div>
@endsection