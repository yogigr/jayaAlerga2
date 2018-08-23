<div class="content">
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label>Nama Depan</label>
				<input type="text" name="first_name" 
				value="{{ !is_null($checkout->first_name) ? $checkout->first_name : Auth::user()->first_name }}"
				class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}">
				@if($errors->has('first_name'))
					<div class="invalid-feedback">
						{{ $errors->first('first_name') }}
					</div>
				@endif
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label>Nama Belakang</label>
				<input type="text" name="last_name" 
				value="{{ !is_null($checkout->last_name) ? $checkout->last_name : Auth::user()->last_name }}"
				class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}">
				@if($errors->has('last_name'))
					<div class="invalid-feedback">
						{{ $errors->first('last_name') }}
					</div>
				@endif
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="form-group">
				<label>Alamat Pengiriman</label>
				<textarea name="address" 
				class="form-control {{ $errors->has('address') 
				? 'is-invalid' : '' }}">{{ !is_null($checkout->address) ? $checkout->address : Auth::user()->address }}</textarea>
				@if($errors->has('address'))
					<div class="invalid-feedback">
						{{ $errors->first('address') }}
					</div>
				@endif
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label>Kota/Kab</label>
				<select name="city_id"
				class="form-control {{ $errors->has('city_id') 
				? 'is-invalid' : '' }}">
					<option value="">Pilih Kota</option>
					@foreach($cities as $city)
						<option value="{{ $city->id }}"
						{{ !is_null($checkout->city_id) ? ($checkout->city_id == $city->id ? 'selected' : '')
						: Auth::user()->city_id == $city->id ? 'selected' : '' }}>
						{{ $city->type .' '. $city->name }}</option>
					@endforeach
				</select>
				@if($errors->has('city_id'))
					<div class="invalid-feedback">
						{{ $errors->first('city_id') }}
					</div>
				@endif
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label>Provinsi</label>
				<select name="province_id"
				class="form-control {{ $errors->has('province_id') 
				? 'is-invalid' : '' }}">
					<option value="">Pilih Provinsi</option>
					@foreach($provinces as $province)
						<option value="{{ $province->id }}"
						{{ !is_null($checkout->province_id) ? ($checkout->province_id == $province->id ? 'selected' : '') : Auth::user()->province_id == $province->id ? 'selected' : '' }}>{{ $province->name }}</option>
					@endforeach
				</select>
				@if($errors->has('province_id'))
					<div class="invalid-feedback">
						{{ $errors->first('province_id') }}
					</div>
				@endif
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label>Kode Pos</label>
				<input type="text" name="postal_code" 
				value="{{ !is_null($checkout->postal_code) ? $checkout->postal_code : Auth::user()->postal_code }}"
				class="form-control {{ $errors->has('postal_code') ? 'is-invalid' : '' }}">
				@if($errors->has('postal_code'))
					<div class="invalid-feedback">
						{{ $errors->first('postal_code') }}
					</div>
				@endif
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label>Nomor Telpon/HP</label>
				<input type="text" name="phone" 
				value="{{ !is_null($checkout->phone) ? $checkout->phone : Auth::user()->phone }}"
				class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}">
				@if($errors->has('phone'))
					<div class="invalid-feedback">
						{{ $errors->first('phone') }}
					</div>
				@endif
			</div>
		</div>
	</div>
</div>