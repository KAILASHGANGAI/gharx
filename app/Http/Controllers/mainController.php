<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\models\slider;
use App\models\category;
use App\models\house_design;
use App\models\land_shoter;
use App\models\product;
use App\models\realstate;
use App\models\house_order;
use App\models\property_order;
use App\models\land_orders;
use App\models\product_order;
use Auth;
Use Alert;

class mainController extends Controller
{
    function indexpage(){
        $slider = slider::all();
        $category = category::all();
        $products = product::where('popular','=', 1)->get();
        $realstate = realstate::where('popular','=', 1)->get();
        // $house_design = house_design::all();
        // $land_shoter = land_shoter::all();
        // $slider = slider::all();
        // $slider = slider::all();
        return view('/welcome',['slider'=>$slider, 'category'=>$category, 'popular'=>$products,'realstate'=>$realstate]);

    }
    function singlehouse($id){
        $ids = base64_decode($id);
        $data = house_design::find($ids);
        return view('/single house_design',['data'=>$data]);
    }

    function houses(){
        $house_design = house_design::all();
        return view('/house_design',['data'=>$house_design]);

    }
    function orderhouse($id){
        $ids = base64_decode($id);
        $data = house_design::find($ids);
        return view('/order_house_design',['data'=>$data]);
    }
    function finalorder(Request $req){
        $new = new house_order ;
        $new->name = $req->input('name');
        $new->address = $req->input('address');
        $new->contact = $req->input('contact');
        $new->house_id = $req->input('id');
        $new->message = $req->input('message');
        if ($new->save()) {
        
            return back()->with('status', 'order success !! We will Contact You Soon !');
        }
    }

    function categoryproducts($id){
        $category = category::find($id);
       $products = product::where('category','=', $category->category_name)->get();
       return view('/category_products',['category'=>$category , 'products'=>$products]);
    }
    function productsinglepage($id){
        $data = product::find(base64_decode($id));
        return view('/product_single_page',['data'=>$data]);
    }
    function property(Request $req){
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
                return redirect('/upload property');
            }
         
         if ($new->save()) {
            $req->session()->flash('status',"new successfully");
            return redirect('/upload property');
             
         }

    }
    function post_land_shop(Request $req){
        $new = new land_shoter;
        $new->uploadedby = Auth::id();
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
            return back();
         }
        

         $new->discription = $req->input('description');
         if ($new->save()) {
            alert()->success('success Message ',"Your Property uploaded successfully");

            return back();
         }

    }
    public function buy_house()
    {
        $data = realstate::where('property_type', '=', 'house')->where('property_for', '=', 'sell')->get();
        return view('/realstate/buy_house',['data'=>$data]);  
    }
    function singleproperty($id){
        $ids = base64_decode($id);
        $realstate = realstate::find($ids);
       return view('/realstate/single_property',['data'=>$realstate]);
    }
    function singleland($id){
        $ids = base64_decode($id);
        $realstate = land_shoter::find($ids);
       return view('/realstate/single_land_shoter',['data'=>$realstate]);
    }
    
    function applyproperty(Request $req){
        
        $ids = base64_decode($req->input('id'));
         $realstate = realstate::find($ids);

            $new = new property_order;
            $new->user_id = Auth::id();
           $new->address = $req->input('address');
             $new->property_id = $ids ;
             if ($new->save()) {
                alert()->success('Success Message ',"You have applied successfully");
                 return back();

             }else{
                 return redirect('/buy_house')->with('status', $realstate->property_type."has been not applied");
             }
    }
    function applyland(Request $req){
        $ids = base64_decode($req->input('id'));
        $realstate = land_shoter::find($ids);

            $new = new land_orders;
            $new->user_id = Auth::id();
            $new->address = $req->input('address');
             $new->land_id = $ids ;
             if ($new->save()) {
                 alert()->success('Message ',$realstate->type." has been applied successfully");

                 return back();

             }else{
                 return redirect('/buy_land')->with('status', $realstate->type."has been not applied");
             }
    }
    function showrent(){
        $data = realstate::where('property_for', '=', 'rent')->get();
        return view('/realstate/take_rent',['data'=>$data]); 
    }
    function showland(){
        $data = land_shoter::all();
        return view('/realstate/buy_land',['data'=>$data]); 
    }

    function products(){
        $products = product::all();
       $category = product::distinct('category')->get(['category']);
        return view('/product',['products'=>$products, 'category'=>$category]) ;
    }
    function categoruproducts($cat){
        $products = product::where('category', '=', $cat)->get();
       $category = product::distinct('category')->get(['category']);
        return view('/product',['products'=>$products, 'category'=>$category]) ;

    }

    public function cart()
    {
        return view('cart');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->product_name,
                "quantity" => 1,
                "price" => $product->rate,
                "discount" => $product->discount,
                "gst" => $product->gst,
                "image" => $product->image
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
      
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    function ordersuccess(Request $req){
    
        $total =0;
        $discount =0;
        $new = new product_order ;
        $new->user_id =  Auth::id();
        $new->address =  $req->input('address');
        $new->products_details = serialize( session('cart'));
        foreach(session('cart') as $cart){
          
            $total += ( $cart['price'] - $cart['price'] * $cart['discount'] /100 )* $cart['quantity'];
            $discount += (  $cart['price'] * $cart['discount'] /100 ) * $cart['quantity'];
        }
       
        $new->total_discount_amount = $discount;
        $new->total_amount	= $total;
        
        if ($new->save()) {
            alert()->success('Order Message ',"Your Order has been successfully. we will contact you soon..");

            return back();
        }else{
            alert()->error('ErrorAlert','Order failed . Try again');

            return back();

        }

        
    }
    function recently(){
        $id =Auth::id();
        $ordered = product_order::orderBy('id', 'DESC')->where('user_id', '=', $id)->get();
        return view('/recently ordered', ['data'=>$ordered]);
    }
}
