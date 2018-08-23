<div class="content">
	<div class="row">
		<div class="col-sm-12">
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
									<td>{{ $cart->qty }}</td>
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
				</table>
			</div>
			<div id="order-summary" class="box mb-4 mt-0 p-0">
				<div class="box-header mb-0 mt-0">
					<h3>Alamat Pengiriman</h3>
				</div>
				<div class="table-responsive">
					<table class="table">
						<tbody>
							<tr>
								<td>
									<p class="text-muted text-small">
										{{ $checkout->first_name . ' ' . $checkout->last_name }} <br>
										{{ $checkout->address }}<br>
										{{ $checkout->city->name }} {{ $checkout->province->name }}
										{{ $checkout->postal_code }}<br>
										{{ $checkout->phone }}
									</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>