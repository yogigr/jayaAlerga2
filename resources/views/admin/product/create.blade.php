@extends('master')
@section('title', 'Tambah Produk')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ url('admin') }}">Admin</a></li>
<li class="breadcrumb-item"><a href="{{ url('admin/product') }}">Produk</a></li>
<li class="breadcrumb-item active">Tambah</li>
@endsection
@section('content')
<div class="row bar">
	@include('admin.menu')
	<div class="col-lg-9">
		<div class="card">
			<div class="card-body">
				<form method="post" action="{{ url('admin/product') }}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Produk</label>
								<input type="text" name="product_name" value="{{ old('product_name') }}"
								class="form-control {{ $errors->has('product_name') ? 'is-invalid' : '' }}"
								autocomplete="off" autofocus>
								@if($errors->has('product_name'))
								<div class="invalid-feedback">{{ $errors->first('product_name') }}</div>
								@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Kategori Produk</label>
								<select name="category_id"
								class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
									<option value="">Pilih Kategori</option>
									@foreach($categories as $cat)
									<option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
										{{ $cat->name }}
									</option>
									@endforeach
								</select>
								@if($errors->has('category_id'))
								<div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
								@endif
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Deskripsi Produk</label>
								<textarea name="product_desc" 
								class="form-control {{ $errors->has('product_desc') ? 'is-invalid' : '' }}"
								rows="8">{{ old('product_desc') }}</textarea>
								@if($errors->has('product_desc'))	
								<div class="invalid-feedback">{{ $errors->first('product_desc') }}</div>
								@endif
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Berat Produk (Gram)</label>
								<input type="text" name="product_weight" value="{{ old('product_weight') }}"
								class="form-control {{ $errors->has('product_weight') ? 'is-invalid' : '' }}"
								autocomplete="off">
								@if($errors->has('product_weight'))
								<div class="invalid-feedback">{{ $errors->first('product_weight') }}</div>
								@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Harga Produk (Rp)</label>
								<input type="text" name="product_price" value="{{ old('product_price') }}"
								class="form-control {{ $errors->has('product_price') ? 'is-invalid' : '' }}"
								autocomplete="off">
								@if($errors->has('product_price'))
								<div class="invalid-feedback">{{ $errors->first('product_price') }}</div>
								@endif
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Stok Awal</label>
								<input type="number" name="stock" value="{{ old('stock') }}"
								class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}"
								autocomplete="off">
								@if($errors->has('stock'))
								<div class="invalid-feedback">{{ $errors->first('stock') }}</div>
								@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="custom-file mt-4">
								<input type="file" name="photo" 
								class="custom-file-input {{ $errors->has('photo') ? 'is-invalid' : '' }}">
								<label class="custom-file-label" for="validatedCustomFile">Upload photo produk</label>
								@if($errors->has('photo'))
								<div class="invalid-feedback">
									{{ $errors->first('photo') }}
								</div>
								@endif
							</div>
						</div>
					</div>
					<div class="row mt-4">
						<div class="col-md-12">
							<button type="submit" class="btn btn-template-outlined">
								<i class="fa fa-save"></i> 
								Simpan
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection