@extends('admin/layout/admin_layout')
@section('content')

<div class="contaioner-fluid">
<div class="d-flex">
<h3>Products</h3>
<a href="/Admin/add_products" class="btn btn-success mx-3">Add products</a>
</div>
<hr>
@if(isset($data))
<table class="table">
    <thead>
        <th>S.n</th> <th>Product name</th> <th>Rate (Rs.)</th><th>GST %</th><th>Discount %</th><th>Category</th> <th>Images</th> <th>Action</th>
    </thead>
    <tbody>
    @foreach($data as $key=>$item)
        <tr>
            <td>{{count($data)-$key}}</td>
            <td>{{$item->product_name}}</td>
            <td>{{$item->rate}} </td>
            <td>{{$item->gst}} </td>
            <td>{{$item->discount}}</td>
            <td>{{$item->category}}</td>
            <td> <img src="{{ asset($item->image)}}" alt="" height="100px" width="100px"></td>
           
            <td>
                @if($item->popular == '1')
            <a href="popular_products/<?php echo base64_encode($item->id); ?>"><i class="far fa-bookmark text-danger"></i></a>
            @else
            <a href="popular_products/<?php echo base64_encode($item->id); ?>"><i class="far fa-bookmark"></i></a>

            @endif
                <a href="edit_products/<?php echo base64_encode($item->id); ?>"><i class="fas fa-eye"></i></a>
                <a href="delete_products/<?php echo base64_encode($item->id); ?>"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endif
</div>
@stop