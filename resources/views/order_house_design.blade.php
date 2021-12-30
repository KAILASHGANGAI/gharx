@extends('layouts/front_layout')
@section('content')
<section>
   <div class="container text-center">
      <h1>Order House Design</h1>
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere, a?</p>
   </div>
  <div class="container">
  <div class="  row ">
      
      <div class="col-sm-6 py-5 mx-auto ">
         <div class="shadow p-5">
            <h3 class="py-3 text-center">{{$data->design_name}}</h3>
            @if(session('status'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{session('status')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
            <form action="/complete_house_design_order" method="post" >
            @csrf
               <div class="form-group">
                  <label for="#">Name</label>
                  <input type="text" class="form-control" name="name" id="" value="" required>
               </div>
               <div class="form-group">
                  <label for="#">Address</label>
                  <input type="text" class="form-control" name="address" id="" required>
               </div>
               <div class="form-group">
                  <label for="#">Contact</label>
                  <input type="text" class="form-control" name="contact" id="" required>
               </div>
               <div class="form-group">
                  <label for="#">message</label>
                  <textarea type="text" class="form-control" name="message" id="" > </textarea>
               </div>
               <input type="hidden" name="id" value="{{$data->id}}">
               <button class="btn btn-success float-right">Submit</button>
            </form>
         </div>
      </div>
      <div class="col-sm-6 p-5 mx-auto">
  {!! $data->discription !!}

      </div>
   </div>
  </div>
</section>
@stop