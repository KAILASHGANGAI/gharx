@extends('admin/layout/admin_layout')
@section('content')

<div class="contaioner-fluid">
<div class="d-flex">
<h3>slider</h3>
<form class="px-4" action="<?php if(isset($edit)) echo "/update_slider"; else echo "/slider-img";?>" method="post" enctype="multipart/form-data" >
 @if(isset($edit))   <label for="">Edit slider</label>   @else  <label for="">Add slider</label>  @endif  
 @if(isset($edit))   <img src="{{asset($edit->images)}}" height="300px" width="300px" alt=""> <input type="hidden" name="id" value="{{$edit->id}}"> {{"replace to"}} @endif  

@csrf
    <input type="file" name="image" id="" required>
    <button type="submit">save</button>
</form>
</div>
<hr>
@if(isset($data))
<table class="table">
    <thead>
        <th>S.n</th> <th> Images</th> <th>Action</th>
    </thead>
    <tbody>
    @foreach($data as $key=>$item)
        <tr>
            <td>{{$key+1}}</td>
           
            <td> <img src="{{ asset($item->images)}}" alt="" height="100px" width="100px">  </td>
            <td>
                <a href="edit_slider/<?php echo base64_encode($item->id); ?>"><i class="fas fa-eye"></i></a>
                <a href="delete_slider/<?php echo base64_encode($item->id); ?>"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endif
</div>
@stop