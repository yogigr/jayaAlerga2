@if($order->order_status_id == 1)
	<button type="button" data-toggle="collapse" data-target="#paymentConfirmation" class="btn btn-warning">Lihat Konfirmasi Pembayaran</button>
	<div class="collapse mt-2" id="paymentConfirmation">
		<div class="card card-body">
			@if($order->hasPaymentConfirmation())
				<div class="table-responsive">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<td>
									Tanggal Transfer <br>
									<strong>{{ $order->payment_confirmation->dateFormatted() }}</strong>
								</td>
								<td>
									Bank Tujuan <br>
									<strong>
										{{ $order->payment_confirmation->admin_bank->bank_name }}
										({{ $order->payment_confirmation->admin_bank->bank_account }} - {{ $order->payment_confirmation->admin_bank->under_the_name }})
									</strong>
								</td>
							</tr>
							<tr>
								<td>
									Nama Bank Pengirim <br>
									<strong>{{ $order->payment_confirmation->user_bank_name }}</strong>
								</td>
								<td>
									Rekening Bank Pengirim <br>
									<strong>{{ $order->payment_confirmation->bank_account }}</strong>
								</td>
							</tr>
							<tr>
								<td>
									Atas Nama Bank Pengirim <br>
									<strong>{{ $order->payment_confirmation->under_the_name }}</strong>
								</td>
								<td>
									Total Transfer <br>
									<strong>{{ $order->payment_confirmation->amountStringFormatted() }}</strong>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									Bukti Transfer <br>
									<img src="{{ asset('images/payment_confirmation/'.$order->payment_confirmation->image) }}">
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<form method="post" action="{{ url('admin/order/'.$order->code.'/process') }}">
					{{ csrf_field() }}
					{{ method_field('patch') }}
					<button type="submit" class="btn btn-info" onclick="return confirm('Yakin pembayaran selesai?')">
						Pembayaran selesai
					</button>
				</form>
			@else
			<p class="text-danger">Pembeli belum melakukan pembayaran / konfirmasi pembayaran</p>
			@endif
		</div>
	</div>
@elseif($order->order_status_id == 2)
	<button type="button" data-toggle="collapse" data-target="#sendOrder" class="btn btn-warning">
		Kirim Pesanan
	</button>
	<div class="collapse mt-2" id="sendOrder">
		<div class="card card-body">
			<p>Sebelum mengisi nomor resi pesanan, pastikan sudah melakukan pengiriman pesanan via JNE dan mendapatkan nomor resi pengiriman</p>
			<form method="post" action="{{ url('admin/order/'.$order->code.'/send') }}">
				{{ csrf_field() }}
				{{ method_field('patch') }}
				<div class="form-group">
					<label>Nomor Resi</label>
					<input type="text" name="resi_number" value="{{ old('resi_number') }}"
					class="form-control {{ $errors->has('resi_number') ? 'is-invalid' : '' }}" required>
					@if($errors->has('resi_number'))
					<div class="invalid-feedback">
						{{ $errors->first('resi_number') }}
					</div>
					@endif
				</div>
				<button type="submit" class="btn btn-info">Kirim Pesanan</button>
			</form>
		</div>
	</div>
@elseif($order->order_status_id == 3 || $order->order_status_id == 4)
	<div class="card card-body">
		<h3>Nomor Resi Pengiriman</h3>
		<p>{{ $order->resi_number }}</p>
	</div>
@endif