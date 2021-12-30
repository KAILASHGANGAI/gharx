@extends('layouts/front_layout')
@section('content')
<section>
<div class="banner">
<img src="{{asset('images/services/house_dessign/banner/designer.png')}}" class="img-fluid" width="100%"  alt="" sizes="" srcset="">
</div>
<div class="container py-5" >
<h3 class="heading ">Inner Designes</h3>
    <div class="row pt-4">
        <div class="col-sm-3 text-center  ">
            <div id="item" onmouseover="myfunction();" onmouseout="out();" title="click for details" class="category-items">
            <button disabled="disabled" id="see" class="see">20% Off</button>
            <a href="/single house_design" class="text-center nav-item ">
                <img src="{{asset('images/services/interior Design.png')}}" alt="" class="img-fluid mb-2" width="" >
                <span class="range mt-4">AVG Range : रू 200000 - 300000</span><br>
                <h5 class="py-3">Inner Desssign Name</h5>
            </a>
            </div>
        </div>
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