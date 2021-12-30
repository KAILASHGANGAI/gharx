@extends('admin/layout/admin_layout')
@section('content')

<div class="contaioner-fluid">
<div class="d-flex">
<h3>Realstate</h3>
<a href="/Admin/add_realstate" class="btn btn-success mx-3">Add Realstate</a>
</div>
<hr>
@if(isset($data))
<table class="table">
    <thead>
        <th>S.n</th><th>owner_name</th><th>contact no</th><th>city<th>tole</th>  <th>nearby</th> <th>property_type</th> <th>property_for</th> <th>Price</th>
        	<th>total_bedroom</th> <th>toilet_bathroom</th> <th>kitchen</th>	<th>images</th>	<th>Action</th>
    </thead>
    <tbody>
    @foreach($data as $key=>$item)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$item->owner_name}}</td>
            <td>{{$item->contact}}</td>
            <td>{{$item->city}}</td>
            <td>{{$item->tole}}</td>
            <td>{{$item->nearby}}</td>
            <td>{{$item->property_type}}</td>
            <td>{{$item->property_for}}</td>
            <td>{{$item->Price}}</td>
            <td>{{$item->total_bedroom}}</td>
            <td> @if($item->toilet_bathroom == '1'){{'yes'}} @else {{'no'}} @endif</td>
            <td> @if($item->kitchen == '1'){{'yes'}} @else {{'no'}} @endif</td>
            <td class="d-flex">
                 @foreach(unserialize($item->images) as $img)
               <a href="{{ asset($img)}}"> <img src="{{ asset($img)}}" alt="" height="100px" width="100px"> </a>
                @endforeach
            </td>
            <td>
            @if($item->popular == '1')
            <a href="popular_realstate/<?php echo base64_encode($item->id); ?>"><i class="far fa-bookmark text-danger"></i></a>
            @else
            <a href="popular_realstate/<?php echo base64_encode($item->id); ?>"><i class="far fa-bookmark"></i></a>

            @endif
                <a href="edit_realstate/<?php echo base64_encode($item->id); ?>"><i class="fas fa-eye"></i></a>
                <a href="delete_realstate/<?php echo base64_encode($item->id); ?>"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endif
</div>
@stop