<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script defer src="https://kit.fontawesome.com/bab741dcae.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/summernote.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/summernote-lite.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin_style.css')}}">
    <title>GharaX Admin</title>
</head>
<body>
        <nav class="navbar justify-content-end navbar-expand-sm px-5 ">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">NOtification</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="/Admin_register">Register</a>
                </li>
                {{session('admin_user')}}
                @if (session()->has('admin_user'))
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-users-cog"></i> {{session('admin_user')}}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/Admin_profile">Profile</a>
                        <a class="dropdown-item" href="/Admin_logout">logOut</a>
                    </div>
                    </div>
               
                    @else 
                    <a href="#">no user</a>
                @endif

              </ul>
        </nav>
      <div class="sidenav" id="sidenav">
            <img class="logo" src="{{asset('images/GHARX TEXT.png')}}" alt="">
            <a class="sidenav-link active" href="/Admin"> DASHBOARD</a>
            <a  class="sidenav-link" href="/Admin/product_order">PRODUCTS ORDERS</a>
            <a  class="sidenav-link" href="/Admin/house_design_order">HOUSE DESIGN ORDERS</a>
            <a  class="sidenav-link" href="/Admin/land_shoter_orders">LAND/SHOTER ORDERS</a>
            <a  class="sidenav-link" href="/Admin/realstate_orders">REALSTATE ORDERS</a>
            <a class="sidenav-link" href="/Admin/slider"> SLIDERS</a>
            <a  class="sidenav-link" href="/Admin/category">CATEGORIES</a>
            
            <a class="sidenav-link" href="/Admin/products"> PRODUCTS</a>
            <a  class="sidenav-link" href="/Admin/house designs">HOUSE DESIGNS</a>
            <a  class="sidenav-link" href="/Admin/realstate">REAL STATE</a>
            <a  class="sidenav-link" href="/Admin/land-shoter">Land / shoter sell</a>
            <a  class="sidenav-link" href="/transport">TRANSPORT/ SHIFTING </a>
            
     </div>
    
    <div class="content-body">
    @if(session('status'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{session('status')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
        @yield('content')
    </div>
  

<script src="{{asset('/js/jquery.min.js')}}"></script>
<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/printThis.js')}}"></script>
<script src="{{asset('/js/summernote.min.js')}}"></script>
<script src="{{asset('/js/summernote-lite.min.js')}}"></script>
<script>
    $(document).ready(function() {
    $('.sidenav-link').click(function() {
        $('.sidenav-link.active').removeClass("active");
        $(this).addClass("active");
    });
});
    $(document).ready(function() {
        $('#summernote').summernote();
    });

    $(document).ready(function(){
	    setTimeout(function() {
	        $(".alert").alert('close');
	    }, 3000);
    	});

  </script>
</body>
</html>