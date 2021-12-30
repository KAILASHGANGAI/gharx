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
<h3>Add House Designs</h3>

</div><hr>
<div class="row">
    <div class="col-sm-8 mx-auto">
        <form action="<?php if(isset($edit)) echo "/update_design"; else echo "/add_house_designs ";?>" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex">
            <div class="form-group w-100 pr-3">
                <label for="name">House Design Name : </label> <br>
                <input type="text" class="form-control" name="name" id="" placeholder="name ......" required value="<?php if(isset($edit)) echo $edit->design_name;?>">
            </div>
            <div class="form-group w-100 ">
                <label for="name">Average Rate : </label> <br>
                <input type="text" class="form-control" name="rate" id="" placeholder="Rs.xxxxxx to Rs. yyyyyyy" required value="<?php if(isset($edit)) echo $edit->avetage_Rate;?>">
            </div>
            </div>
            <div>
            <label for="diposite"><b>Photos</b></label>
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
            <div class="form-group">
                <label for="name">Description : </label> <br>
                <textarea name="description"  id="summernote" class="form-control" cols="30" rows="10" requireds placeholder="describe here"><?php if(isset($edit)) echo $edit->discription;?></textarea>
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