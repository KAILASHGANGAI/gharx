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
<h3>Add land / shoter</h3>

</div><hr>
<div class="row">
    <div class="col-sm-8 mx-auto">
        <form action="<?php if(isset($edit)) echo "/update_land_shoter"; else echo "/Admin/add_land_shoter";?>" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex">
            <div class="form-group w-100 pr-3">
                <label for="name">owner Name : </label> <br>
                <input type="text" class="form-control" name="name" id="" placeholder="name ......" required value="<?php if(isset($edit)) echo $edit->name;?>">
            </div>
            <div class="form-group w-100 pr-3">
                <label for="name">Address of property : </label> <br>
                <input type="text" class="form-control" name="address" id="" placeholder="address ......" required value="<?php if(isset($edit)) echo $edit->address_of_land;?>">
            </div>
            <div class="form-group w-100 pr-3">
                <label for="name">phone no : </label> <br>
                <input type="text" class="form-control" name="phone" id="" placeholder="phone ......" required value="<?php if(isset($edit)) echo $edit->phone_number;?>">
            </div>
            </div>
            <div>
            <div class="form-check">
                <h4>Property Trype</h4>
                <input class="form-check-input" type="radio" name="type" id="flexRadioDefault1" value="land" @if(isset($edit))  {{ $edit->type == 'land' ? 'checked' : '' }} @endif>
                <label class="form-check-label" for="flexRadioDefault1">
                    Land
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2" value="shoter"  @if(isset($edit))  {{ $edit->type == 'shoter' ? 'checked' : '' }} @endif>
                <label class="form-check-label" for="flexRadioDefault2">
                    shoter
                </label>
                </div>
                <div class="d-flex">
                <div class="form-group w-100 pr-3">
                <label for="name">Area : </label> <br>
                <input type="text" class="form-control" name="area" id="" placeholder="length X breadth in meter" required value="<?php if(isset($edit)) echo $edit->area;?>">
            </div>
            <div class="form-group w-100 pr-3">
                <label for="name">Price : </label> <br>
                <input type="text" class="form-control" name="price" id="" placeholder="price" required value="<?php if(isset($edit)) echo $edit->price;?>">
            </div>
                </div>
            <h5>What in around your property ?</h5>
           <div class="d-flex">
           <div class="form-group w-100 pr-3">
                <label for="name">East : </label> <br>
                <input type="text" class="form-control" name="east" id="" placeholder="east ......" required value="<?php if(isset($edit)) echo $edit->east;?>">
            </div>

            <div class="form-group w-100 pr-3">
                <label for="name"> West: </label> <br>
                <input type="text" class="form-control" name="west" id="" placeholder="west ......" required value="<?php if(isset($edit)) echo $edit->west;?>">
            </div>
            <div class="form-group w-100 pr-3">
                <label for="name"> North: </label> <br>
                <input type="text" class="form-control" name="north" id="" placeholder=" north......" required value="<?php if(isset($edit)) echo $edit->north;?>">
            </div>
            <div class="form-group w-100 pr-3">
                <label for="name">South : </label> <br>
                <input type="text" class="form-control" name="south" id="" placeholder="south ......" required value="<?php if(isset($edit)) echo $edit->south;?>">
            </div>
           </div>
            <label for="diposite"><b>Photo</b></label>
            <?php 
                if (isset($edit)) {
                   
                        ?>
                                                <img src="{{ asset($edit->images)}}" alt="" height="100px" width="100px">
                                                <input type="hidden" name="id" value="{{$edit->id}}">
                            
                        <?php
                    
                    echo "<span>Replace to</span>";
                }
            ?>
            <input type='file' onchange="readURL(this);" name="images"/>
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