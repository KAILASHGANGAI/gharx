@extends('layouts/front_layout')
@section('content')
<section class="upload_p" >
    <h1>Upload your Land Or Shop</h1>
    
</section>
<div class="container py-5">
<div class="row">
    <div class="col-sm-8 mx-auto ">
        <div class="py-4">
        <h1>Give your Details Below.</h1>
        <P>Lorem, ipsum dolor sit amet consectetur adipisicing elit. At minima nulla saepe cupiditate architecto maiores quia voluptas reiciendis, aut mollitia?</P>
        </div><hr>

        <form action="/post_land_shop" method="post" enctype="multipart/form-data">
            @csrf
            <h5 class="py-3">Location and personal details</h5>
            <div class="d-flex">
            <div class="form-group w-100 pr-3">
                <label for="name">owner Name : </label> <br>
                <input type="text" class="form-control" name="name" id="" placeholder="name ......" required >
            </div>
            <div class="form-group w-100 pr-3">
                <label for="name">Address of property : </label> <br>
                <input type="text" class="form-control" name="address" id="" placeholder="address ......" required >
            </div>
            <div class="form-group w-100 pr-3">
                <label for="name">phone no : </label> <br>
                <input type="text" class="form-control" name="phone" id="" placeholder="phone ......" required >
            </div>
            </div>
            <div>
            <div class="form-check">
                <h4 class="py-3">Property Trype</h4>
                <input class="form-check-input" type="radio" name="type" id="flexRadioDefault1" value="land">
                <label class="form-check-label" for="flexRadioDefault1">
                    Land
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2" value="shoter" >
                <label class="form-check-label" for="flexRadioDefault2">
                    shoter
                </label>
                </div>
                <div class="d-flex">
                <div class="form-group w-100 pr-3">
                <label for="name">Area : </label> <br>
                <input type="text" class="form-control" name="area" id="" placeholder="length X breadth in meter" required >
            </div>
            <div class="form-group w-100 pr-3">
                <label for="name">Price : </label> <br>
                <input type="text" class="form-control" name="price" id="" placeholder="price" required >
            </div>
                </div>
            <h5 class="py-3">What in around your property ?</h5>
           <div class="d-flex">
           <div class="form-group w-100 pr-3">
                <label for="name">East : </label> <br>
                <input type="text" class="form-control" name="east" id="" placeholder="east ......" required >
            </div>

            <div class="form-group w-100 pr-3">
                <label for="name"> West: </label> <br>
                <input type="text" class="form-control" name="west" id="" placeholder="west ......" required >
            </div>
            <div class="form-group w-100 pr-3">
                <label for="name"> North: </label> <br>
                <input type="text" class="form-control" name="north" id="" placeholder=" north......" required >
            </div>
            <div class="form-group w-100 pr-3">
                <label for="name">South : </label> <br>
                <input type="text" class="form-control" name="south" id="" placeholder="south ......" required >
            </div>
           </div>
            <label for="diposite"><b>Photo</b></label>
            <input type='file' onchange="readURL(this);" name="images"/>
            <div id="bean"></div>
            </div>
            
            <div class="form-group">
                <label for="name">Description : </label> <br>
                <textarea name="description"  id="summernote" class="form-control" cols="30" rows="10" requireds placeholder="describe here"></textarea>
            </div>
            
            <button type="submit" class="btn btn-info float-right">Save infos</button>
        </form>
    </div>
</div>
</div>
@stop