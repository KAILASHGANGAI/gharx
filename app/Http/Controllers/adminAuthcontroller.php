<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\models\adminuser;
// use Illuminate\Support\Facades\Session;

use Session;

class adminAuthcontroller extends Controller
{
    
     
    function login(){
        return view('/admin/admin_auth/admin_login');
    }
    function register(){
        return view('/admin/admin_auth/admin_register');
    }
    function save(Request $request){
        
        //Validate requests
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:adminusers',
            'password'=>'required|min:5|max:12'
        ]);

         //Insert data into database
         $admin = new adminuser;
         $admin->name = $request->name;
         $admin->email = $request->email;
         $admin->password = Hash::make($request->password);
         $save = $admin->save();

         if($save){
            return back()->with('success','New User has been successfuly added to database');
         }else{
             return back()->with('fail','Something went wrong, try again later');
         }
    }

    function check(Request $request){
        //Validate requests
        $request->validate([
             'email'=>'required|email',
             'password'=>'required|min:5|max:12'
        ]);

        $userInfo = adminuser::where('email','=', $request->email)->first();

        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->password)){

               
                if ($request->session()->has('admin_user')) {
                    
                    return redirect('/Admin');
                }else{
                    
                    $value = Session::put('admin_user', $userInfo->name);
                    // return redirect('/Admin');
                    if ($request->session()->has('admin_user')) {
                          
                        return redirect('/Admin');
                    }else{
                        
                        return redirect('/Admin_login')->with('fail','something went wrong');

                    }
                }               

            }else{
                return back()->with('fail','Incorrect password');
            }
        }
    }

    function logout(){
        if(session()->has('admin_user')){
            session()->pull('admin_user');
           session()->flush();
            return redirect('/Admin_login');
        }
    }

    function dashboard(){
      
        return redirect('/Admin');
    }

    function profile(){
        $data = adminuser::where('name','=', session('admin_user'))->first();
        return view('/admin/admin_auth/profile',['data'=>$data]);
    }
  

}
