<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\house_order;
use App\Models\User;


class house_design_orderCon extends Controller
{
    function show(){

        $data = house_order::join('house_designs', 'house_designs.id', '=', 'house_order.house_id')
      
      ->orderBy('house_order.id', 'DESC')
      ->paginate(15,['house_order.id AS order_id','house_order.name','house_order.address','house_order.contact','house_order.status','house_order.message','house_order.created_at',
      'house_designs.design_name','house_designs.avetage_Rate','house_designs.discount','house_designs.images']);
      
            return view('/admin/orders/house_design_order',['data'=>$data] );

   }
   function conform($id){
       $update = house_order::find($id);
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
    $update = house_order::find($id);
    if ($update->delete()) {
        return back()->with('status', 'Order deleted');

    }else{
        return back()->with('status', 'Order deletion failed !');

    }
   }
}
