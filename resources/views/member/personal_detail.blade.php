<div class="box mt-0">
	<div class="heading">
		<h3 class="text-uppercase">Personal details</h3>
	</div>
	<form method="post" action="{{ url('member/account') }}">
		{{ csrf_field() }}
		{{ method_field('patch') }}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="firstname">Nama Depan</label>
					<input id="firstname" name="first_name" value="{{ $user->first_name }}" type="text" 
					class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}">
					@if($errors->has('first_name'))
						<div class="invalid-feedback">
						{{ $errors->first('first_name') }}
						</div>
					@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Nama Belakang</label>
					<input name="last_name" value="{{ $user->last_name }}" type="text" 
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
			<div class="col-md-6">
				<div class="form-group">
					<label>Email</label>
					<input name="email" value="{{ $user->email }}" type="text" 
					class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
					@if($errors->has('email'))
						<div class="invalid-feedback">
						{{ $errors->first('email') }}
						</div>
					@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Telp</label>
					<input name="phone" value="{{ $user->phone }}" type="text" 
					class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}">
					@if($errors->has('phone'))
						<div class="invalid-feedback">
						{{ $errors->first('phone') }}
						</div>
					@endif
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Alamat</label>
					<textarea name="address" 
					class="form-control 
					{{ $errors->has('address') ? 'is-invalid' : '' }}">{{ $user->address }}</textarea>
					@if($errors->has('address'))
						<div class="invalid-feedback">
						{{ $errors->first('address') }}
						</div>
					@endif
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-4">
				<label>Kota/Kab</label>
				<select name="city_id" 
				class="form-control {{ $errors->has('city_id') ? 'is-invalid' : '' }}">
					<option value="">Pilih Kota</option>
					@foreach($cities as $city)
					<option value="{{ $city->id }}"
					{{ $user->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
					@endforeach
				</select>
				@if($errors->has('city_id'))
				<div class="invalid-feedback">
					{{ $errors->first('city_id') }}
				</div>
				@endif
			</div>
			<div class="col-md-4">
				<label>Provinsi</label>
				<select name="province_id" 
				class="form-control {{ $errors->has('province_id') ? 'is-invalid' : '' }}">
					<option value="">Pilih Provinsi</option>
					@foreach($provinces as $province)
					<option value="{{ $province->id }}"
					{{ $user->province_id == $province->id ? 'selected' : '' }}>{{ $province->name }}</option>
					@endforeach
				</select>
				@if($errors->has('province_id'))
				<div class="invalid-feedback">
					{{ $errors->first('province_id') }}
				</div>
				@endif
			</div>
			<div class="col-md-4">
				<label>Kode Pos</label>
				<input type="text" name="postal_code" value="{{ $user->postal_code }}"
				class="form-control {{ $errors->has('postal_code') ? 'is-invalid' : '' }}">
				@if($errors->has('postal_code'))
				<div class="invalid-feedback">
					{{ $errors->first('postal_code') }}
				</div>
				@endif
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-template-outlined">
					<i class="fa fa-save"></i> 
					Save changes
				</button>
			</div>
		</div>
	</form>
</div>