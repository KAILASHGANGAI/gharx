<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\house_design;
class house_designCon extends Controller
{
    function Add(Request $req){
       
        $path = array();
        $new = new house_design;

        $new->design_name  = $req->input('name');
        $new->avetage_Rate = $req->input('rate'); 
        $new->discription = $req->input('description');
        if ($req->hasfile('images')) {
            
            $images = $req->file('images');
            foreach($images as $image) {
                $name = $image->getClientOriginalName();
                $destinationPath = $image->move(public_path('uploads/house_designs'), $name);
                $path[]='uploads/house_designs/'.$name;
            }
            $new->images = serialize($path);
         }else{
            session()->flash('status',"image  required");
            return redirect('/Admin/house designs');
         }
         if ($new->save()) {
            $req->session()->flash('status',"added successfully");
            return redirect('/Admin/house designs');
             
         }

    }

    function show(){
        $data = house_design::paginate(5);
        return view('/admin/house_designs/house_designs',['data'=>$data]);
    }
    function edit($id){
        $ids =  base64_decode($id);
        $data = house_design::find($ids);
        return view('/admin/house_designs/add_house_designs',['edit'=>$data]);
    }
    function update(Request $req){
        $path = array();
        $success= 0 ;
        $update = house_design::find($req->input('id'));

        $update->design_name  = $req->input('name');
        $update->avetage_Rate = $req->input('rate'); 
        $update->discription = $req->input('description');
        if ($req->hasfile('images')) {
            
           
            foreach (unserialize($update->images) as $key => $img) {
                $imgWillDelete = public_path().'/'.$img;
                unlink($imgWillDelete);

                $success = 1;
            }

            if ($success == 1) {
                $images = $req->file('images');
            foreach($images as $image) {
                $name = $image->getClientOriginalName();
                $destinationPath = $image->move(public_path('uploads/house_designs'), $name);
                $path[]='uploads/house_designs/'.$name;
            }
            $update->images = serialize($path);
            
            }else{
                $req->session()->flash('status',"image not replaced");
                return redirect('/Admin/house designs');
            }
         }
         if ($update->save()) {
            $req->session()->flash('status',"updated successfully");
            return redirect('/Admin/house designs');
             
         }

    }


    function delete($id){
        $success = 0;
        $ids =  base64_decode($id);
        $data = house_design::find($ids);
        foreach (unserialize($data->images) as $key => $img) {
            $imgWillDelete = public_path().'/'.$img;
            unlink($imgWillDelete);

            $success = 1;
        }
        if($success  ==1 ){
            $data->delete();
           session()->flash('status',"deleted successfully");
            return redirect('/Admin/house designs');
        }else{
           session()->flash('status',"deletion failed");
            return redirect('/Admin/house designs');
        }
        
    }

}
