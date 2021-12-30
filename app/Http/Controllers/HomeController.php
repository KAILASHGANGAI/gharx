<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\slider;
use App\models\category;
use App\models\house_design;
use App\models\land_shoter;
use App\models\product;
use App\models\realstate;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slider = slider::all();
        $category = category::all();
        $products = product::where('popular','=', 1)->get();

        // $house_design = house_design::all();
        // $land_shoter = land_shoter::all();
        // $slider = slider::all();
        // $slider = slider::all();
        return view('/welcome',['slider'=>$slider, 'category'=>$category, 'popular'=>$products]);

    }
}
