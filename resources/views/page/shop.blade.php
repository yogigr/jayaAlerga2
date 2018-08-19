@extends('master')
@section('title', 'Belanja')
@section('breadcrumb')
<li class="breadcrumb-item active">Belanja</li>
@endsection
@section('content')
<div class="row bar">
	<div class="col-lg-9">
		<form method="get" action="{{ url('shop') }}">
			<div class="form-group">
				<input type="text" name="query" value="{{ request('query') }}" placeholder="Cari Produk"
				class="form-control form-control-lg">
			</div>
		</form>
		<div class="row products products-big">
			@if($products->count() > 0)
				@foreach($products as $product)
				<div class="col-lg-4 col-md-6">
					<div class="product">
						<div class="image">
							<a href="{{ url('product/'.$product->slug) }}">
								<img 
								src="{{ is_null($product->photo) ? asset('images/product/null.jpg') 
								: asset('images/product/'.$product->photo)}}" alt="{{ $product->name }}" 
								class="img-fluid image1">
							</a>
						</div>
						<div class="text">
							<h3 class="h5"><a href="{{ url('product/'.$product->slug) }}">{{ $product->name }}</a></h3>
							<p class="price">
								{{ $product->priceStringFormatted() }}
							</p>
						</div>
						<div class="ribbon-holder">
							<div class="ribbon sale">{{ $product->category->name }}</div>
						</div>
					</div>
				</div>
				@endforeach
			@else
			<div class="col-lg-12">
				@if(request('query'))
				<p>Produk tidak ditemukan</p>
				@else
				<p>Belum ada produk</p>
				@endif
			</div>
			@endif
		</div>
		<div class="pages">
			<nav class="d-flex justify-content-center">
				{{ $products->links('vendor.pagination.bootstrap-4') }}
			</nav>
		</div>
	</div>
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
						<a href="{{ url('shop') }}" class="nav-link d-flex align-items-center justify-content-between active">
							<span>Semua</span>
							<span class="badge badge-secondary">
								{{ \App\Product::count() }}
							</span>
						</a>
					</li>
					@foreach($categories as $cat)
					<li class="nav-item">
						<a href="{{ url('category/'.$cat->slug) }}" class="nav-link d-flex align-items-center justify-content-between">
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