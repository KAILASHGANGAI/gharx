@extends('admin/layout/admin_layout')
@section('content')
 <div class="container">
     <h2>Products Orders</h2>
 </div><hr>
 <div class="container-fluid table-responsive">
    
    <table class="table ">
        <tr class="bg-dark text-white">
            <th>s.n</th> <th>Order_By</th> <th>Phone</th> <th>Address</th> <th>Status</th><th>Products</th> 
            <th>Discount</th><th>Total_amount</th><th>Date</th> <th>Action</th>
        </tr>
        <tbody>
            @php $count=1 @endphp
            @foreach($data as $item)
            @if($item->status == "pending")
               <tr class="bg-info">
               <td>{{$item->id}}</td>
                   <td> {{$item->name}}</td>
                   <td> {{$item->phone}}</td>
                   <td>{{$item->address}}</td>
                   <td> {{$item->status}}</td>
                   <td> 
                         @foreach(unserialize($item->products_details) as $product)
                            <div class="d-flex py-1" style="border-top: 1px solid red;">
                                <div>
                                    <a href="/{{$product['image']}}"><img src="{{asset($product['image'])}}" height="50" width="50" alt="" srcset="">
                                    </a>
                                </div>
                               <div >
                               {{$product['name']}} <br>
                                Quantity :{{$product['quantity']}} <br>
                               </div>
                                                             
                            </div>
                        @endforeach
                    </td>
                  <td>Rs. {{$item->total_discount_amount}}</td>
                  <td>Rs. {{$item->total_amount}}</td>
                   <td> {{$item->created_at}}</td>
                   <td>
                       <a href="/Admin/conform/{{$item->id}}"><i class="far fa-check-circle" style="font-size:30px;"></i></a>
                       <a href="/Admin/print_order/{{$item->id}}"><i class="fas fa-print" style="font-size:30px;"></i></a>
                       <a href="/Admin/delete_order/{{$item->id}}"><i class="fas fa-trash" style="font-size:30px;"></i></a>
                   </td>
               </tr>
               @else
               <tr>
                   <td>{{$item->id}}</td>
                   <td> {{$item->name}}</td>
                   <td> {{$item->phone}}</td>
                   <td>{{$item->address}}</td>

                   <td> {{$item->status}}</td>
                   <td> 
                         @foreach(unserialize($item->products_details) as $product)
                            <div class="d-flex py-1" style="border-top: 1px solid red;">
                                <div>
                                    <a href="/{{$product['image']}}"><img src="{{asset($product['image'])}}" height="50" width="50" alt="" srcset="">
                                    </a>
                                </div>
                               <div >
                               {{$product['name']}} <br>
                                Quantity :{{$product['quantity']}} <br>
                               </div>
                                                             
                            </div>
                        @endforeach
                    </td>
                  <td>Rs. {{$item->total_discount_amount}}</td>
                  <td>Rs. {{$item->total_amount}}</td>
                   <td> {{$item->created_at}}</td>
                   <td>
                       <a href="/Admin/conform/{{$item->id}}" class="text-danger"><i class="far fa-check-circle" style="font-size:30px;"></i></a>
                       <a href="/Admin/print_order/{{$item->id}}"><i class="fas fa-print" style="font-size:30px;"></i></a>
                       <a href="/Admin/delete_order/{{$item->id}}"><i class="fas fa-trash" style="font-size:30px;"></i></a>
    
                    </td>
               </tr>
               @endif
            @endforeach
        </tbody>
    </table>    

 </div>
@stop