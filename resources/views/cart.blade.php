@extends('layouts/front_layout')  
@section('content')
<div class="container">
@if(session('status'))
<div class="alert alert-warning alert-dismissible fade w-50 show" role="alert">
  <strong>{{session('status')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
    <div class="row">
        <div class="col-sm-9 mx-auto">
<table id="cart" class="table table-hover table-responsive table-condensed">
    <thead>
        <tr>
            <th style="width:80%">Product</th>
            <th style="width:10%">Price </th>
            <th style="width:10%">Discount</th>
            <th style="width:50%"> Total Discount</th>
            
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @php $discount = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += ( $details['price'] - $details['price'] * $details['discount'] /100 )* $details['quantity'] @endphp 
                @php $discount += (  $details['price'] * $details['discount'] /100 ) * $details['quantity'] @endphp

                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-4 hidden-xs"><img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-8">
                                <h4 class="">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">Rs.{{ $details['price'] }}</td>
                    <td data-th="Discount">{{ $details['discount'] }} %</td>
                    <td data-th="Discount_amount">Rs.{{ ( $details['price'] * $details['discount'] /100 ) * $details['quantity']}} </td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                    </td>
                    <td data-th="Subtotal" class="text-center">Rs.{{ ($details['price'] - $details['price'] * $details['discount'] /100 )* $details['quantity'] }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" class="text-right"><h3><strong>Total Discount  Rs.{{ $discount }}</strong></h3></td>
            <td colspan="5" class="text-right"><h3><strong>Total Rs.{{ $total }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="8" class="text-right">
                <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <!-- <a href="{{ url('/checkout') }}" class="btn btn-success">Checkout <i class="fa fa-angle-right"></i> </a> -->
                <button type="button" class="btn btn-success px-4 py-2 " style="margin-top:0;" data-toggle="modal" data-target="#exampleModal">
                Checkout <i class="fa fa-angle-right"></i>
                </button>
            </td>
        </tr>
    </tfoot>
</table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter your Full Aaddress</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="/checkout" method="post">
       @csrf
         <label for="checkout">Full Address</label>
         <input type="text" name="address" id="">
         
         <button class="btn btn-success">Finally checkout</button>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>
@stop
