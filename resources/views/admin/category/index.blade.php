@extends('master')
@section('title', 'Kategori')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ url('admin') }}">Admin</a></li>
<li class="breadcrumb-item active">Kategori</li>
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
				<div class="heading">
					<h3 class="text-uppercase">Tambah Kategori</h3>
				</div>
				<form method="post" action="{{ url('admin/category') }}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-6">
							<label>Nama Kategori</label>
							<input type="text" name="category_name" value="{{ old('category_name') }}" required autocomplete="off"
							class="form-control {{ $errors->has('category_name') ? 'is-invalid' : '' }}">
							@if($errors->has('category_name'))
								<div class="invalid-feedback">{{ $errors->first('category_name') }}</div>
							@endif
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<button type="submit" class="btn btn-template-outlined"><i class="fa fa-save"></i> Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="heading">
					<h3 class="text-uppercase">Daftar Kategori</h3>
				</div>
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Nama Kategori</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
							@if($categories->count() > 0)
								@foreach($categories as $cat)
								<tr>
									<td>{{ $cat->name }}</td>
									<td>
										<button class="btn btn-danger btn-sm delCatBtn"
										url="{{ url('admin/category/'.$cat->id) }}">
											<i class="fa fa-trash"></i>
										</button>
									</td>
								</tr>
								@endforeach
							@endif
						</tbody>
					</table>
				</div>
				{{ $categories->links() }}
			</div>
		</div>
	</div>
</div>
<form id="delCatForm" method="post" action>
	{{ csrf_field() }}
	{{ method_field('delete') }}
</form>
@endsection
@push('scripts')
<script>
	$(function(){
		$('body').on('click', '.delCatBtn', function(){
			var x = confirm('Yakin hapus kategori?');
			if (x == false) {return false}
			var form = $('#delCatForm');
			form.attr('action', $(this).attr('url'));
			form.submit();
		});
	});
</script>
@endpush