@extends('master')
@section('title', $product->name)
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ url('shop') }}">Belanja</a></li>
<li class="breadcrumb-item active">{{ $product->name }}</li>
@endsection
@section('content')
<div class="row bar">
	{{-- detail produk --}}
	<div class="col-lg-9">
		@if(session('status'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			{{ session('status') }} <a href="{{ url('cart') }}">Lihat Keranjang</a>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif
		<div id="productMain" class="row">
			<div class="col-sm-6">
				<img src="{{ is_null($product->photo) ? asset('images/product/null.jpg')
				: asset('images/product/'.$product->photo) }}" class="img-fluid mx-auto d-block img-thumbnail">
			</div>
			<div class="col-sm-6">
				<div class="box mt-0">
					<div class="sizes">
						<h3>Berat Barang</h3>
						<p>{{ $product->weightInKilo() }}</p>
					</div>
					<div class="sizes">
						<h3>Stok</h3>
						<p>{{ $product->stock->total }}</p>
					</div>
					<p class="price">
						{{ $product->priceStringFormatted() }}
					</p>
					<p class="text-center">
						<button type="submit" class="btn btn-template-outlined"
						onclick="getElementById('addCartForm').submit()" 
						{{ $product->stock->total < 1 ? 'disabled' : '' }}>
							<i class="fa fa-shopping-cart"></i> 
							Add to cart
						</button>
						<button type="submit" data-toggle="tooltip" data-placement="top" title="" class="btn btn-default" data-original-title="Add to wishlist"><i class="fa fa-heart-o"></i></button>
						<form id="addCartForm" method="post" action="{{ url('cart') }}">
							{{ csrf_field() }}
							<input type="hidden" name="product_id" value="{{ $product->id }}">
						</form>
					</p>
				</div>
			</div>
		</div>
		<div id="details" class="box mb-4 mt-4">
			<h4>Detail Produk</h4>
			<p>{{ $product->description }}</p>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="box text-uppercase mt-0 mb-small">
					<h3>Produk Terkait</h3>
				</div>
			</div>
			@foreach($relatedProducts as $product)
			<div class="col-lg-3 col-md-6">
				<div class="product">
					<div class="image">
						<a href="{{ url('product/'.$product->slug) }}">
							<img src="{{ is_null($product->photo) ? asset('images/product/null.jpg')
							: asset('images/product/'.$product->photo) }}" 
							alt="" class="img-fluid img-thumbnail">
						</a>
					</div>
					<div class="text">
						<h3 class="h5"><a href="{{ url('product/'.$product->slug) }}">{{ $product->name }}</a></h3>
						<p class="price">{{ $product->priceStringFormatted() }}</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	{{--category sidebar--}}
	<div class="col-lg-3">
		<div class="panel panel-default sidebar-menu">
			<div class="panel-heading">
				<h3 class="panel-title">
					Kategori
				</h3>
			</div>
			<div class="panel-body">
				<ul class="nav nav-pills flex-column text-sm category-menu">
					<li class="nav-item">
						<a href="{{ url('shop') }}" class="nav-link d-flex align-items-center justify-content-between">
							<span>Semua</span>
							<span class="badge badge-secondary">
								{{ \App\Product::count() }}
							</span>
						</a>
					</li>
					@foreach($categories as $cat)
					<li class="nav-item">
						<a href="{{ url('category/'.$cat->slug) }}" class="nav-link d-flex align-items-center justify-content-between
						{{ $product->category->id == $cat->id ? 'active' : '' }}">
							<span>{{ $cat->name }}</span>
							<span class="badge badge-secondary">
								{{ $cat->products()->count() }}
							</span>
						</a>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection