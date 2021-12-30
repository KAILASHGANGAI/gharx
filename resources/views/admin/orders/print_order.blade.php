@extends('admin/layout/admin_layout')
@section('content')
<style>
   table, th, tr, tbody, td{
   border: 1px solid black;
   padding:20px;
   }
   .invoice{
   margin-top:-5rem;
   }
   .clear{
   clear: both;
   }
   .underline{
   border-bottom: 2px dotted black;
   font-weight:bold;
   letter-spacing:4px;
   color:gray;
   }
   .boder{
   border: 2px solid black;
   padding : 0 20px;
   }
</style>
<button id="print"><i class="fas fa-print" style="font-size:30px;"></i></button>

<div class="container-fluid">
   <di class="row">
      
      <div class="col-sm-8 mx-auto">
          
         <div class="container boder py-5">
            <div class=" ">
               <div>
                  <h2>GharX India</h2>
                  <p>Katihar-more, Purnea, Bihar, India <br>
                     Tel : (+91) 6283993458 , 8294545139 <br>
                     gharxindia@gmail.com <br>
                     wwww.gharxindia.com 
               </div>
               <div>
                  <div class="float-right invoice">
                     <h4>INVOICE</h4>
                     Invoice No. : 8766 <br>
                     Reception No: {{$product->id}} <br>
                     Date :{{date("D M d Y");}}    
                    
                  </div>
               </div>
            </div>
            <div class="clear"></div>
            <hr>
            <div class="px-5">
               <div >
                  <p  class="underline"> NAME : {{$user->name}}</p>
               </div>
               <div class="">
                  <div>
                     <p  class="underline">ADDRESS : {{$product->address}}</p>
                  </div>
                  <div >
                     <p  class="underline">CONTACT NO.  : {{$user->phone}}</p>
                  </div>
               </div>
            </div>
            <hr>
            <table class="table">
               <tr>
                  <th>S.N</th>
                  <th>Products</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Discount Amount</th>
                  <th>Net Amount</th>
                  <th>Actual Price</th>
                  <th>Tax</th>
                  <th>Amount</th>
               </tr>
               <tbody>
                  @php $count = 1; $t=0 @endphp
                  @foreach(unserialize($product->products_details) as $pro)
                  <tr>
                     <td> {{$count++}}</td>
                     <td> <img src="{{asset($pro['image'])}}" width="50" height="50" alt=""> {{$pro['name']}}</td>
                     <td> {{$pro['quantity']}}</td>
                     <td>Rs. {{$pro['price']}}</td>
                     <td> Rs.{{($pro['discount']/100*$pro['price']) *$pro['quantity']}} </td>
                     <td>{{( $pro['price'] - $pro['discount']/100*$pro['price']) * $pro['quantity'] }}</td>
                     <td> {{ ($pro['price'] - $pro['discount']/100 * $pro['price'] ) * $pro['quantity'] - $pro['gst'] /100 *($pro['price'] - $pro['discount']/100 * $pro['price'] ) * $pro['quantity'] }} </td>
                     <td> {{ $pro['gst'] /100 *($pro['price'] - $pro['discount']/100 * $pro['price'] ) * $pro['quantity'] }} </td>
                     <td> Rs.{{ ($pro['price'] - $pro['discount']/100 * $pro['price'] ) * $pro['quantity'] }}</td>
                  </tr>
                  @endforeach
                  <tr>
                     <td colspan="4">Total : </td>
                     <td>Rs. {{$product->total_discount_amount}}</td>
                     <td colspan="4" style="text-align: end;"><span class="float-rignt">Rs. {{$product->total_amount}}</span> </td>
                  </tr>
               </tbody>
            </table>
            <div>
               <h5>Terms and Conditions</h5>
               <ul>
                  <li>on time </li>
                  <li>No returns</li>
               </ul>
               <div class="float-right ">
               <u>Signature</u>
            </div>
            </div>
           
         </div>
      </div>
   </di>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
function myfunction(){
  $('.container').printThis();
}
$('#print').click(function(){
  
  		 $('.container').printThis();
  	});
    </script>
@stop