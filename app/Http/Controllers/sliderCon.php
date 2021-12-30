<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\slider;
class sliderCon extends Controller
{
    function Add(Request $req){
        $new = new slider;
        if ($req->hasfile('image')) {
            $image = $req->file('image');
                $name = $image->getClientOriginalName();
                $destinationPath = $image->move(public_path('uploads/slider/'), $name);
                $path='uploads/slider/'.$name;
            
            $new->images = $path;
         }else{
            $req->session()->flash('status',"image  required");
            return redirect('/Admin/slider');
         }
         if ($new->save()) {
            $req->session()->flash('status',"image  added successfully");
            return redirect('/Admin/slider');
         }else{
            $req->session()->flash('status',"image  required");
            return redirect('/Admin/slider');
         }
    }
    function show(){
        $data = slider::all();
        return view('admin/slider/slider',['data'=>$data]);
    }
    function edit($id){
        $ids =  base64_decode($id);
        $data = slider::find($ids);
        return view('/admin/slider/slider',['edit'=>$data]);
    }
    function update(Request $req){
        $update =  slider::find($req->input('id'));

        if ($req->hasfile('image')) {
            $imgWillDelete = public_path().'/'.$update->images;
                  

        unlink($imgWillDelete);
            $update->delete();
        
            $image = $req->file('image');
                $name = $image->getClientOriginalName();
                $destinationPath = $image->move(public_path('uploads/slider/'), $name);
                $path='uploads/slider/'.$name;
            
            $update->images = $path;
         }else{
            $req->session()->flash('status',"image  required");
            return redirect('/Admin/slider');
         }
         if ($update->save()) {
            $req->session()->flash('status',"image  added successfully");
            return redirect('/Admin/slider');
         }else{
            $req->session()->flash('status',"image  required");
            return redirect('/Admin/slider');
         }
    }
    function delete($id){
        $ids =  base64_decode($id);
        $data = slider::find($ids);
       
        $imgWillDelete = public_path().'/'.$data->images;
                  

        if(unlink($imgWillDelete)){
            $data->delete();
           session()->flash('status',"deleted successfully");
            return redirect('/Admin/slider');
        }else{
           session()->flash('status',"deletion failed");
            return redirect('/Admin/slider');
        }
    }
}
