<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Kost Pak Toto </title>
    <link rel="icon" type="image/png" href="{{asset('image/ptt.jpg')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="{{ asset('shopper') }}/fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{ asset('shopper') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('shopper') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('shopper') }}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('shopper') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('shopper') }}/css/owl.theme.default.min.css">

    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="{{ asset('shopper') }}/css/aos.css">

    <link rel="stylesheet" href="{{ asset('shopper') }}/css/style.css">

    

  </head>
  <body>
  
  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="{{ route('user.produk.cari') }}" method="get" class="site-block-top-search" >
                @csrf
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" name="cari" placeholder="Search">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="/" class="js-logo-clone">Kost Pak Toto</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
            <div class="top-right links"> 
            <div class="site-top-icons">
              <ul>
              @if (Route::has('login'))
                    @auth
                        <li>
                          <div class="dropdown">
                            <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icon icon-person"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                  <i class="mdi mdi-logout mr-2 text-primary"></i> Keluar 
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                            </div>
                            </div>
                        </li>
                        <li>
                          <?php
                            $user_id = \Auth::user()->id;
                            $total_keranjang = \DB::table('keranjang')
                            ->select(DB::raw('count(id) as jumlah'))
                            ->where('user_id',$user_id)
                            ->first();
                          ?>
                            <a href="{{ route('user.keranjang') }}" class="site-cart">
                            <span class="icon icon-add_shopping_cart"></span>
                            <span class="count">{{ $total_keranjang->jumlah }}</span>
                            </a>
                        </li> 
                        <li>
                        <?php
                            $user_id = \Auth::user()->id;
                            $total_order = \DB::table('order')
                            ->select(DB::raw('count(id) as jumlah'))
                            ->where('user_id',$user_id)
                            ->where('status_order_id','!=',5)
                            ->where('status_order_id','!=',6)
                            ->first();
                          ?>
                        <a href="{{ route('user.order') }}" class="site-cart">
                            <span class="icon icon-shopping_cart"></span>
                            <span class="count">{{ $total_order->jumlah }}</span>
                            </a>
                        </li>
                    @else
                    <div class="dropdown">
                            <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icon icon-person"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('login') }}">Masuk</a>
                                @if (Route::has('register'))
                                  <a class="dropdown-item" href="{{ route('register') }}">Daftar</a>
                                @endif
                            </div>
                            </div>
                    @endauth
                </div>
            @endif
            <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
            </div>
            </ul>
            </div> 
          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="{{ Request::path() === '/' ? '' : '' }}"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="{{ Request::path() === 'produk' ? '' : '' }}"><a href="{{ route('user.produk') }}">Kos</a></li>
            <li class="{{ Request::path() === 'about' ? '' : '' }}"><a href="{{ route('about') }}">Tentang</a></li>
          </ul>
        </div>
      </nav>
    </header>

    @yield('content')
    
    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-6">
            <div class="block-5 mb-2">
              <h3 class="footer-heading mb-4">Kontak Info</h3>
              <ul class="list-unstyled">
                <li class="address">Jalan Dayung IV B No. 05 RT. 06 RW. 05</li>
                <li class="phone">0858-8238-2343</li>
                <li class="email">indrafirdaus15@gmail.com</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-2 text-center">
          <div class="col-md-12">
            <p>
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved by Kost Pak Toto</a>
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="{{ asset('shopper') }}/js/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
  <script src="{{ asset('shopper') }}/js/jquery-ui.js"></script>
  <script src="{{ asset('shopper') }}/js/popper.min.js"></script>
  <script src="{{ asset('shopper') }}/js/bootstrap.min.js"></script>
  <script src="{{ asset('shopper') }}/js/owl.carousel.min.js"></script>
  <script src="{{ asset('shopper') }}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ asset('shopper') }}/js/aos.js"></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js">
  </script>
  <script src="{{ asset('table/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('table/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('table/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('swal/dist/sweetalert2.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <!-- End custom js for this page -->
    
  
  <script src="{{ asset('shopper') }}/js/main.js"></script>
    @yield('js')
    @include('sweetalert::alert')
  </body>
</html>