@extends('admin/layout/admin_layout')
@section('content')
<style>
#bean img{
    height:100px;
    width:100px;
}

</style>
<div class="container-fluid">
<div class="d-flex">
<h3>Add Products</h3>

</div><hr>
<div class="row">
    <div class="col-sm-8 mx-auto">
        <form action="<?php if(isset($edit)) echo "/update_product"; else echo "/add_products ";?>" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex">
            <div class="form-group w-100 pr-3">
                <label for="name">Product Name : </label> <br>
                <input type="text" class="form-control" name="name" id="" placeholder="name ......" required value="<?php if(isset($edit)) echo $edit->product_name;?>">
            </div>
            <div class="form-group w-100 ">
                <label for="name"> Rate : </label> <br>
                <input type="number" class="form-control" name="rate" id="" placeholder="Rs.xxxxxx " required value="<?php if(isset($edit)) echo $edit->rate;?>">
            </div>

            </div>
            <div class="d-flex">
            <div class="form-group w-100 pr-3">
                <label for="name">Discount: </label> <br>
                <input type="number" class="form-control" name="discount" id="" placeholder="discount ......" required value="<?php if(isset($edit)) echo $edit->discount;?>">
            </div>
            <div class="form-group w-100 ">
                <label for="name"> Category Type : </label> <br>
                <select class="form-control" name="category">
               
                 <option> <?php if(isset($edit)) echo $edit->category; else echo "select category";?></option>
                 @foreach($category as $cat)
                    <option value="{{$cat->category_name}}">{{$cat->category_name}}</option>
                 @endforeach
                </select>
            </div>

            </div>
           <div class="d-flex">
           <div class="form-group w-100 pr-3">
                <label for="name">Gst: </label> <br>
                <input type="number" class="form-control" name="gst" id="" placeholder="Gst % ......" required value="<?php if(isset($edit)) echo $edit->gst;?>">
            </div>
            <div>
            <label for="diposite"><b>Photos</b></label>
            <?php 
                if (isset($edit)) {
                   
                        ?>
                                       <img src="{{ asset($edit->image)}}" alt="" height="100px" width="100px">
                                                <input type="hidden" name="id" value="{{$edit->id}}">
                            
                        <?php
                    
                    echo "<span>Replace to</span>";
                }
            ?>
            <input type='file' onchange="readURL(this);" name="image"/>
            <div id="bean"></div>
            </div>
           </div>
            <div class="form-group">
                <label for="name">Description : </label> <br>
                <textarea name="discription"  id="summernote" class="form-control" cols="30" rows="30" requireds placeholder="describe here"><?php if(isset($edit)) echo $edit->discription;?></textarea>
            </div>
            
            <button type="submit" class="btn btn-info float-right">Save infos</button>
        </form>
    </div>
</div>

</div>
<script>
    function readURL(input) {
        if (!input.files) {
            return;
        }
        const readers = [];
        const bean = document.getElementById('bean');
        for (let i = 0; i < input.files.length; i++) {
            readers.push(new FileReader());
            readers[i].onload = function(e) {
                const img = new Image();
                img.src = e.target.result;
                bean.appendChild(img);
            };
            readers[i].readAsDataURL(input.files[i]);
        }
    }
</script>

@stop