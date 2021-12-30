@extends('admin/layout/admin_layout')
@section('content')

<div class="contaioner-fluid">
<div class="d-flex">
<h3>Category</h3>
<a href="/Admin/add_category" class="btn btn-success mx-3">Add Category</a>
</div>
<hr>
@if(isset($data))
<table class="table">
    <thead>
        <th>S.n</th> <th>Category  name</th> <th>front img</th> <th>Banner Images</th> <th>Action</th>
    </thead>
    <tbody>
    @foreach($data as $key=>$item)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$item->category_name}}</td>
           
            <td> <img src="{{ asset($item->front_img)}}" alt="" height="100px" width="100px">  </td>
            <td> <img src="{{ asset($item->banner_image)}}" alt="" height="100px" width="100px">  </td>
            <td>
                <a href="edit_category/<?php echo base64_encode($item->id); ?>"><i class="fas fa-eye"></i></a>
                <a href="delete_category/<?php echo base64_encode($item->id); ?>"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endif
</div>
@stop