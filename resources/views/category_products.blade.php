@extends('layouts/front_layout')
@section('content')
<section>
<div class="banner">
<img src="{{asset($category->banner_image)}}" class="img-fluid" width="100%"  alt="" sizes="" srcset="">
</div>
<div class="container py-5" >
<h3 class="heading ">{{ucfirst($category->category_name)}}</h3>
    <div class="row pt-4">
        @if(isset($products))
        @foreach($products as $item)
        <div class="card col-xs-3  p-3">
        <h4 class="text-uppercase">{{$item->product_name}}</h4>
            <div class=" item d-flex  justify-content-between align-items-center ">
                <div class="mt-2">
                    <div class="mt-2">
                        <h5 class="text-uppercase mb-0">{{$item->product_name}}</h5>
                        <span class="main-heading mt-0">{{$item->discount}}% off</span>
                        <div class="d-flex flex-row user-ratings">
                            <div class="ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                            <h6 class="text-muted ml-1">4/5</h6>
                        </div>
                    </div>
                </div>
                <div class="image"> <a href="/{{$item->image}}"><img src="{{asset($item->image)}}"height="180"  width="200">  </a>  </div>
            </div>
            <div class="item d-flex justify-content-between align-items-center mt-2 mb-2"> <span>Rate: {{$item->rate}} /-</span>
                <div class="colors"> <span></span> <span></span> <span></span> <span></span> </div>
            </div>
            <p>  {!! $item->discription !!} </p> <button class="btn btn-danger">Add to cart</button>
        </div>
        @endforeach

            @endif
    </div>

</div>
</section>
<script>
function myfunction() {
    document.getElementById("see").style.display = "block";
    
}
function out() {
    document.getElementById("see").style.display = "none";
    
}
</script>
@stop