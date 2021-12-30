@extends('layouts/front_layout')
@section('content')
<section class="container py-4">

<div class="row">
    <div class="col-sm-6">
        <div class="marble bg-white border-r">
        <img src="{{asset('images/services/marble.png')}}" class="img-fluid " alt="">
        <div class="p-3">
            <h3>marble designs name</h3>
            <p class="price">$19.99</p>
    <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
    <button class="btn-danger px-2">Add to Cart</button>
        </div>
        </div>
    </div>
</div>

</section>

@stop