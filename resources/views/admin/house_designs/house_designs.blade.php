@extends('admin/layout/admin_layout')
@section('content')

<div class="contaioner-fluid">
<div class="d-flex">
<h3>House Designs</h3>
<a href="/Admin/add_house designs" class="btn btn-success mx-3">Add house_design</a>
</div>
<hr>
@if(isset($data))
<table class="table">
    <thead>
        <th>S.n</th> <th>Dessign name</th> <th>rate</th> <th>Images</th> <th>Action</th>
    </thead>
    <tbody>
    @foreach($data as $key=>$item)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$item->design_name}}</td>
            <td>{{$item->avetage_Rate}}</td>
            <td>
                <?php $a =unserialize($item->images) ; ?>
                @foreach(unserialize($item->images) as $img)
                        <img src="{{ asset($img)}}" alt="" height="100px" width="100px">
                @endforeach
            </td>
            <td>
                <a href="edit_design/<?php echo base64_encode($item->id); ?>"><i class="fas fa-eye"></i></a>
                <a href="delete_design/<?php echo base64_encode($item->id); ?>"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endif
</div>
@stop