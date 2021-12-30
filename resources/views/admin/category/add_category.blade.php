@extends('admin/layout/admin_layout')
@section('content')
<style>
#bean img, #bean1 img{
    height:100px;
    width:100px;
}

</style>
<div class="container-fluid">
<div class="d-flex">
<h3>Add category</h3>

</div><hr>
<div class="row">
    <div class="col-sm-8 mx-auto">
        <form action="<?php if(isset($edit)) echo "/update_category"; else echo "/add_category";?>" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex">
            <div class="form-group w-100 pr-3">
                <label for="name">Category Name : </label> <br>
                <input type="text" class="form-control" name="name" id="" placeholder="name ......" required value="<?php if(isset($edit)) echo $edit->category_name;?>">
            </div>
            
            </div>
            <div>
            <label for="diposite"><b>front Photo</b></label>
            <?php 
                if (isset($edit)) {
                   
                        ?>
                                                <img src="{{ asset($edit->front_img)}}" alt="" height="100px" width="100px">
                                                <input type="hidden" name="id" value="{{$edit->id}}">
                            
                        <?php
                    
                    echo "<span>Replace to</span>";
                }
            ?>
            <input type='file' onchange="readURL(this);" name="fimage" multiple/>
            <div id="bean"></div>
            </div>
            <div>
            <label for="diposite"><b>banner images</b></label>
            <?php 
                if (isset($edit)) {
                   
                        ?>
                                                <img src="{{ asset($edit->banner_image)}}" alt="" height="100px" width="100px">
                                                <input type="hidden" name="id" value="{{$edit->id}}">
                            
                        <?php
                    
                    echo "<span>Replace to</span>";
                }
            ?>
            <input type='file' onchange="readURL1(this);" name="bimage" multiple/>
            <div id="bean1"></div>
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
    function readURL1(input) {
        if (!input.files) {
            return;
        }
        const readers = [];
        const bean = document.getElementById('bean1');
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