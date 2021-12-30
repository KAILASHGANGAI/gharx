@extends('admin/layout/admin_layout')
@section('content')
 <div class="container">
     <h2>Realstate Orders</h2>
 </div><hr>
 <div class="container-fluid table-responsive">
     <table class="table border">
         <tr>
             <th>id</th>
             <th>status</th>
             <th>Orderby_name</th>
             <th>Address_of_orderby</th>
             <th>Orderby_contact</th>
             <th>image</th>
             <th>property_type</th>
             <th>property_for</th>
             <th>Price</th>
             <th>owner_name</th>
             <th>contact</th>
             <th>city</th>
             <th>tole</th>
             <th>Nearby</th>
             <th>date</th>
             <th>Action</th>
         </tr>
         <tbody>
             @foreach($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>
                        @if($item->status == 0)
                            {{'pending'}}
                        @else
                            {{'conform'}}
                        @endif
                    </td>
                    <td>{{$item->orderby}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->OrderContact}}</td>
                   <td>
                   @php $a = unserialize($item->img) @endphp
                   <a href="/{{$a[0]}}"><img src="{{asset($a[0])}}" height="50" width="50" alt="" srcset=""></a>
                   </td>
                  

                    <td>{{$item->property_type}}</td>
                    <td>{{$item->property_for}}</td>
                    <td>{{$item->Price}}</td>
                    <td>{{$item->owner_name}}</td>
                    <td>{{$item->contact}}</td>
                    <td>{{$item->city}}</td>
                    <td>{{$item->tole}}</td>
                    <td>{{$item->nearby}}</td>
                    <td>{{$item->orderdate}}</td>
                    <td>
                   
                        @if($item->status == 0)
                        <a href="/Admin/conform-realstate/{{$item->id}}" class="text-success"><i class="far fa-check-circle" style="font-size:30px;"></i></a>

                        @else
                        <a href="/Admin/conform-realstate/{{$item->id}}" class="text-danger"><i class="far fa-check-circle" style="font-size:30px;"></i></a>

                        @endif
                       
                    <a href="/Admin/delete_realstate_order/{{$item->id}}"><i class="fas fa-trash" style="font-size:30px;"></i></a>
                    </td>
                </tr>
             @endforeach
         </tbody>
     </table>
 </div>
@stop