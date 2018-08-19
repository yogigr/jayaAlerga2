<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $company->company_name }} - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.blue.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div id="all">
      <!-- Top bar-->
      <div class="top-bar">
        <div class="container">
          <div class="row d-flex align-items-center">
            <div class="col-md-6 d-md-block d-none">
              <p>Hubungi kami {{ $company->phone1 }} atau {{ $company->email }}.</p>
            </div>
            <div class="col-md-6">
              <div class="d-flex justify-content-md-end justify-content-between">
                <ul class="list-inline contact-info d-block d-md-none">
                  <li class="list-inline-item"><a href="#"><i class="fa fa-phone"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                </ul>
              
                <div class="login">
                  @if(!Auth::check())
                  <a href="{{ url('login') }}" class="login-btn"><i class="fa fa-sign-in"></i><span class="d-none d-md-inline-block">Masuk</span></a>
                  <a href="{{ url('register') }}" class="signup-btn"><i class="fa fa-user"></i><span class="d-none d-md-inline-block">Daftar</span></a>
                  @else
                  <a href="{{ Auth::user()->isAdmin() 
                  || Auth::user()->isOperator() ? url('admin') : url('member/account') }}" 
                  class="signup-btn">
                    <i class="fa fa-user"></i>
                    <span class="d-none d-md-inline-block">
                      {{ Auth::user()->first_name }}
                    </span>
                  </a>
                  @endif
                  <a href="" class="signup-btn">
                    <i class="fa fa-shopping-cart mr-0"></i>
                  </a>
                </div>

                <ul class="social-custom list-inline">
                  <li class="list-inline-item"><a href="{{ $company->instagram }}"><i class="fa fa-instagram"></i></a></li>
                  <li class="list-inline-item"><a href="{{ $company->facebook }}"><i class="fa fa-facebook"></i></a></li>
                  <li class="list-inline-item"><a href="{{ $company->google }}"><i class="fa fa-google-plus"></i></a></li>
                  <li class="list-inline-item"><a href="{{ $company->google }}"><i class="fa fa-twitter"></i></a></li>
                  <li class="list-inline-item"><a href="mailto:{{ $company->email }}"><i class="fa fa-envelope"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Top bar end-->
      
      <!-- Navbar Start-->
      <header class="nav-holder make-sticky">
        <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
          <div class="container"><a href="{{ url('/') }}" class="navbar-brand home">
            @if($company->isNullLogo())
              {{ strtoupper($company->company_name) }}
            @else
              <img src="{{ asset('images/web/'.$company->logo) }}" alt="Universal logo" class="d-none d-md-inline-block">
              <img src="{{ asset('images/web/'.$company->logo) }}" alt="Universal logo" class="d-inline-block d-md-none">
            @endif
            <span class="sr-only">Universal - go to homepage</span></a>
            <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            <div id="navigation" class="navbar-collapse collapse">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item {{ request()->segment(1) == '' ? 'active' : '' }}">
                  <a href="{{ url('/') }}">Home</a>
                </li>
                 <li class="nav-item {{ request()->segment(1) == 'shop' || request()->segment(1) == 'product'
                 || request()->segment(1) == 'category' ? 'active' : '' }}">
                  <a href="{{ url('shop') }}">Belanja</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </header>
      <!-- Navbar End-->
      
      @if(request()->route()->getName() != 'home')
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">@yield('title')</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                @yield('breadcrumb')
              </ul>
            </div>
          </div>
        </div>
      </div>
      @else
      <div class="jumbotron relative-positioned color-white text-md-center">
          <div class="dark-mask mask-primary"></div>
          <div class="container">
            <div class="row mb-small">
              <div class="col-md-12 text-center">
                <h1 class="text-uppercase">What is Lorem Ipsum?</h1>
                <h2 class="text-uppercase">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center-sm">
                <p class="text-uppercase text-bold">Business. Corporate. Agency.<br>Portfolio. Blog. E-commerce.<br>We have covered everything.</p>
                <p class="no-letter-spacing">See our current packages comparison<br>to choose the right one for you.</p>
                <p><a href="{{ url('shop') }}" class="scroll-to btn btn-template-outlined-white">Mulai Belanja</a></p>
              </div>
            </div>
          </div>
      </div>
      @endif

      <div id="content">
        <div class="container">
          @yield('content')
        </div>
      </div>

      @if(Auth::check() && Auth::user()->isAdmin())
      <!-- GET IT-->
      <div class="get-it">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 text-center p-3">
              <h3>Ingin lihat Halaman Depan?</h3>
            </div>
            <div class="col-lg-4 text-center p-3">   <a href="#" class="btn btn-template-outlined-white">Lihat Halaman Depan</a></div>
          </div>
        </div>
      </div>
      @endif
      <!-- FOOTER -->
      <footer class="main-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <h4 class="h6">Tentang Kami</h4>
              <p>{{ $company->shortDesc() }}</p>
              <hr>
              <h4 class="h6">Berlangganan</h4>
              <form method="post" action="{{ url('user/newsletter') }}">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Email Kamu">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-secondary"><i class="fa fa-send"></i></button>
                  </div>
                </div>
              </form>
              <hr class="d-block d-lg-none">
            </div>
            <div class="col-lg-3">
              <h4 class="h6">Kontak</h4>
              <p class="text-uppercase"><strong>{{ $company->company_name }}</strong><p>
                <p>{{ $company->address }} <br>{{ $company->city->name }} <br>{{ $company->province->name }} <br>{{ $company->city->postal_code }} </p><a href="{{ url('contact') }}" class="btn btn-template-main">Ke Halaman Kontak</a>
              <hr class="d-block d-lg-none">
            </div>
          </div>
        </div>
        <div class="copyrights">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 text-center-md">
                <p>&copy; {{ date('Y') }}. {{ $company->company_name }}</p>
              </div>
              <div class="col-lg-8 text-right text-center-md">
                <p>Template design by <a href="https://bootstrapious.com/free-templates">Bootstrapious Templates </a></p>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Javascript files-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/front.js') }}"></script>
    @stack('scripts')
  </body>
</html>