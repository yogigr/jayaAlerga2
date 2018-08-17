@extends('master')
@section('title', 'Produk')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ url('admin') }}">Admin</a></li>
<li class="breadcrumb-item active">Produk</li>
@endsection
@section('content')
<div class="row bar">
	@include('admin.menu')
	<div class="col-lg-9">
		@if(session('status'))
			<div role="alert" class="alert alert-success alert-dismissible">
				<button type="button" data-dismiss="alert" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				{{ session('status') }}
			</div>
		@endif
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-6">
						<a href="{{ url('admin/product/create') }}" class="btn btn-template-outlined">
							<i class="fa fa-plus"></i> 
							produk
						</a>
					</div>
					<div class="col-lg-6">
						<form method="get" action="{{ url('admin/product') }}">
							<div class="form-group">
								<input type="text" name="query" class="form-control" required autocomplete="off"
								placeholder="Cari Produk">
							</div>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama Product</th>
										<th>Berat</th>
										<th>Harga</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
									@if($products->count() > 0)
										@foreach($products as $product)
											<tr>
												<td>
													<img 
													src="{{ is_null($product->photo) ? asset('images/product/null.jpg') 
													: asset('images/product/'.$product->photo)}}" 
													class="img-responsive img-thumbnail" style="width: 50px">
												</td>
												<td>{{ $product->name }}</td>
												<td class="text-right">{{ $product->weightInKilo() }}</td>
												<td class="text-right">{{ $product->priceStringFormatted() }}</td>
												<td>
													<div class="btn-group btn-group-sm">
														<a href="{{ url('admin/product/'.$product->slug) }}" class="btn btn-warning">
															<i class="fa fa-edit"></i>
														</a>
														<button class="btn btn-danger delProdBtn"
														url="{{ url('admin/product/'.$product->id) }}">
															<i class="fa fa-trash"></i>
														</button>
													</div>
												</td>
											</tr>
										@endforeach
									@endif
								</tbody>
							</table>
						</div>
						{{ $products->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<form id="delProdForm" method="post" action>
	{{ csrf_field() }}
	{{ method_field('delete') }}
</form>
@endsection
@push('scripts')
<script>
	$(function(){
		$('body').on('click', '.delProdBtn', function(){
			var x = confirm('Yakin hapus produk?');
			if (x==false) {return false}
			var form = $('#delProdForm');
			form.attr('action', $(this).attr('url'));
			form.submit();
		});
	});
</script>
@endpush