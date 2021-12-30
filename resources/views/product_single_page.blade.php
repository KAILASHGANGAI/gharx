@extends('layouts/front_layout')
@section('content')
<style>
    h1{
        color: #d75229;
        font-weight: bold;
        font-family:"Baloo Tamma 2";
    }
    .product-price{
        color: #5dac48;
        font-family:"Baloo Tamma 2";

    }
</style>
<div class="conntainer ">
<div class="container-fluid py-5  single ">
    <div class="container bg-white p-5 single-product">
        <div class="row">
            <div class="col-sm-4">
                <img src="{{asset($data->image)}}" class="img-" width="100%" height="100%" alt="">
            </div>
            <div class="col-sm-8">
            <div class="card p-4 mt-2">
                 <span class="product-catagory">{{$data->category}}</span>
                <h1>{{ucfirst($data->product_name)}}</h1>
                <div class="product-rating">
                    <ul class="text-warning">
                    <li class="fa fa-fw fa-lg fa-star" aria-hidden="true"></li>
                    <li class="fa fa-fw fa-lg fa-star" aria-hidden="true"></li>
                    <li class="fa fa-fw fa-lg fa-star" aria-hidden="true"></li>
                    <li class="fa fa-fw fa-lg fa-star" aria-hidden="true"></li>
                    <li class="fa fa-fw fa-lg fa-star-half" aria-hidden="true"></li>
                    </ul>
                </div>
                <!-- <span class="product-reviews">10 Reviews</span> -->
            

                <hr>
                <div class="product-price w-100">
                    <larges><del class="text-danger">Rs.{{$data->rate}}</del></larges> <br>
                    <big>Rs.{{$data->rate-($data->discount / 100 * $data->rate)}} </big>
                  <span class="px-4">({{$data->discount }}% Discount)</span>
                </div>

                <p class="p-3">{!! $data->discription !!}</p>
                    <a href="{{ route('add.to.cart', $data->id) }}" class="btn btn-success">Add to Cart <i class="fa fa-shopping-cart"></i> </a>
            </div>
            </div>

        </div>
    </div>
</div>
</div>

@stop