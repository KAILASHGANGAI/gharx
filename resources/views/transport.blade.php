@extends('layouts/front_layout')
@section('content')
<style>
    .bg{
        background:#F1F1F1;
    }
</style>
<section class="realstate-services">
<div class="row">
<div class="col-5 col-sm-5 p-0">
    <img src="{{asset('images/services/transs_banner.jpg')}}" class="img-fluid" alt="">
</div>
<div class="col-7 col-sm-6 sliders ">
    <div class="realstate-h">
        <h1 class="pb-2"> Trying to shift your House</h1>
        <p class="p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, necessitatibus. Repudiandae voluptates pariatur modi commodi ducimus ad vitae magni neque?</p>
        <h4>Book your Vehicles here</h4>
    </div>
</div>
</div>
</section>

<section class="container-fluid bg">
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <h3 class="py-3">Price : According to the Distance</h3>
            <div class="shadow p-3">
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="#">From :</label>
                        <input class="form-control" type="text" name="" id="" required>
                    </div>
                    <div class="form-group">
                        <label for="#">To :</label>
                        <input class="form-control" type="text" name="" id="" required>
                    </div>
                    <div class="form-group">
                        <label for="#">Pick your Date</label>
                        <input class="form-control" type="datetime-local" name="" id="" requireds>
                    </div>
                    <button type="submit" class="px-4 py-1">Submit</button>
                </form>
            </div>
           
            <h4 class="heading-half pt-5">Contact</h4>
            <div class="d-flex text-center py-4">
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

</section>

@stop