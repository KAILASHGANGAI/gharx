@extends('layouts/front_layout')
@section('content')
<style>
.column_m {
  float: left;
  display:flex;
 margin:2px;
 
}

.column_m img {
  width: 100px;
  height: 100px;
  opacity: 0.5; 
  cursor: pointer; 
  border:2px solid #AB2172;
  
}

.column_m img:hover {
  opacity: 1;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.full-img {
  position: relative;
  display: ;
}

/* Expanding image text */
#imgtext {
  position: absolute;
  bottom: 15px;
  left: 15px;
  color: white;
  font-size: 20px;
}

/* Closable button inside the expanded image */
.closebtn {
  position: absolute;
  top: 10px;
  right: 15px;
  color: white;
  font-size: 35px;
  cursor: pointer;
  color:red;
}
.terms li{
  text-decoration: none;
  list-style: none;
}
#expandedImg{
width:100%; 
height: 100%;
}
.word {
  margin: auto;
  color:  #006400;
  border-bottom: 3px solid #8B0000;
  font: 700 normal 3.5555em 'tahoma';
/*  text-shadow: 5px 2px #222324, 2px 4px #222324, 3px 5px #222324;
*/}
@media(min-width: 400px){
  #expandedImg{
width:100%; 
height: 450px;
}
.column_m img {
  width: 90px;
  height: 100px;
  opacity: 0.8; 
  cursor: pointer; 
}
}

.star + .star {
  margin-left: 0.25rem;
}

.star {
  cursor: pointer;
  font-size: 1.5rem;
  color: gold;
}

.ratings-text {
  text-align: center;
}

</style>

<section class="container-fluid py-4">

<div class=" row">
<div class="text-center col-sm-6 p-0">
    <section class="container">
     <div class="full-img">
       <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
       <img id="expandedImg" src="{{asset(unserialize($data->images)[0])}}">
       <div id="imgtext"></div>
     </div>
   <!-- The four column_ms -->
   <div class="container row col-sm-10 mx-auto text-center">
     @foreach(unserialize($data->images) as $img)
     <div class="column_m active ">
       <img src="{{asset($img)}}"   onclick="myFunction(this);">
     </div>
     @endforeach
         
   </div>

 </section>
</div>
<div class="container col-sm-6 py-3">
<span class="range text-center mt-2">Avg Range :{{$data->Price}} /-</span>
<h2 class="display-5 py-3 single-heading">This {{$data->property_type}} is on {{$data->property_for}} At {{ucfirst($data->city)}}</h2>

    <ol>
        <li>City : {{$data->city}}</li>
        <li>Tole : {{$data->tole}}</li>
        <li>Near By : {{$data->nearby}}</li>
        <li>Total BedRoom : {{$data->total_bedroom}} With Kitchens , Bathroom / Toilet and Store Room .</li>
        
    </ol>

<h4><Details></Details></h4>
<div class="details">
 
  {!! $data->discription !!}
</div>
<div class="text-">
    <h6 class="py-3">Want to build this House ?</h6>
    <button type="button" class="btn-danger order-btn px-4 py-2 " style="margin-top:0;" data-toggle="modal" data-target="#exampleModal">
                Apply now
                </button>

    <h6 class="pt-5"><strong>OR</strong></h6>
    <h5 class="py-3">Contact For Conseltency</h5>
    <div class="d-flex text-center">
            <div class="contact m-1" title="click to call">
                <a href="tel:+9779807010389">
                <span class=" py-4"><i class="fas fa-phone icon-phone"></i></span>
                </a>
            </div>
            <div class="contact mx-3 " title="click to whatsApp">
                <a href="tel:+9779807010389">
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
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter your Full Aaddress</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="/apply_property" method="post">
       @csrf
         <label for="#">Full Address</label>
         <input type="text" name="address" id="">
         <input type="hidden" name="id" value="{{base64_encode($data->id)}}">
         <button>Finally Apply</button>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
<div class="container py-4">
<h5>Re-Views / Ratings</h5>

    <h2 class="ratings-text float-left" id="ratingsText">Give Ratings!</h2> <BR></BR>
    <span data-index="0" class="star"><i class="far fa-star"></i></span>
    <span data-index="1" class="star"><i class="far fa-star"></i></span>
    <span data-index="2" class="star"><i class="far fa-star"></i></span>
    <span data-index="3" class="star"><i class="far fa-star"></i></span>
    <span data-index="4" class="star"><i class="far fa-star"></i></span>
  </div>
  
<script>
    function myFunction(imgs) {
  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  imgText.innerHTML = imgs.alt;
  expandImg.parentElement.style.display = "block";
}

//rating

const stars = document.querySelectorAll(".star");
    const ratingsText = document.getElementById("ratingsText");
    const reviewMsgs = ["Worst🤢", "Not Good😒", "Good😉", "Great😃", "Awesome🥰"];

    for (const star of stars) {
      star.addEventListener("mouseenter", function () {
        const totalStars = 5;
        const hovStarIdx = this.dataset.index;

        for (let i = 0; i < totalStars; i++) {
          let currStar = stars[i];

          if (currStar.dataset.index <= hovStarIdx) {
            currStar.firstElementChild.className = "fas fa-star";
          } else {
            currStar.firstElementChild.className = "far fa-star";
          }
        }

        ratingsText.textContent = reviewMsgs[hovStarIdx];
      });
    }
</script>
@stop