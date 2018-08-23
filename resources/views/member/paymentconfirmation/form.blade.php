<form method="post" action="{{ url('member/payment-confirmation/'.$order->code) }}"
enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label>Tanggal Transfer</label>
				<input type="text" name="transfer_date" 
				value="{{ $order->hasPaymentConfirmation() ? $order->payment_confirmation->dateFormatted() : old('transfer_date') }}" 
				class="form-control datepicker {{ $errors->has('transfer_date') ? 'is-invalid' : '' }}">
				@if($errors->has('transfer_date'))
					<div class="invalid-feedback">{{ $errors->first('transfer_date') }}</div>
				@endif
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label>Bank Tujuan</label>
				<select name="admin_bank_id"
				class="form-control {{ $errors->has('admin_bank_id') ? 'is-invalid' : '' }}">
					<option value="">Pilih Bank Tujuan</option>
					@foreach($adminBanks as $bank)
					<option value="{{ $bank->id }}"
					{{ $order->hasPaymentConfirmation() ? ($order->payment_confirmation->admin_bank_id == $bank->id ? 'selected' : '') : (old('admin_bank_id') == $bank->id ? 'selected' : '') }}>
						{{ $bank->bank_name }} ({{ $bank->bank_account }} - {{ $bank->under_the_name }})
					</option>
					@endforeach
				</select>
				@if($errors->has('admin_bank_id'))
					<div class="invalid-feedback">{{ $errors->first('admin_bank_id') }}</div>
				@endif
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<div class="form-group">
				<label>Nama Bank Pengirim</label>
				<input type="text" name="user_bank_name" 
				value="{{ $order->hasPaymentConfirmation() ? $order->payment_confirmation->user_bank_name : old('user_bank_name') }}"
				class="form-control {{ $errors->has('user_bank_name') ? 'is-invalid' : '' }}"
				placeholder="Contoh: BRI">
				@if($errors->has('user_bank_name'))
					<div class="invalid-feedback">{{ $errors->first('user_bank_name') }}</div>
				@endif
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<label>Rekening Bank Pengirim</label>
				<input type="text" name="bank_account" 
				value="{{ $order->hasPaymentConfirmation() ? $order->payment_confirmation->bank_account : old('bank_account') }}"
				class="form-control {{ $errors->has('bank_account') ? 'is-invalid' : '' }}">
				@if($errors->has('bank_account'))
					<div class="invalid-feedback">{{ $errors->first('bank_account') }}</div>
				@endif
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<label>Atas Nama Pengirim</label>
				<input type="text" name="under_the_name" 
				value="{{ $order->hasPaymentConfirmation() ? $order->payment_confirmation->under_the_name : old('under_the_name') }}"
				class="form-control {{ $errors->has('under_the_name') ? 'is-invalid' : '' }}">
				@if($errors->has('under_the_name'))
					<div class="invalid-feedback">{{ $errors->first('under_the_name') }}</div>
				@endif
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label>Jumlah Transfer (Rp)</label>
				<input type="text" name="amount" 
				value="{{ $order->hasPaymentConfirmation() ? $order->payment_confirmation->amount : old('amount') }}"
				class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}">
				@if($errors->has('amount'))
					<div class="invalid-feedback">{{ $errors->first('amount') }}</div>
				@endif
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label>Upload Bukti Transfer</label>
				<input type="file" name="image"
				class="form-control-file {{ $errors->has('image') ? 'is-invalid' : '' }}">
				@if($errors->has('image'))
					<div class="invalid-feedback">{{ $errors->first('image') }}</div>
				@endif
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<button type="submit" class="btn btn-primary">
				@if($order->hasPaymentConfirmation())
					Update Konfirmasi Pembayaran
				@else
					Simpan Konfirmasi Pembayaran
				@endif
			</button>
		</div>
	</div>
</form>