@extends('layouts/front_layout')
@section('content')
<style>
.imp{
    color:red;
}
</style>
<section class="upload_p" >
    <h1>Upload your Property</h1>
    
</section>
<section class="container">
<p>Here You can upload your Room, Flat , House for Rent and Only House & Flat for sell.</p>
   <form action="<?php if(isset($edit)) echo "/update_property"; else echo "/upload_property";?>" method="post" enctype="multipart/form-data">
  @if((session('status')))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{ session('status') }}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  @endif
  @csrf<div class="container p-5">
         <div class="py-4">
            <h3 id="one" class="scroll-section heading heading--info grey" data-screen="3">Location</h3>
         </div>
         <div class="d-flex">
         <div class="input-group input-group-sm mx-3">
                  <div class="input-group-prepend">
                     <span class="input-group-text p-2">Owner name <span class="imp">*</span> </span>
                  </div>
                  <input type="text" name="owner_name" class="form-control p-2" placeholder="owner name" value="<?php if(isset($edit)) echo $edit->owner_name;?>" required>
               </div> 
               <div class="input-group input-group-sm mx-3">
                  <div class="input-group-prepend">
                     <span class="input-group-text p-2">Contact no. <span class="imp">*</span> </span>
                  </div>
                  <input type="text" name="contact" class="form-control p-2" placeholder="mobile number" value="<?php if(isset($edit)) echo $edit->contact;?>" required>
               </div> 
         </div>
         <div class="row py-3">

            <div class="col-md-8 mx-auto  d-flex">
            
            <div class="input-group input-group-sm">
                  <div class="input-group-prepend">
                     <span class="input-group-text p-2">City <span class="imp">*</span> </span>
                  </div>
                  <input type="text" name="city" class="form-control p-2" placeholder="city or village name" value="<?php if(isset($edit)) echo $edit->city;?>" required>
               </div> 
               <div class="input-group  input-group-sm px-2">
                  <div class="input-group-prepend">
                     <span class="input-group-text p-2">Tole <span class="imp">*</span> </span>
                  </div>
                  <input type="text" name="tole" class="form-control p-2" placeholder="tole name" value="<?php if(isset($edit)) echo $edit->tole;?>" required>
               </div>
               <div class="input-group  input-group-sm">
                  <div class="input-group-prepend">
                     <span class="input-group-text p-2">Near By </span>
                  </div>
                  <input type="text" name="nearby" class="form-control p-2" placeholder="tole name" value="<?php if(isset($edit)) echo $edit->tole;?>">
               </div>
            </div>
         </div>
         <div>
            <h3 id="one" class="scroll-section heading heading--info grey" data-screen="3">About the property</h3>
         </div>
         <div class="row">
            <div class="col-md-10 mx-auto">
               <div class="media block-6 services d-block">
                  <h5 class="subheading">Property type <span class="imp">*</span></h5>
               </div>
               <div class="d-flex">
        
                  <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineRadio1" name="property_type" value="room" @if(isset($edit)) {{ $edit->property_type == 'room' ? 'checked' : '' }} @endif>
                        <label class="form-check-label" for="inlineRadio1" >Room</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineRadio2" name="property_type" value="flat" @if(isset($edit)){{ $edit->property_type == 'flat' ? 'checked' : '' }} @endif>
                        <label class="form-check-label" for="inlineRadio2">Flat</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineRadio3" value="house" name="property_type" @if(isset($edit)){{ $edit->property_type == 'house' ? 'checked' : '' }} @endif>
                        <label class="form-check-label" for="inlineRadio3">House</label>
                        </div>
               </div>
               <div class="media block-6 services d-block pt-4">
                  <h5 class="subheading">Property for : <span class="imp">*</span></h5>
               </div>
               <div class="d-flex">
        
                  <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineRadio1" name="property_for" value="rent" @if(isset($edit)) {{ $edit->property_for == 'rent' ? 'checked' : '' }} @endif>
                        <label class="form-check-label" for="inlineRadio1" >Rent</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineRadio2" name="property_for" value="sell" @if(isset($edit))  {{ $edit->property_for == 'sell' ? 'checked' : '' }} @endif>
                        <label class="form-check-label" for="inlineRadio2">sell</label>
                        </div>
                      
               </div>
              
               <hr>
               <div>
                  <div class="media block-6 services d-block mt-3">
                     <h5 class="subheading">Total number of bedrooms in a <span class="propertyType">flat / House</span></h5>
                     <div class="d-flex bedroom-wrapper">
                        <input type="radio" class="form-control" id="bed_radio1" name="total_bedroom" value="1" @if(isset($edit)) {{ $edit->total_bedroom == '1' ? 'checked' : '' }} @endif>
                        <label for="bed_radio1">1</label>
                        <input type="radio" class="form-control" id="bed_radio2" name="total_bedroom" value="2" @if(isset($edit)) {{ $edit->total_bedroom == '2' ? 'checked' : '' }} @endif>
                        <label for="bed_radio2">2</label>
                        <input type="radio" class="form-control" id="bed_radio3" name="total_bedroom" value="3" @if(isset($edit)) {{ $edit->total_bedroom == '3' ? 'checked' : '' }} @endif>
                        <label for="bed_radio3">3</label>
                        <input type="radio" class="form-control" id="bed_radio4" name="total_bedroom" value="4" @if(isset($edit)) {{ $edit->total_bedroom == '4' ? 'checked' : '' }} @endif>
                        <label for="bed_radio4">4</label>
                        <input type="radio" class="form-control" id="bed_radio5" name="total_bedroom" value="5" @if(isset($edit)) {{ $edit->total_bedroom == '5' ? 'checked' : '' }} @endif>
                        <label for="bed_radio5">5</label>
                        <input type="radio" class="form-control" id="bed_radio6" name="total_bedroom" value="6" @if(isset($edit)) {{ $edit->total_bedroom == '6' ? 'checked' : '' }} @endif>
                        <label for="bed_radio6">6</label>
                        <input type="radio" class="form-control" id="bed_radio7" name="total_bedroom" value="7" @if(isset($edit)) {{ $edit->total_bedroom == '7' ? 'checked' : '' }} @endif>
                        <label for="bed_radio7">7</label>
                        <input type="radio" class="form-control" id="bed_radio8" name="total_bedroom" value="8" @if(isset($edit)) {{ $edit->total_bedroom == '8' ? 'checked' : '' }} @endif>
                        <label for="bed_radio8">8</label>
                        <input type="radio" class="form-control" id="bed_radio9" name="total_bedroom" value="9" @if(isset($edit)) {{ $edit->total_bedroom == '9' ? 'checked' : '' }} @endif>
                        <label for="bed_radio9" >9+</label>
                     </div>
                  </div>
               </div>
               <div>
               </div>
               <div class="media block-6 services d-block pt-4">
                  <h5 class="subheading">Toilet and Bathroom available ? (yes / NO): <span class="imp">*</span></h5>
               </div>
               <div class="d-flex">
        
                  <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineRadio1" name="toilet_bathroom" value="1" @if(isset($edit))  {{ $edit->toilet_bathroom == '1' ? 'checked' : '' }} @endif>
                        <label class="form-check-label" for="inlineRadio1" >Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineRadio2" name="toilet_bathroom" value="0" @if(isset($edit))  {{ $edit->toilet_bathroom == '0' ? 'checked' : '' }} @endif>
                        <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                      
               </div>
               <div class="media block-6 services d-block pt-4">
                  <h5 class="subheading">Kitchen Room available ? (yes / NO): <span class="imp">*</span></h5>
               </div>
               <div class="d-flex">
        
                  <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineRadio1" name="kitchen" value="1" @if(isset($edit))  {{ $edit->kitchen == '1' ? 'checked' : '' }} @endif>
                        <label class="form-check-label" for="inlineRadio1" >Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineRadio2" name="kitchen" value="0" @if(isset($edit))  {{ $edit->kitchen == '0' ? 'checked' : '' }} @endif>
                        <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                      
               </div>
            </div>
            
         </div>
         
         <div class="row">
            <div class="col-md-10 mx-auto">
               <div class="media block-6 services d-block mt-3">
                  <h5 class="subheading">Rate /Price <span class="imp">*</span></h5>
               </div>
               <div class="input-group mb-3 input-group-sm">
                  <div class="input-group-prepend">
                     <span class="input-group-text p-4">Rs. </span>
                  </div>
                  <input type="number" name="price" class="form-control p-4" placeholder="rate for sell or Rent" value="<?php if(isset($edit)) echo $edit->Price;?>" required>
               </div>
                                                                                
            </div>
         </div>

         <div>
            <h3 id="one" class="scroll-section  heading--info grey" data-screen="3">Additional Features</h3>
         </div>
         <div>
            <div class="col-md-10 mx-auto">
               <div class="media block-6 services d-block mt-3">                   
                  <span class="subheading">Discription <span class="imp">*</span></span>
               </div>
               <div class="form-group">                          
                  <textarea class="form-control" name="discription" rows="10" maxlength="100" id="summernote" placeholder="Please describe about your room..."><?php if(isset($edit)) echo $edit->discription;?></textarea>
               </div>
                                                                      
               <div class="media block-6 services d-block mt-3">
                  <span class="subheading">Pictures</span>
               </div>
               <div class="file-input-wrapper">
               <?php 
                if (isset($edit)) {
                    $imgs = unserialize($edit->images);
                    foreach($imgs as $img){
                        ?>
                                                <img src="{{ asset($img)}}" alt="" height="100px" width="100px">
                                                <input type="hidden" name="id" value="{{$edit->id}}">
                            
                        <?php
                    }
                    echo "<span>Replace to</span>";
                }
            ?>
               <input type='file' onchange="readURL(this);" name="images[]" multiple/>
                  <div id="bean"></div>
                  
               </div>
                                                                      
            </div>
         </div>
         <div class="col text-center d-flex">
            <input type="submit" name="submit" class="btn btn-default btn-success p-3 m-5" value="submit">
         </div>
      </div>
   </form>
</section>s
<script>
 
</script>
@stop