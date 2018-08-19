@extends('master')
@section('title', 'Keranjang')
@section('breadcrumb')
<li class="breadcrumb-item active">Keranjang</li>
@endsection
@section('content')
<div class="row bar">
	<div class="col-lg-12">
		<p class="text-muted lead">
			Saat ini Anda memiliki {{ $carts->sum('qty') }} item dalam keranjang Anda.
		</p>
	</div>
	<div id="basket" class="col-lg-9">
		<div class="box mt-0 pb-0 no-horizontal-padding">
			<form method="post" action="{{ url('cart/update') }}">
				{{ csrf_field() }}
				{{ method_field('patch') }}
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th colspan="2">Produk</th>
								<th>Quantity</th>
								<th>Harga Unit</th>
								<th colspan="2">Total</th>
							</tr>
						</thead>
						<tbody>
							@if($carts->count() > 0)
								@foreach($carts as $cart)
									<tr>
										<td>
											<a href="{{ url('product/'.$cart->product->slug) }}">
												<img src="{{ is_null($cart->product->photo) ? asset('images/product/null.jpg') 
												: asset('images/product/'.$cart->product->photo) }}" alt="{{ $cart->product->name }}" class="img-fluid">
											</a>
										</td>
										<td>
											<a href="{{ url('product/'.$cart->product->slug) }}">
												{{ $cart->product->name }}
											</a>
										</td>
										<td>
											<input type="hidden" name="cart_id[]" value="{{ $cart->id }}">
	                            			<input type="number" name="qty[{{ $cart->id }}]" value="{{ $cart->qty }}" class="form-control">
	                          			</td>
	                          			<td>{{ $cart->product->priceStringFormatted() }}</td>
	                          			<td>{{ $cart->totalStringFormatted() }}</td>
	                          			<td>
	                          				<a href="{{ url('cart/'.$cart->id) }}" class="delCartBtn">
	                          					<i class="fa fa-trash-o"></i>
	                          				</a>
	                          			</td>
									</tr>
								@endforeach
							@else
								<tr><td colspan="6">Keranjang anda kosong</td></tr>
							@endif
						</tbody>
						<tfoot>
							<tr>
								<th colspan="4">Subtotal</th>
								<th colspan="2">{{ $subtotal }}</th>
							</tr>
						</tfoot>
					</table>
				</div>
				<div class="box-footer d-flex justify-content-between align-items-center">
					<div class="left-col"><a href="{{ url('shop') }}" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i> Lanjutkan Berbelanja</a></div>
					<div class="right-col">
						<button type="submit" class="btn btn-secondary"><i class="fa fa-refresh"></i> Update Keranjang</button>
						<button type="button" class="btn btn-template-outlined">Lanjutkan ke pembayaran <i class="fa fa-chevron-right"></i></button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-lg-3">
		<div id="order-summary" class="box mt-0 mb-4 p-0">
			<div class="box-header mt-0">
				<h3>Jasa Pengiriman Kami</h3>
			</div>
			<div class="box-body mb-1">
				<img src="{{ asset('images/web/jne.png') }}" alt="JNE" class="img-fluid">
			</div>
		</div>
	</div>
</div>
<form id="delCartForm" method="post" action>
	{{ csrf_field() }}
	{{ method_field('delete') }}
</form>
@endsection
@push('scripts')
<script>
	$(function(){
		$('body').on('click', '.delCartBtn', function(e){
			e.preventDefault();
			var form = $('#delCartForm');
			form.attr('action', $(this).attr('href'));
			form.submit();
		});
	});
</script>
@endpush