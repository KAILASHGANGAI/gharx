<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\realstate;
class realstateCon extends Controller
{
    function Add(Request $req){
        $new = new realstate;
        
        $new->owner_name = $req->input('owner_name');
        $new->contact = $req->input('contact');
        $new->city = $req->input('city');
        $new->tole =$req->input('tole');
        $new->nearby= $req->input('nearby');
        $new->property_type = $req->input('property_type');
        $new->property_for = $req->input('property_for');
        $new->Price = $req->input('price');
        $new->total_bedroom = $req->input('total_bedroom');
        $new->toilet_bathroom = $req->input('toilet_bathroom');
        $new->kitchen = $req->input('kitchen');
        $new->discription = $req->input('discription');
        
        if ($req->hasfile('images')) {         
             $images = $req->file('images');
            foreach($images as $image) {
                $name = $image->getClientOriginalName();
                $destinationPath = $image->move(public_path('uploads/realstate/'.$req->input('property_type')),$name);
                $path[]='uploads/realstate/'.$req->input('property_type').'/'.$name;
            }
            $new->images = serialize($path);
            
            }else{
                $req->session()->flash('status',"image not loaded");
                return redirect('/Admin/realstate');
            }
         
         if ($new->save()) {
            $req->session()->flash('status',"new successfully");
            return redirect('/Admin/realstate');
             
         }

    }
    function show(){
        $data = realstate::paginate(5);
        return view('/admin/realstate/realstate',['data'=>$data]);
    }
    function edit($id){
        $ids =  base64_decode($id);
        $data = realstate::find($ids);
        return view('/admin/realstate/add_realstate',['edit'=>$data]);
    }

    function update(Request $req){
        $update = realstate::find($req->input('id'));
        
        $update->owner_name = $req->input('owner_name');
        $update->contact = $req->input('contact');
        $update->city = $req->input('city');
        $update->tole =$req->input('tole');
        $update->nearby= $req->input('nearby');
        $update->property_type = $req->input('property_type');
        $update->property_for = $req->input('property_for');
        $update->Price = $req->input('price');
        $update->total_bedroom = $req->input('total_bedroom');
        $update->toilet_bathroom = $req->input('toilet_bathroom');
        $update->kitchen = $req->input('kitchen');
        $update->discription = $req->input('discription');
        
        if ($req->hasfile('images')) {         
             $images = $req->file('images');

             foreach (unserialize($update->images) as $key => $img) {
                $imgWillDelete = public_path().'/'.$img;
                unlink($imgWillDelete);

              
            }
            foreach($images as $image) {
                $name = $image->getClientOriginalName();
                $destinationPath = $image->move(public_path('uploads/realstate/'.$req->input('property_type')),$name);
                $path[]='uploads/realstate/'.$req->input('property_type').'/'.$name;
            }
            $update->images = serialize($path);
            
            }
         
         if ($update->save()) {
            $req->session()->flash('status',"updated successfully");
            return redirect('/Admin/realstate');
             
         }       
    }

    
    function delete($id){
        $success = 0;
        $ids =  base64_decode($id);
        $data = realstate::find($ids);
        foreach (unserialize($data->images) as $key => $img) {
            $imgWillDelete = public_path().'/'.$img;
            unlink($imgWillDelete);

            $success = 1;
        }
        if($success  ==1 ){
            $data->delete();
           session()->flash('status',"deleted successfully");
            return redirect('/Admin/realstate');
        }else{
           session()->flash('status',"deletion failed");
            return redirect('/Admin/realstate');
        }
        
    }
    function popular($id){
        
         $update = realstate::find(base64_decode($id));
         if ($update->popular == 1) {
             $update->popular = 0 ;
         }else{
             $update->popular = 1;
         }
     
         if ($update->save()) {
             return back()->with('status', 'popular updated');
     
         }else{
             return back()->with('status', 'popular updation failed !');
     
         }
        }
}
