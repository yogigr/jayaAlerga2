<div class="box mt-0">
	<div class="heading">
		<h3 class="text-uppercase">Data Perusahaan</h3>
	</div>
	<form method="post" action="{{ url('admin/update-company') }}" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('patch') }}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Nama Perusahaan</label>
					<input type="text" name="company_name" value="{{ $company->company_name }}"
					class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}"
					autocomplete="off">
					@if($errors->has('company_name'))
					<div class="invalid-feedback">
						{{ $errors->first('company_name') }}
					</div>
					@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" value="{{ $company->email }}"
					class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
					autocomplete="off">
					@if($errors->has('email'))
					<div class="invalid-feedback">
						{{ $errors->first('email') }}
					</div>
					@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Deskripsi Perusahaan</label>
					<textarea name="company_desc"
					class="form-control {{ $errors->has('company_desc') ? 'is-invalid' : '' }}"
					autocomplete="off" rows="6">{{ $company->company_desc }}</textarea>
					@if($errors->has('company_desc'))
					<div class="invalid-feedback">
						{{ $errors->first('company_desc') }}
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
					class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
					autocomplete="off">{{ $company->address }}</textarea>
					@if($errors->has('address'))
					<div class="invalid-feedback">
						{{ $errors->first('address') }}
					</div>
					@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Kota/Kab</label>
					<select name="city_id" 
					class="form-control {{ $errors->has('city_id') ? 'is-invalid' : '' }}">
						<option value="">Pilih Kota</option>
						@foreach($cities as $city)
						<option value="{{ $city->id }}" {{ $company->city_id == $city->id ? 'selected' : '' }}>
							{{ $city->name }}
						</option>
						@endforeach
					</select>
					@if($errors->has('city_id'))
					<div class="invalid-feedback">
						{{ $errors->first('city_id') }}
					</div>
					@endif
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Provinsi</label>
					<select name="province_id" 
					class="form-control {{ $errors->has('province_id') ? 'is-invalid' : '' }}">
						<option value="">Pilih Provinsi</option>
						@foreach($provinces as $province)
						<option value="{{ $province->id }}" {{ $company->province_id == $province->id ? 'selected' : '' }}>
							{{ $province->name }}
						</option>
						@endforeach
					</select>
					@if($errors->has('province_id'))
					<div class="invalid-feedback">
						{{ $errors->first('province_id') }}
					</div>
					@endif
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Kode Pos</label>
					<input type="text" name="postal_code" value="{{ $company->postal_code }}"
					class="form-control {{ $errors->has('postal_code') ? 'is-invalid' : '' }}"
					autocomplete="off">
					@if($errors->has('postal_code'))
					<div class="invalid-feedback">
						{{ $errors->first('postal_code') }}
					</div>
					@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Telpon 1</label>
					<input type="text" name="phone1" value="{{ $company->phone1 }}"
					class="form-control {{ $errors->has('phone1') ? 'is-invalid' : '' }}"
					autocomplete="off">
					@if($errors->has('phone1'))
					<div class="invalid-feedback">
						{{ $errors->first('phone1') }}
					</div>
					@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Telpon 2</label>
					<input type="text" name="phone2" value="{{ $company->phone2 }}"
					class="form-control {{ $errors->has('phone2') ? 'is-invalid' : '' }}"
					autocomplete="off">
					@if($errors->has('phone2'))
					<div class="invalid-feedback">
						{{ $errors->first('phone2') }}
					</div>
					@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Instagram</label>
					<input type="text" name="instagram" value="{{ $company->instagram }}"
					class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}"
					autocomplete="off" placeholder="contoh: https://www.instagram.com/jayaalerga">
					@if($errors->has('instagram'))
					<div class="invalid-feedback">
						{{ $errors->first('instagram') }}
					</div>
					@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Facebook</label>
					<input type="text" name="facebook" value="{{ $company->facebook }}"
					class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}"
					autocomplete="off" placeholder="contoh: https://www.facebook.com/jayaalerga">
					@if($errors->has('facebook'))
					<div class="invalid-feedback">
						{{ $errors->first('facebook') }}
					</div>
					@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Twitter</label>
					<input type="text" name="twitter" value="{{ $company->twitter }}"
					class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}"
					autocomplete="off" placeholder="contoh: https://twitter.com/jayaalerga">
					@if($errors->has('twitter'))
					<div class="invalid-feedback">
						{{ $errors->first('twitter') }}
					</div>
					@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Google+</label>
					<input type="text" name="google" value="{{ $company->google }}"
					class="form-control {{ $errors->has('google') ? 'is-invalid' : '' }}"
					autocomplete="off" placeholder="contoh: https://plus.google.com/u/0/102045401918411425795">
					@if($errors->has('google'))
					<div class="invalid-feedback">
						{{ $errors->first('google') }}
					</div>
					@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="custom-file">
					<input type="file" name="logo" 
					class="custom-file-input {{ $errors->has('logo') ? 'is-invalid' : '' }}">
					<label class="custom-file-label" for="validatedCustomFile">Ganti Logo</label>
					@if($errors->has('logo'))
					<div class="invalid-feedback">
						{{ $errors->first('logo') }}
					</div>
					@endif
				</div>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-md-12 text-center">
				<button type="submit" class="btn btn-template-outlined"><i class="fa fa-save"></i> Save changes</button>
			</div>
		</div>
	</form>
</div>