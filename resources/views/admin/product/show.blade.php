@extends('master')
@section('title', 'Detail Produk')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ url('admin') }}">Admin</a></li>
<li class="breadcrumb-item"><a href="{{ url('admin/product') }}">Produk</a></li>
<li class="breadcrumb-item active">Detail</li>
@endsection
@section('content')
<div class="row bar">
	@include('admin.menu')
	<div class="col-lg-9">
		<div class="card">
			<div class="card-body">
				<form method="post" action="{{ url('admin/product/'.$product->id) }}" enctype="multipart/form-data">
					{{ csrf_field() }}
					{{ method_field('patch') }}
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Produk</label>
								<input type="text" name="product_name" value="{{ $product->name }}"
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
									<option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
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
								rows="8">{{ $product->description }}</textarea>
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
								<input type="text" name="product_weight" value="{{ $product->weight }}"
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
								<input type="text" name="product_price" value="{{ $product->price }}"
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
							<img src="{{ is_null($product->photo) ? asset('images/product/null.jpg') 
							: asset('images/product/'.$product->photo) }}" class="img-fluid img-thumbnail">
							<div class="custom-file mt-3">
								<input type="file" name="photo" 
								class="custom-file-input {{ $errors->has('photo') ? 'is-invalid' : '' }}">
								<label class="custom-file-label" for="validatedCustomFile">Ganti photo produk</label>
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
								Update
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection