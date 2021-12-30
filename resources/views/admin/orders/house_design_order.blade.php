@extends('admin/layout/admin_layout')
@section('content')
<style>
    svg{
        display:none;
    }
</style>
 <div class="container">
     <h2>House Design Orders</h2>
 </div><hr>
 <div class="container-fluid table-responsive">

       <table class="table border">
         <tr class="bg-dark text-white">
             <th>S.N</th>
             <th>Status</th>
             <th>Orderby_name</th>
             <th>Address</th>
             <th>Orderby_contact</th>
             <th>Messsage</th>
             <th>Order_date</th>
             <th>Image</th>
             <th>Design_name</th>
             <th>Price</th>
             <th>Discount</th>
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
                    <td>{{$item->contact}}</td>
                    <td>{{$item->message}}</td>
                    <td>{{$item->created_at}}</td>
                   <td>
                   @php $a = unserialize($item->images) @endphp
                   <a href="/{{$a[0]}}"><img src="{{asset($a[0])}}" height="50" width="50" alt="" srcset=""></a>
                   </td>
                  

                    <td>{{$item->design_name}}</td>
                    <td>{{$item->avetage_Rate}}</td>
                    <td>{{$item->discount}}</td>
                   
                    <td>
                   
                        @if($item->status == 0)
                        <a href="/Admin/conform-house_design_order/{{$item->order_id}}" class="text-success"><i class="far fa-check-circle" style="font-size:30px;"></i></a>

                        @else
                        <a href="/Admin/conform-house_design_order/{{$item->order_id}}" class="text-danger"><i class="far fa-check-circle" style="font-size:30px;"></i></a>

                        @endif
                       
                    <a href="/Admin/delete-house_design_order/{{$item->order_id}}"><i class="fas fa-trash" style="font-size:30px;"></i></a>
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