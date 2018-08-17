@extends('master')
@section('title', 'Home')
@section('content')
<div class="row bar">
	<div class="col-md-12">
		<div class="product-big">
			<div class="row products">
				@if($products->count() > 0)
					@foreach($products as $product)
					<div class="col-lg-3 col-md-4">
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
					<p>Belum ada produk</p>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection