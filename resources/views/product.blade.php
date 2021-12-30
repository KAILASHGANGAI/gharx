@extends('layouts/front_layout')
@section('content')
<style>
    body{
        background:#F1F1F1;
    }
    hr{
        margin: 5px 0 5px 0;
    }
</style>
<section class="realstate-services bg-web text-white">
<div class="row">
<div class=" col-sm-6 p-0">
    <img src="{{asset('/images/products.png')}}" alt="" class="img-fluid">
</div>
<div class="col-sm-6 sliders ">
    <div class="realstate-h">
        <h1 class="pb-2"> Online Shoaping of house maintain Products.</h1>
        <p class="p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, necessitatibus. Repudiandae voluptates pariatur modi commodi ducimus ad vitae magni neque?</p>

    </div>
</div>
</div>
</section>
<section class="container-fluid">
<div class="p-5">
    <h1 class="heading-half">Recommented Products</h1>
</div>
<div class="row">
<div class="col-sm-3  ">
    <div class="shadow p-3" style="height: 405px;  overflow: scroll;">
       <h4>Categories of Products</h4> <hr>
       <a href="/products" class="p-2" > All products</a> <hr>
            @foreach($category as $type)
             <a href="/products/category=/{{$type->category}}" class="p-2" > {{ucfirst($type->category) }}</a> <hr>
            @endforeach
      
    </div>
</div>

@if(isset($products))

@foreach($products as $product)
<div class="col-sm-3  col-xs-3 my-3">
   <div class="product-card ">
      <div class="badge">Hot sell</div>
      <div class="product-tumb">
         <img src="{{asset($product->image)}}" alt="">
      </div>
      <div class="product-details">
         <span class="product-catagory">{{$product->category}}</span>
         <h4><a href="/product_single_page/{{base64_encode($product->id)}} ">{{$product->product_name}}</a></h4>
        
         <div class="product-bottom-details">
            <div class="product-price"><small>Rs.{{$product->rate}}</small>Rs.{{$product->rate-($product->discount / 100 * $product->rate)}} ({{$product->discount }}%)</div>
            <div class="product-links">
               <a href="{{ route('add.to.cart', $product->id) }}"><i class="fa fa-shopping-cart"></i></a>
            </div>
         </div>
      </div>
   </div>
</div>
        
@endforeach
@endif
</div>
</section>

@stop