@extends('admin/layout/admin_layout')
@section('content')
<style>
    svg{
        display:none;
    }
</style>
 <div class="container">
     <h2>Land & Shoter  Orders</h2>
 </div><hr>
 {{$data}}
 <div class="container-fluid table-responsive">

       <table class="table border">
         <tr class="bg-dark text-white">
             <th>S.N</th>
             <th>Status</th>
             <th>Orderby_name</th>
             <th>Address</th>
             <th>Orderby_contact</th>
             <th>Image_of_product</th>
             <th>Owner_name</th>
             <th>Owner_contact</th>
             <th>Address_of_land</th>
           
             <th>Price</th>
             <th>Type</th>
             <th> Area</th>
             <th>Date</th>
             <th>Action</th>
         </tr>
         <tbody>
             @foreach($data as $item)
                <tr>
                    <td>{{$item->order_id}}</td>
                    <td>
                        @if($item->status == 0)
                            <span class="text-success">{{'pending'}}</span>
                        @else
                            {{'conform'}}
                        @endif
                    </td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->phone}}</td>
                    <td>
                   
                   <a href="/{{$item->images}}"><img src="{{asset($item->images)}}" height="50" width="50" alt="" srcset=""></a>
                   </td>
                    <td>{{$item->owner_name}}</td>
                    <td>{{$item->owner_contact}}</td>
                    <td>{{$item->address_of_land}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->type}}</td>
                    <td>{{$item->area}}</td>
                
                    
                    <td>{{$item->created_at}}</td>
                   
                  
                   
                    <td>
                   
                        @if($item->status == 0)
                        <a href="/Admin/conform-land_shoter_order/{{$item->order_id}}" class="text-success"><i class="far fa-check-circle" style="font-size:30px;"></i></a>

                        @else
                        <a href="/Admin/conform-land_shoter_order/{{$item->order_id}}" class="text-danger"><i class="far fa-check-circle" style="font-size:30px;"></i></a>

                        @endif
                       
                    <a href="/Admin/delete-land_shoter_order/{{$item->order_id}}"><i class="fas fa-trash" style="font-size:30px;"></i></a>
                    </td>
                </tr>
             @endforeach
         </tbody>
     </table>
    <div class="d-flex justify-content-end pagination">
    @if ($data->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($data->onFirstPage())
            <li class="disabled"><span style="font-size:40px;">&laquo;</span></li>
        @else
            <li><a href="{{ $data->previousPageUrl() }}" rel="prev" style="font-size:40px;">&laquo;</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($data->hasMorePages())
            <li><a href="{{ $data->nextPageUrl() }}" rel="next" style="font-size:40px;">&raquo;</a></li>
        @else
            <li class="disabled" style="font-size:40px;"><span>&raquo;</span></li>
        @endif
    </ul>
@endif
    </div>

 </div>
@stop