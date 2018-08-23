<div class="content">
	<div class="row">
		@if(!is_object($data))
			<div class="col-sm-12">
				<div class="shipping-method text-center">
					<p class="text-danger">
						Could not resolve host: api.rajaongkir.com
					</p>
				</div>
			</div>
		@else
			@if($status->code != 200)
			<div class="col-sm-12">
				<div class="shipping-method text-center">
					<p class="text-danger">
						Kode error {{ $status->code }}, {{ $status->description }}
					</p>
				</div>
			</div>
			@else
				@foreach($results as $result)
				<div class="col-sm-4">
					<div class="card">
						<div class="card-header">
							<img src="{{ asset('images/web/jne.png') }}" class="img-fluid">
						</div>
						<div class="card-body">
							<p>
								<span class="text-primary font-weight-bold">
									{{ $result->description }} - {{ $result->service }}
								</span> <br>
								<strong>
									{{ 'Rp '. number_format($result->cost[0]->value, 0, '', '.') }}
								</strong><br>
								Waktu pengiriman {{ $result->cost[0]->etd }} Hari
							</p>
						</div>
						<div class="card-footer">
							<div class="text-center">
								<input type="radio" name="delivery" 
								value="{{$result->service}}:{{$result->cost[0]->value}}"
								{{ $result->service == $checkout->delivery_service ? 'checked' : ''}}>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			@endif
		@endif
	</div>
</div>