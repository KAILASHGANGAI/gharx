@extends('layouts/front_layout')
@section('content')
<section>
<div class="banner">
<img src="{{asset('images/services/house_dessign/banner/designer.png')}}" class="img-fluid" width="100%"  alt="" sizes="" srcset="">
</div>
<div class="container py-5" >
<h3 class="heading ">House Designes</h3>

    <div class="row pt-4">
    @if(isset($data))

@foreach($data as $item)
        <div class="col-sm-3 text-center  ">
            <div id="item" onmouseover="myfunction();" onmouseout="out();" title="click for details" class="category-items">
            <button disabled="disabled" id="see" class="see">{{$item->discount}}% Off</button>
            <a href="/single house_design/<?php echo base64_encode($item->id); ?>" class="text-center nav-item ">

                <img src="{{asset(unserialize($item->images)[0])}}" alt="" height="300px" width="100%" class="img- mb-2" width="" >
                <span class="range mt-4">AVG Range :{{$item->avetage_Rate}}</span><br>
                <h5 class="py-3">{{$item->design_name}}</h5>
            </a>
            </div>
        </div>

        @endforeach
@endif

    </div>

</div>
</section>
<script>
// function myfunction() {
//     document.getElementById("see").style.display = "block";
    
// }
// function out() {
//     document.getElementById("see").style.display = "none";
    
// }
</script>
@stop