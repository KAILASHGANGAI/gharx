<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\land_shoter;
use RealRashid\SweetAlert\Facades\Alert;
class land_shoterCon extends Controller
{
    function Add(Request $req){
        $new = new land_shoter;
        $new->uploadedby = "admin";
        $new->name = $req->input('name');
        $new->address_of_land = $req->input('address');
        $new->phone_number = $req->input('phone');
        $new->type = $req->input('type');
        $new->price = $req->input('price');
        $new->area = $req->input('area');
        $new->east = $req->input('east');
        $new->west = $req->input('west');
        $new->north = $req->input('north');
        $new->south = $req->input('south');
        
        if ($req->hasfile('images')) {
            $image = $req->file('images');
                $name = $image->getClientOriginalName();
                $destinationPath = $image->move(public_path('uploads/land_shoter/'.$req->input('type')), $name);
                $path='uploads/land_shoter/'.$req->input('type').'/'.$name;
            
            $new->images = $path;
         }else{
            $req->session()->flash('status',"image  required");
            return redirect('/Admin/add_land_shoter');
         }
        

         $new->discription = $req->input('description');
         if ($new->save()) {
            $req->session()->flash('status',"added successfully");
            return redirect('/Admin/land-shoter');
         }
    }
    function show(){
        $data = land_shoter::all();
        return view('/admin/land_shoter/land_shoter',['data'=>$data]);
    }
    function edit($id){
        $ids =  base64_decode($id);
        $data = land_shoter::find($ids);
        return view('/admin/land_shoter/add_land_shoter',['edit'=>$data]);
    }
    function update(Request $req){
        $update = land_shoter::find($req->input('id'));

        $update->name = $req->input('name');
        $update->address_of_land = $req->input('address');
        $update->phone_number = $req->input('phone');
        $update->type = $req->input('type');
        $update->price = $req->input('price');
        $update->area = $req->input('area');
        $update->east = $req->input('east');
        $update->west = $req->input('west');
        $update->north = $req->input('north');
        $update->south = $req->input('south');
        
        if ($req->hasfile('images')) {
            $imgWillDelete = public_path().'/'.$update->images;
            unlink($imgWillDelete);

            $image = $req->file('images');
                $name = $image->getClientOriginalName();
                $destinationPath = $image->move(public_path('uploads/land_shoter/'.$req->input('type')), $name);
                $path='uploads/land_shoter/'.$req->input('type').'/'.$name;
            
            $update->images = $path;
         }
        

         $update->discription = $req->input('description');
         if ($update->save()) {
            $req->session()->flash('status',"updated successfully");
            return redirect('/Admin/land-shoter');
         }
    }
    function delete($id){
       
        $ids =  base64_decode($id);
        $data = land_shoter::find($ids);
       
        $imgWillDelete = public_path().'/'.$data->images;
               

        if(unlink($imgWillDelete)){
            $data->delete();
           session()->flash('status',"deleted successfully");
            return redirect('/Admin/land-shoter');
        }else{
           session()->flash('status',"deletion failed");
            return redirect('/Admin/land-shoter');
        }
        
    }
}
