<div class="col-lg-3 mt-4 mt-lg-0">
    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="h4 panel-title">Menu Member</h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-pills flex-column text-sm">
                <li class="nav-item">
                    <a href="{{ url('member/order') }}" 
                    class="nav-link {{ request()->segment(1) == 'member' && request()->segment(2) == 'order' ? 'active' : (request()->segment(1) == 'member' && request()->segment(2) == 'payment-confirmation' ? 'active' : '') }}">
                        <i class="fa fa-list"></i> 
                        Pesanan Saya
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('member/wishlist') }}" 
                    class="nav-link {{ request()->segment(1) == 'member' 
                    && request()->segment(2) == 'wishlist' ? 'active' : '' }}">
                        <i class="fa fa-heart"></i> 
                        Wishlist Saya
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('member/account') }}" 
                    class="nav-link {{ request()->segment(1) == 'member' 
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