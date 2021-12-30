<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\models\product_order;
use App\Models\User;
use App\Models\product;
class product_orderCon extends Controller
{
    function show(){
         
         $data = DB::table('users')
         ->rightJoin('product_orders', 'users.id', '=', 'product_orders.user_id')
         ->select('name','phone','product_orders.id','status','address','products_details','total_discount_amount','total_amount','status','product_orders.created_at')
         ->orderBy('product_orders.id', 'DESC')
         ->get();
         return view('/admin/orders/product_order',['data'=>$data]);

    }
    function conform($id){
        $update = product_order::find($id);
        if($update->status == "pending"){
            $update->status = "confirm";

        }else{
        $update->status = "pending";
        }
        if ($update->save()) {
            return redirect('/Admin/product_order');
        }
    }
    function print($id){
        $product = product_order::find($id);
        $user = user::select('name','phone')->find($product->user_id);
            return view('/admin/orders/print_order',['product'=>$product, 'user'=>$user]);
        
    }
    function delete($id){
         $data = product_order::find($id);
       if($data->delete()){
           return back()->with('status','deleted  successfully');
       }else{
        return back()->with('status','deletion failed');

       }
        
    }
}
