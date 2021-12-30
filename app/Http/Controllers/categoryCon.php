<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\category;
class categoryCon extends Controller
{
    function Add(Request $req){
        $new = new category;

        $new->category_name = $req->input('name');
        
        if ($req->hasfile('fimage')) {
            $image = $req->file('fimage');
                $fname = $image->getClientOriginalName();
                $destinationPath = $image->move(public_path('uploads/category/front'), $fname);
                $path='uploads/category/front/'.$fname;
            
            $new->front_img = $path;
         }else{
            $req->session()->flash('status',"image  required");
            return redirect('/Admin/category');
         }
         if ($req->hasfile('bimage')) {
            $image = $req->file('bimage');
                $bname = $image->getClientOriginalName();
                $destinationPath = $image->move(public_path('uploads/category/banner'), $bname);
                $path='uploads/category/banner/'.$bname;
            
            $new->banner_image = $path;
         }else{
            $req->session()->flash('status',"images required");
            return redirect('/Admin/category');
         }

         $new->discription = $req->input('description');
         if ($new->save()) {
            $req->session()->flash('status',"added successfully");
            return redirect('/Admin/category');
         }
    }
    function show(){
        $data = category::all();
        return view('/admin/category/category',['data'=>$data]);
    }
    function edit($id){
        $ids =  base64_decode($id);
        $data = category::find($ids);
        return view('/admin/category/add_category',['edit'=>$data]);
    }
    function update(Request $req){
        $update = category::find($req->input('id'));

        $update->category_name = $req->input('name');
        
        if ($req->hasfile('fimage')) {
            $imgWillDelete = public_path().'/'.$update->front_img;
            unlink($imgWillDelete);

            $image = $req->file('fimage');
                $fname = $image->getClientOriginalName();
                $destinationPath = $image->move(public_path('uploads/category/front'), $fname);
                $path='uploads/category/front/'.$fname;
            
            $update->front_img = $path;
         }
         if ($req->hasfile('bimage')) {
            $imgWillDelete = public_path().'/'.$update->banner_image;
            unlink($imgWillDelete);
            $image = $req->file('bimage');
                $bname = $image->getClientOriginalName();
                $destinationPath = $image->move(public_path('uploads/category/banner'), $bname);
                $path='uploads/category/banner/'.$bname;
            
            $update->banner_image = $path;
         }

         $update->discription = $req->input('description');
         if ($update->save()) {
            $req->session()->flash('status',"updated successfully");
            return redirect('/Admin/category');
         }
    }
    function delete($id){
       
        $ids =  base64_decode($id);
        $data = category::find($ids);
       
        $imgWillDelete = public_path().'/'.$data->front_img;
        $imgWillDeleteb = public_path().'/'.$data->banner_image;
               

        if(unlink($imgWillDelete) && unlink($imgWillDeleteb)){
            $data->delete();
           session()->flash('status',"deleted successfully");
            return redirect('/Admin/category');
        }else{
           session()->flash('status',"deletion failed");
            return redirect('/Admin/category');
        }
        
    }
}
