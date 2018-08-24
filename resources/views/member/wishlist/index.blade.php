@extends('master')
@section('title', 'Wishlist')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Member</a></li>
<li class="breadcrumb-item active">Wishlist</li>
@endsection
@section('content')
<div class="row bar">
	@include('member.menu')
	<div class="col-lg-9">
		@if(session('status'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			{{ session('status') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif
		<p class="lead text-muted">Daftar Wishlist</p>
		<div class="row products">
			@if($wishlists->count() > 0)
				@foreach($wishlists as $wishlist)
					<div class="col-lg-4 col-md-2">
						<div class="product">
							<div class="image">
								<a href="{{ url('product/'.$wishlist->product->slug) }}">
									<img src="{{ asset('images/product/'.$wishlist->product->photo) }}" alt="{{ $wishlist->product->name }}" class="img-fluid image1">
								</a>
							</div>
							<div class="text">
								<h3 class="h5"><a href="{{ url('product/'.$wishlist->product->slug) }}">
								{{ $wishlist->product->name }}</a></h3>
								<p class="price">{{ $wishlist->product->priceStringFormatted() }}</p>
							</div>
							<div class="ribbon-holder">
								<div class="ribbon new">{{ $wishlist->product->category->name }}</div>
							</div>
							<div class="text-center mt-2">
								<form method="post" action="{{ url('member/wishlist/'.$wishlist->id) }}">
									{{ csrf_field() }}
									{{ method_field('delete') }}
									<button type="submit" class="btn btn-outline-danger">
										Hapus dari Wishlist
									</button>
								</form>
							</div>
						</div>
					</div>
				@endforeach
			@else
			<div class="col-sm-12">
				<p>Wishlist belum ada</p>
			</div>
			@endif
		</div>
	</div>
</div>
@endsection