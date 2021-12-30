<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\land_orders;
use App\Models\User;
class land_shoter_ordersCon extends Controller
{
    function show(){
        
        $data = land_orders::join('users', 'users.id', '=', 'land_orders.user_id')
      ->join('land_shoter', 'land_shoter.id', '=', 'land_orders.land_id')
      ->orderBy('land_orders.id', 'DESC')
      ->paginate(15,['users.name','users.phone','land_orders.id As order_id', 'land_orders.status','land_orders.address','land_orders.created_at'
       , 'land_shoter.name As owner_name', 'land_shoter.phone_number As owner_contact', 'land_shoter.address_of_land', 'land_shoter.price', 'land_shoter.type', 'land_shoter.area', 'land_shoter.images'        
    ]);
        return view('/admin/orders/land_shoter_order',['data'=>$data] );

    }
    function conform($id){
        $update = land_orders::find($id);
        if($update->status == 0 ){
            $update->status = 1;
 
        }else{
        $update->status = 0;
        }
        if ($update->save()) {
            return back()->with('status', 'Order conformed');
        }
    }
    function delete($id){
     $update = land_orders::find($id);
     if ($update->delete()) {
         return back()->with('status', 'Order deleted');
 
     }else{
         return back()->with('status', 'Order deletion failed !');
 
     }
    }
}
