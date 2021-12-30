@extends('layouts/front_layout')
@section('content')
<style>
.about-h{
    padding: 20vh 0  20vh 0 ;
    

}
.social-align div div li a {
    position: relative;
    display: block;
    width: 80px;
    height: 80px;
    background: #fff;
    text-align: center;
    -webkit-transform: perspective(1000px) rotate(-30deg) skew(25deg) translate(0);
    perspective(1000px) rotate(334deg) skew(30deg) translate(0);
    box-shadow: -20px 20px 10px rgb(0 0 0 / 50%);
}
.social-align a{
    margin:20px;
    text-decoration: none;

}
li{
    list-style-type: none;
}

.social-align div div li a:before {
    content: "";
    position: absolute;
    top: 10px;
    left: -20px;
    height: 100%;
    width: 20px;
    background: #b1b1b1;
    transition: .5s;
    -webkit-transform: rotate(0deg) skewy(-45deg);
    transform: rotate(0deg) skewy(-45deg);
}
.social-align div div li a:after {
    content: "";
    position: absolute;
    bottom: -20px;
    left: -10px;
    height: 20px;
    width: 100%;
    background: #c7c7c7;
    transition: .5s;
    -webkit-transform: rotate(0deg) skewx(-45deg);
    transform: rotate(0deg) skewx(-45deg);
}
.fab{
    font-size: 80px;
}
.fa-facebook-f{
    color:#3B5999;
}
.fa-linkedin-in{
    color:#0077B5;
}
.fa-whatsapp{
    color:#44c054;
}
.social-align div div li a:hover{
    -webkit-transform:perspective(1000px) rotate(-30deg) skew(25deg) translate(20px,-20px);
    transform:perspective(1000px) rotate(355deg) skew(25deg) translate(20px,-20px);
    box-shadow:-50px 50px 50px rgba(0,0,0,.5)
    }
    .social-align div div:hover li .fab{
        color:#fff}.social-align div div:hover:first-child li a{background:#3b5999}
        .social-align div div:hover:first-child li a .fa-facebook-f path{fill:#fff}
        .social-align div div:hover:first-child li a:before{background:#2e4a86}
        .social-align div div:hover:first-child li a:after{background:#4a69ad}
        .social-align div div:hover:nth-child(2) li a{background:#0077b5}
        .social-align div div:hover:nth-child(2) li a .fa-linkedin-in path{fill:#fff}
        .social-align div div:hover:nth-child(2) li a:before{background:#036aa0}
        .social-align div div:hover:nth-child(2) li a:after{background:#0d82bf}
        .social-align div div:hover:nth-child(3) li a{background:#44c054}
        .social-align div div:hover:nth-child(3) li a .fa-linkedin-in path{fill:#fff}
        .social-align div div:hover:nth-child(3) li a:before{background:#44c054}
        .social-align div div:hover:nth-child(3) li a:after{background:#44c054}
</style>
<section class="bg-web ">

    <h1 class="about-h text-center text-white">About Us</h1>
  

</section>
<div class="container py-5">
    <div class="row">
        <div class="col-sm-9 mx-auto">
        <div class="container mt-3">
  
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">OverView</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">How We Work ?</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Why Choose Us ?</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu3">What You Get ?</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <h3 class="heading">OverView</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <h3 class="heading">How We Work ?</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
      <h3 class="heading">Why Choose Us ?</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="container tab-pane fade"><br>
      <h3 class="heading">What You Get ?</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>

  </div>
</div>

        </div>
    </div>
</div>
<div class="container py-4  my-5">
<h4 class="text-center">Follow Us In Social Media </h4>
<ul class="social-align d-flex w-100 justify-content-center">
   <div class="row mr-3">
      <div class="col-6 col-lg-4 mt-2 mt-lg-0  d-flex w-100 justify-content-center">
         <li>
            <a href="#" target="_blank" rel="noreferrer noopener" class="d-flex justify-content-center">
            <i class="fab fa-facebook-f"></i>
            </a>
         </li>
      </div>
      <div class="col-6 col-lg-4 mt-lg-0  d-flex w-100 justify-content-center">
         <li>
            <a href="#" target="_blank" rel="noreferrer noopener" class="d-flex justify-content-center">
            <i class="fab fa-linkedin-in"></i>
            </a>
         </li>
      </div>
      <div class="col-6 col-lg-4  mt-5  mt-lg-0 d-flex w-100 justify-content-center">
         <li>
            <a href="#" target="_blank" rel="noreferrer noopener" class="d-flex justify-content-center">
            <i class="fab fa-whatsapp"></i>
            </a>
         </li>
      </div>
    
   </div>
</ul>
</div>

@stop