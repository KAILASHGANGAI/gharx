<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://kit.fontawesome.com/bab741dcae.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"  crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@800&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('owl/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('owl/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>gharax</title>
</head>
<body>
@include('sweetalert::alert')

<nav class="nav nav-navbar py-2" id="header">
    <div class="px-3">

            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="/about">About</a>
                <a href="/sservices">Services</a>
                <a href="/clients">Clients</a>
                <a href="/contact">Contact</a>
        </div>
        <span style="font-size:30px;cursor:pointer" class="text-white" onclick="openNav()">&#9776;</span><span style="font-size:30px;cursor:pointer" class="px-2 text-white ghar">GharX</span>
</div>

  <div class="pt-3 phone  d-flex text-white"  >
 
  @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown ">
                                <a id="navbarDropdown" class="nav-link text-white dropdown-" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="card_count" id="card_count"> @if(session('cart')){{count(session('cart'))}} @else 0 @endif</span>
                              <i class="fas fa-cart-plus icon-phone pt-1"></i>
                                </a>

                  <div class="dropdown-menu p-3">
                    <div class="row total-header-section ">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </div>
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                        @php $total += ( $details['price'] - $details['price'] * $details['discount'] /100 )* $details['quantity'] @endphp 

                        @endforeach
                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class="text-info">Rs. {{ $total }}</span></p>
                        </div>
                    </div>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="{{ $details['image'] }}" width="50px" height="50px" />
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                  
                                    <span class=" text-info">Price: {{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                </div>
                            </div><hr>  
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{route('cart')}}" class="btn btn-primary btn-block">View all</a>
                        </div>
                        <a href="/recently orders" class="px-3"> Recently Orders</a>
                    </div>
                </div>
           
                            </li>
                           
                        @endguest
  <a href="tel:+9779807010389">
  <span class="text-white "><i class="fas fa-phone pt-1 icon-phone"></i></span>
  </a>
  </div>
</nav>
<div class=" navbar navbar-expand a-link" id="a-link">
<ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="/house_design">House Designs</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/products">Products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/buy_house">Buy House</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Buy land & Shop</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/take_rent">Take Rent</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/upload property">Upload property</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/upload land and shop">Upload Land & Shop</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/consultency ">Construction consultency </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/terms-and-condition">Terms And Conditions</a>
    </li>
  </ul>
</div>
<section>
@if(session('status'))
<div class="alert alert-warning alert-dismissible fade w-50 show" role="alert">
  <strong>{{session('status')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
@yield('content')

</section>

<!-- Footer -->
<footer class="page-footer font-small blue pt-4">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase">Footer Content</h5>
        <p>Here you can use rows and columns to organize your footer content.</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Link 1</a>
          </li>
          <li>
            <a href="#!">Link 2</a>
          </li>
          <li>
            <a href="#!">Link 3</a>
          </li>
          <li>
            <a href="#!">Link 4</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Link 1</a>
          </li>
          <li>
            <a href="#!">Link 2</a>
          </li>
          <li>
            <a href="#!">Link 3</a>
          </li>
          <li>
            <a href="#!">Link 4</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2021 Copyright:
    <a href="https:/smarttrixnep.com/"> smarttrixnep.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('owlcarousel/owl.carousel.min.js')}}"></script>
<script>
   window.onscroll = function() {
               scrollFunction()
           };
           function scrollFunction() {
             if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
               document.getElementById("header").style.background = "linear-gradient(to right ,rgb(161, 21, 119), rgb(201, 74, 93))";
               if(window.width < 500 ){
                  document.getElementById("a-link").style.display = "none";

             }else{
              document.getElementById("a-link").style.display = "inline-block";

             }
             } else {
               document.getElementById("header").style.background = "transparent";
               document.getElementById("a-link").style.display = "none";

             }
            
           }
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

$(document).ready(function(){
	    setTimeout(function() {
	        $(".alert").alert('close');
	    }, 3000);
    	});
</script>
<script src="{{asset('owl/jquery.min.js')}}"></script>
	

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>