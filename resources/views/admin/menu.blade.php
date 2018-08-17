<div class="col-lg-3">
	<div class="panel panel-default sidebar-menu with-icons">
		<div class="panel-heading">
			<h3 class="h4 panel-title">Menu Admin</h3>
		</div>
		<div class="panel-body">
			 <ul class="nav nav-pills flex-column text-sm">
                <li class="nav-item">
                    <a href="{{ url('admin/product') }}" 
                    class="nav-link {{ request()->segment(1) == 'admin' 
                    && request()->segment(2) == 'product' ? 'active' : '' }}">
                        <i class="fa fa-shopping-bag"></i>
                        Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/category') }}" 
                    class="nav-link {{ request()->segment(1) == 'admin' 
                    && request()->segment(2) == 'category' ? 'active' : '' }}">
                        <i class="fa fa-tags"></i>
                        Kategori
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/setting') }}" 
                    class="nav-link {{ request()->segment(1) == 'admin' 
                    && request()->segment(2) == 'setting' ? 'active' : '' }}">
                        <i class="fa fa-sliders"></i>
                        Pengaturan Web
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/account') }}" 
                    class="nav-link {{ request()->segment(1) == 'admin' 
                    && request()->segment(2) == 'account' ? 'active' : '' }}">
                        <i class="fa fa-user"></i> 
                        Akun Saya
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link"
                    onclick="getElementById('logoutForm').submit()">
                        <i class="fa fa-sign-out"></i> 
                        Keluar
                    </a>
                    <form id="logoutForm" method="post" action="{{ url('logout') }}">
                    {{ csrf_field() }}
                    </form>
                </li>
            </ul>
		</div>
	</div>
</div>