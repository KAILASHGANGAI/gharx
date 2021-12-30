<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;

class productCon extends Controller
{
    function Add(Request $req){
        $new = new product;
        $new->product_name = $req->input('name');
        $new->rate = $req->input('rate');
        $new->gst = $req->input('gst');
        $new->discount = $req->input('discount');
        $new->category = $req->input('category');
        $new->discription = $req->input('discription');

        if ($req->hasfile('image')) {
            $image = $req->file('image');
                $name = $image->getClientOriginalName();
                $destinationPath = $image->move(public_path('uploads/products'), $name);
                $path='uploads/products/'.$name;
            
            $new->image = $path;
         }else{
            $reeq->session()->flash('status',"image  required");
            return redirect('/Admin/products');
         }
         if($new->save()){
            $req->session()->flash('status',"added successfully");
            return redirect('/Admin/products');   
         }

    }

    function show(){
        $data = product::orderBy('id', 'desc')->paginate(6);
        return view('/admin/products/products',['data'=>$data]);
    }
    function edit($id){
        $ids =  base64_decode($id);
        $data = product::find($ids);
        $category = category::select('category_name')->get();

        return view('/admin/products/add_products',['edit'=>$data, 'category'=>$category]);
    }
    function update(Request $req){
        $update =  product::find($req->input('id'));
        $update->product_name = $req->input('name');
        $update->rate = $req->input('rate');
        $update->gst = $req->input('gst');
        $update->discount = $req->input('discount');
        $update->category = $req->input('category');
        $update->discription = $req->input('discription');

        if ($req->hasfile('image')) {
            $imgWillDelete = public_path().'/'.$update->image;
            unlink($imgWillDelete);

            $image = $req->file('image');
                $name = $image->getClientOriginalName();
                $destinationPath = $image->move(public_path('uploads/products'), $name);
                $path='uploads/products/'.$name;
            
            $update->image = $path;
         }
         if($update->save()){
            $req->session()->flash('status',"updated successfully");
            return redirect('/Admin/products');   
         }
    }
    function delete($id){
       
        $ids =  base64_decode($id);
        $data = product::find($ids);
       
            $imgWillDelete = public_path().'/'.$data->image;
         

        if(unlink($imgWillDelete)){
            $data->delete();
           session()->flash('status',"deleted successfully");
            return redirect('/Admin/products');
        }else{
           session()->flash('status',"deletion failed");
            return redirect('/Admin/products');
        }
        
    }
    function popular($id){
        $ids =  base64_decode($id);
        $update = product::find($ids);
        if ($update->popular == 1) {
            $update->popular = 0;

        }else{
            $update->popular = 1;
        }
        

        if ($update->save()) {
            session()->flash('status',"Added to popular");
            return redirect('/Admin/products');
        }else{
            session()->flash('status',"popular failed");
            return redirect('/Admin/products');
        }
      
    }

    function category(){
        $category = category::select('category_name')->get();
        return view('/admin/products/add_products',['category'=>$category]);
    }
    
}
