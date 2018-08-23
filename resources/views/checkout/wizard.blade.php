<ul class="nav nav-pills nav-fill">
	<li class="nav-item">
		<a href="javascript:void(0)" class="nav-link 
		{{ request()->segment(1) == 'checkout' && request()->segment(2) == 'address'  ? 'active' : 'disabled' }}"> 
			<i class="fa fa-map-marker"></i><br>
			Alamat Pengiriman
		</a>
	</li>
	<li class="nav-item">
		<a href="javascript:void(0)" class="nav-link 
		{{ request()->segment(1) == 'checkout' && request()->segment(2) == 'shipping'  ? 'active' : 'disabled' }}">
			<i class="fa fa-truck"></i><br>
			Metode Pengiriman
		</a>
	</li>
	<li class="nav-item">
		<a href="javascript:void(0)" class="nav-link 
		{{ request()->segment(1) == 'checkout' && request()->segment(2) == 'payment'  ? 'active' : 'disabled' }}">
			<i class="fa fa-money"></i><br>
			Metode Pembayaran
		</a>
	</li>
	<li class="nav-item">
		<a href="javascript:void(0)" class="nav-link
		{{ request()->segment(1) == 'checkout' && request()->segment(2) == 'review'  ? 'active' : 'disabled' }}">
			<i class="fa fa-eye"></i><br>
			Review Pesanan
		</a>
	</li>
</ul>