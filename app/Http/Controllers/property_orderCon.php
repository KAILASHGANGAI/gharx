<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\property_order;
use App\Models\realstate;
class property_orderCon extends Controller
{
    function show(){

        $data = property_order::join('realstate', 'realstate.id', '=', 'property_orders.property_id')
      ->join('users', 'users.id', '=', 'property_orders.user_id')
      ->orderBy('property_orders.id', 'DESC')
      ->get([
          'property_orders.id','property_orders.status','property_orders.address','property_orders.created_at AS orderdate','users.name As orderby','users.phone AS OrderContact',
          'realstate.owner_name','realstate.contact','realstate.city','realstate.tole','realstate.nearby','realstate.property_type','realstate.property_for','realstate.Price',
          'realstate.images AS img'
        
        ]);
       
        

        return view('/admin/orders/realstate_order',['data'=>$data]);

   }
   function conform($id){
       $update = property_order::find($id);
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
    $update = property_order::find($id);
    if ($update->delete()) {
        return back()->with('status', 'Order deleted');

    }else{
        return back()->with('status', 'Order deletion failed !');

    }
   }
  
}
