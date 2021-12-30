@extends('layouts/front_layout')
@section('content')
<section class="container py-4">
    <div class="row">
        <div class="col-sm-3">
        <div class="card bg-white shadow">
            <a href="{{asset('images/services/grill.png')}}"  rel="noopener noreferrer">
         <img src="{{asset('images/services/grill.png')}}" alt=""  class="img-fluid">

        </a>
        <div class="container">
        <h1 class="display-5">Old Grill</h1>
        <p class="price">$19.99</p>
        <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
        <button class="btn-danger px-2">Add to Cart</button>
        </div>
        </div>
        </div>
    </div>

</section>

@stop