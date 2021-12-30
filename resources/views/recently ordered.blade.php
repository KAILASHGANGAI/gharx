@extends('layouts/front_layout')
@section('content')

<div class="container">
<table id="cart" class="table table-hover table-responsive table-condensed">
    <thead>
        <tr>
            <th >Product</th>
            <th></th>
            <th >Price </th>
            <th >Discount</th>
        
            <th> Quantity</th>
            <th>Date</th>
            
        </tr>
    </thead>
    <tbody>
@if(isset($data))
@foreach($data as $item)
<?php $a = unserialize($item->products_details); ?>
@foreach($a as $key=>$items)
  <tr>
    <td colspan="2"><img src="{{asset($items['image'])}}" alt="" height="80px" width="80px" srcset=""> {{$items['name']}}</td>
    <td>Rs.{{$items['price']}}</td>
    <td>{{$items['discount']}} %</td>
    <td>{{$items['quantity']}}</td>
    <td>{{$item->created_at}}</td>
</tr>


@endforeach
<tr class="bg-success ">
    <td colspan="2">Total Discount:.Rs. {{$item->total_discount_amount}}</td>
    <td colspan="2">Total amount to pay : Rs. {{$item->total_amount}} </td>
    <td >Status  : {{$item->status}} </td>
    @if($item->status == 'pending')
    <td ><a href="#">cancle</a></td>
   
    @endif
</tr>
@endforeach
@endif

     
    </tbody>

</table>
</div>
@stop