@extends('admin/layout/admin_layout')
@section('content')

<div class="contaioner-fluid">
<div class="d-flex">
<h3>land / shoter</h3>
<a href="/Admin/add_land_shoter" class="btn btn-success mx-3">Add land-shoter</a>
</div>
<hr>
@if(isset($data))

<table class="table">
    <thead>
        <th>S.n</th><th>Uploaded_by_user_id</th> <th>  name</th> <th>address</th><th>phone</th><th>price</th> <th>Type</th><th>Area</th> <th>East</th> <th>West</th> <th>North</th> <th>South</th><th> Images</th> <th>Action</th>
    </thead>
    <tbody>
    @foreach($data as $key=>$item)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$item->uploadedby}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->address_of_land}}</td>
            <td>{{$item->phone_number}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->type}}</td>
            <td>{{$item->area}}</td>
            <td>{{$item->east}}</td>
            <td>{{$item->west}}</td>
            <td>{{$item->north}}</td>
            <td>{{$item->south}}</td>
            
           
            <td> <img src="{{ asset($item->images)}}" alt="" height="100px" width="100px">  </td>
            <td>
                <a href="edit_land_shoter/<?php echo base64_encode($item->id); ?>"><i class="fas fa-eye"></i></a>
                <a href="delete_land_shoter/<?php echo base64_encode($item->id); ?>"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endif
</div>
@stop