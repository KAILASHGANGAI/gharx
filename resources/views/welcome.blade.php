@extends('layouts/front_layout')
@section('content')
<div class="slider">
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{asset('images/slider/s1.png')}}" height="500" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('images/slider/s2.png')}}" height="500" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('images/slider/s1.png')}}" height="500" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<div class="categortes container">

    <div class="py-4 px-5 py-5">
        <h3  class="heading-half">CATEGORIES : </h3> <a href="#" class="float-right pr-5">See more</a>
    </div>
    <div class="catagory ">
      
        <div class="row">
        <div class="ser col-6 col-sm-3">
            <a href="/house_design"  class="nav-link category-item px-3 " title="Click To visit">
            <h4 class="display-5 py-2 heading">House Design</h4>
            <img src="{{asset('images/services/ser1.png')}}" class="img-fluid ser-img" alt="">
        </a>
         </div>
         <div class="ser col-6 col-sm-3">
        <a href="/inner_designs"  class="nav-link category-item  px-3" title="Click To visit">
            <h4 class="display-5 py-2 heading">Interior Design</h4>
            <img src="{{asset('images/services/interior Design.png')}}" class="img-fluid ser-img" alt="">
        </a>
        </div>
            @if(isset($category))

            @foreach($category as $cat)
                    <div class="ser col-6 col-sm-3">
                        <a href="/category_products/{{$cat->id}}"  class="nav-link category-item px-3 " title="Click To visit">
                            <h4 class="display-5 py-2 heading">{{$cat->category_name}}</h4>
                            <img src="{{asset($cat->front_img)}}" class="img-fluid ser-img"  alt="">
                        </a>
                    </div>
            @endforeach
            @endif      
        
        </div>
    </div> 

</div>
<div class="container py-5"> 
    <div class="up">
    <div class="row">
    <div class="col-sm-5">
        <img src="{{asset('images/services/real-state/upload_for_rent/home.png')}}" class="img-fluid house" alt="">
        <img src="{{asset('images/services/real-state/upload_for_rent/interior design.jpg')}}" class="img-fluid room"  alt="">
    </div>
    <div class="col-sm-7">
            <div class="pt-5">
                <h1 class="heading-rent py-4"> Upload Your Room/Flat and House for Rent or sell !</h1>
                <p class="pl-4 pb-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum cumque cum est autem reiciendis perspiciatis inventore culpa nostrum nobis fuga!</p>
                <a href="/upload%20property" class="order-btn ml-5">upload Now</a><br>
            </div>
        </div>
    </div>
    </div>
</div>
<section class="property-area section-gap py-5 relative " id="property">
         <div class="overlay overlay-bg "></div>
         <div class="container">
            <div class="row d-flex justify-content-center">
               <div class="col-md-8 text-white py-5">
                  <h1>Our Top Rated Properties</h1>
                  <p>
                     Who are in extremely love with eco friendly system.
                  </p>
               </div>
            </div>
            
            <div class="row">
                @if(isset($realstate))
                @foreach($realstate as $real)
                @php $img = unserialize($real->images)[0] @endphp
               <div class="col-lg-4">
                  <div class="single-property">
                     <div class="images" style="height:225px">
                        <img class="img-fluid mx-auto d-block" src="{{asset($img)}}" alt="" height="200px" data-pagespeed-url-hash="2381359863" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                        <span>For {{$real->property_for}}</span>
                     </div>
                     <div class="desc">
                        <div class="top d-flex justify-content-between">
                         
                           <h4><a href="/single_property/{{base64_encode($real->id)}}">At {{ucfirst($real->city)}},<br> {{$real->tole}}, {{$real->property_type}}</a></h4>
                           <h4>R.s :{{$real->Price}}</h4>
                        </div>
                        <div class="middle">
                           <div class="d-flex justify-content-start">
                              <p>Bed: {{$real->total_bedroom}}</p>
                              <p>Bath: {{$real->toilet_bathroom}}</p>
                              <p>Kitchen: {{$real->kitchen}}</p>
                           </div>
                           <div class="d-flex justify-content-start">
                              <p>Toilet: <span class="gr">Yes</span></p>
                              <p>Internet: <span class="rd">No</span></p>
                              <p>Cleaning: <span class="rd">No</span></p>
                           </div>
                        </div>
                        <div class="bottom d-flex justify-content-start">
                           <p><i class="fas fa-heart"></i></span> {{15+$real->id}} Likes</p>
                           <p><i class="far fa-comment-dots"></i></span> 02 Comments</p>
                        </div>
                     </div>
                  </div>
               </div>
              @endforeach
              @endif
            </div>
         </div>
      </section>
<!-- ss -->
<!-- <div class="repair-service">
    <a href="tel:+9779807010389">
    <img src="{{asset('images/services/all labour.png')}}" class="img-fluid w-100"  alt="">
    </a>    
</div> -->
<div class="realstate-service container py-5">
    <div class="py-4 px-5">
            <h3  class="heading-half">REAL E-STATE SERVICES : </h3>
    </div>
    <div class="row">
        <div class="col-sm-8 mx-auto">
        <div class="row">
    
    <div class="col-sm-4 col-6 mt-4">
    <a href="/buy_house" class="nav-link category-item  px-3" title="visit">
        <img src="{{asset('images/services/real-state/home.png')}}" class="img-fluid"  width="200" alt="">
     <h4 class="text-center py-3">Buy a House</h4>
     </a>
    </div>
    <div class="col-sm-4 col-6 mt-4">
    <a href="/buy_land" class="nav-link category-item  px-3" title="visit">
        <img src="{{asset('images/services/real-state/land.png')}}" class="img-fluid"  width="200" alt="">
        <h4 class="text-center py-3">Buy a Land</h4>
     </a>
    </div>
    <div class="col-sm-4 col-6 mt-4">
    <a href="take_rent" class="nav-link category-item  px-3" title="visit">
        <img src="{{asset('images/services/real-state/rent.png')}}" class="img-fluid"  width="200" alt="">
        <h4 class="text-center py-3">Take Rent</h4>
     </a>
    </div>
    

</div>
        </div>
    </div>
</div>
<div class="shift home">
<a href="/transport_for_shifting"><img src="{{asset('images/services/shifting home.png')}}" class="img-fluid w-100"  alt="">
</a>
</div>

<div class="popular-services container-fluid py-5">
    <div class="py-4 px-2 py-5">
            <h3  class="heading-half">POPULAR PRODUCTS  : </h3><a href="/products" class="float-right pr-5">See more</a>
    </div>
  
    <div class="owl-carousel  owl-theme py-2">
 @if(isset($popular))

@foreach($popular as $product)
<div class="product-card m-2">
      <div class="badge">Hot</div>
      <div class="product-tumb">
         <img src="{{asset($product->image)}}" alt="">
      </div>
      <div class="product-details">
         <span class="product-catagory">{{$product->category}}</span>
         <h4><a href="/product_single_page/{{base64_encode($product->id)}} ">{{$product->product_name}}</a></h4>
         <div class="product-bottom-details">
            <div class="product-price w-75"><small>Rs.{{$product->rate}}</small>Rs.{{$product->rate-($product->discount / 100 * $product->rate)}} ({{$product->discount }}%)</div>
            <div class="product-links w-25">
               <a href="{{ route('add.to.cart', $product->id) }}"><i class="fa fa-shopping-cart"></i></a>
            </div>
         </div>
      </div>
   </div>
   
@endforeach
@endif
       
    </div>
</div>
<div class="container-fluid py-5 repair-service">
      <div class="row">
          <div class="col-sm-6">
          <a href="tel:+9779807010389">
            <img src="{{asset('images/services/all labour.png')}}" class="img-fluid"  alt="">
            </a> 
          </div>
          <div class="col-sm-6">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In suscipit repudiandae sed commodi rerum ex fuga tempora recusandae corporis odit dolorum minus assumenda deleniti voluptatum doloribus reprehenderit autem, dicta nesciunt.</p>
                <a href="tel:9807010389" class="order-btn text-white px-3 py-2">Call For Employee</a>
            </div>
      </div>
</div>

<script src="{{asset('owl/jquery.min.js')}}"></script>
<script src="{{asset('owl/owl.carousel.min.js')}}"></script>
<script src="{{asset('owl/owl.autoplay.js')}}"></script>
<script type="text/javascript">
        $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:2,
                nav:false
            },
            1000:{
                items:5,
                nav:true,
                loop:false
            }
        }
    });
        </script>
@stop