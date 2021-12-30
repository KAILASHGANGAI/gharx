@extends('layouts/front_layout')
@section('content')
<style>
   .con-heading{
   padding:13vh 0 3vh 0;
   }
   .s-img{
   width:100%;
   height:auto;s
   }
   .roadser{
   background:linear-gradient( #0000006b , transparent), url('images/services/house_dessign/banner/roadservey.jpg')  no-repeat center center/cover;
   background-attachment: fixed;
   color:white;
   padding:5rem;
   }
   ol{
   font-size:17px;
   letter-spacing: 2px;
   }
   @media only screen and (max-width: 600px) {
   .roadser{
   padding:0;
   }
   
   }
</style>
<section class="container-fluid">
   <div class="row py-5 bg-web ">
      <div class="col-sm-5">
         <img src="{{asset('images/consultancy.png')}}" class="img-fluid" alt="">
      </div>
      <div class="col-sm-7">
         <h1 class="con-heading  heading-half"> Construction consultency</h1>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Officia molestiae maiores earum aspernatur unde sint, culpa, debitis hic dignissimos, quisquam 
            iste mollitia ea perferendis ipsum perspiciatis voluptas. Ut, reiciendis earum!
         </p>
         <h1>Let's Talk !</h1>
         <div class="d-flex text-center pt-4">
            <div class="contact m-1" title="click to call">
               <a href="tel:+9779807010389">
               <span class=" py-4"><i class="fas fa-phone icon-phone"></i></span>
               </a>
            </div>
            <div class="contact mx-3 " title="click to whatsApp">
               <a href="https://api.whatsapp.com/send?phone=+9779807010389">
               <span class=" py-4"><i class="fab fa-whatsapp"></i></span>
               </a>
            </div>
            <div class="contact m-1">
               <a href="tel:+9779807010389" title="click to email">
               <span class=" py-4"><i class="fas fa-envelope-open-text"></i></span>
               </a>
            </div>
         </div>
      </div>
   </div>
   <div class="container-fluid  my-3 pt-5">
      <div class="container row ">
         <div class="col-sm-6 " >
            <h1 class="heading-half">Structural Engineering</h1>
            <p>We have professional, qualified and specialist
               make your dreams success in construction field
            </p>
            <h5>Area of our services</h5>
            <ol>
               <li> Cozy residential and multi storey Commercial building </li>
               <li> Road and Bridge</li>
               <li>irrigation / hydropower and river engineering</li>
               <li> Water supply / sanitation and nwaste water engineering etc</li>
            </ol>
         </div>
         <div class="col-sm-6">
            <img src="{{asset('images/services/house_dessign/banner/a.png')}}" class="img-fluid s-img "  alt="">
         </div>
      </div>
      <div class="d-flex roadser mt-3">
         <div class="container-fluid  ">
            <h1 class="heading-half text-white">Road Survey Service</h1>
            <p>Our except , quilified and trained engineers and surveyors Make you to undertake Road Survey Services. In this
               services ,our profession conduct surveys about the alignment and construction of roads and highways.Also,
               our professionals make use of latest technology and tools to execute these undertaken services efficiently.
            </p>
            <h1>We Focus on:</h1>
            <ol>
               <li> Systematic execution</li>
               <li> Executed within the assured time frame</li>
               <li> Effective space and material management</li>
               <li> Designs that turn your dream into a
                  reality.
               </li>
            </ol>
         </div>
      </div>
      <div class="container row d-flex pt-5">
         <div class="col-sm-6">
            <img src="{{asset('images/services/house_dessign/banner/buildingdesign.png')}}"  class="img-fluid s-img " alt="">
         </div>
         <div class="px-5 col-sm-6">
            <h1 class="heading-half">Building Architecture Design</h1>
            <p>Our except, quilified and trained engineers and survey
               Make you to undertake Building services In this
               services ,our profession Care About : <br>
               Contemporary stylized residential and
               commercial architecture.
            </p>
            <ol>
               <li>Enhanced aesthetic appeal </li>
               <li> Effective space and material management</li>
               <li> Designs that turn your dream house into a reality.</li>
            </ol>
         </div>
      </div>
   </div>
</section>
@stop