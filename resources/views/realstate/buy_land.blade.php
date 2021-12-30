@extends('layouts/front_layout')
@section('content')

<section class="realstate-services">
<div class="row">
<div class="col-5 col-sm-5 p-0">
    <img src="{{asset('/images/services/real-state/4372037.jpg')}}" alt="" class="img-fluid">
</div>
<div class="col-7 col-sm-6 sliders ">
    <div class="realstate-h">
        <h1 class="pb-2"> Buy land And Shop in Rent </h1>
        <p class="p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, necessitatibus. Repudiandae voluptates pariatur modi commodi ducimus ad vitae magni neque?</p>
        <a href="#" class="btn-danger px-3 text-center py-2">Buy Land here !!</a>

    </div>
</div>
</div>
</section>

<section class="bg">
<div class="container">
    <h1 class="py-2 heading-half">Recommented Posts </h1>
</div>
<div class="container-fluid py-4">
@if (session('status'))
    <div class="alert pt-5 mt-5 alert-success" style="z-index:999;">
        {{ session('status') }}
    </div>
@endif
<div class="row pt-4">
    @if(isset($data))
        @foreach($data as $item)
        <div class="col-sm-3  ">
            <div id="item" onmouseover="myfunction();" onmouseout="out();" title="click for details" class="category-items">
            <button disabled="disabled" id="see" class="see">Special Offers</button>
            @if($item->type == 'land')
            <img src="{{asset('images/sell_tag.png')}}" class="sell" alt="sell tag" height="50px" srcset="">
           @else
           <img src="{{asset('images/rent.png')}}" class="sell" alt="sell tag" height="50px" srcset="">

           @endif
            <a href="/single_land_shoter/{{base64_encode($item->id)}}" class=" ">

                <div class="">
                    <img src="{{asset($item->images)}}" alt="" class="mb-2 w-100" height="300px" >
                    <a href="/apply_land/{{base64_encode($item->id)}}" class="btn-danger px-4 py-2 float-right" style="margin-top:0;">Apply Now</a>
                   
                    <span class="px-2 mt-4"> Total Cost ( Nrs.) : <br> <strong class="px-3">{{$item->price}} /-</strong></span><br>
                    <span class="px-2 mt-4"> Type :  <strong class="px-3">{{$item->type}} </strong></span><br>
                </div>
                </a>
                <br>
                <h5 class="px-2">This {{$item->property_type}} is on {{$item->property_for}} At {{ucfirst($item->city)}}</h5>
                
            <div class="text-left px-4 ">
           <strong>

            <details class="pb-2">
                   <ul>
                       <li> <Address>Address :  {{$item->city}}</Address></li>
                       <li>Tole : {{$item->tole}}</li>
                       <li>Near By : {{$item->nearby}} </li>
                       <li>Total Rooms : {{$item->total_bedroom}} + Toilet + Bathroom + StoreRoom</li>
                   </ul>
                </details>
                </strong>
            </div>
            </div>
        </div>
        @endforeach
    @endif
    </div>
</div>
</section>

@stop