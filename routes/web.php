<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\house_designCon;
use App\Http\Controllers\productCon;
use App\Http\Controllers\categoryCon;
use App\Http\Controllers\realstateCon;
use App\Http\Controllers\adminAuthcontroller;
use App\Http\Controllers\land_shoterCon;
use App\Http\Controllers\sliderCon;
use App\Http\Controllers\mainController;
use App\Http\Controllers\product_orderCon;
use App\Http\Controllers\property_orderCon;
use App\Http\Controllers\house_design_orderCon;
use App\Http\Controllers\land_shoter_ordersCon;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/',[mainController::class, 'indexpage']);
Route::view('/front_layout','/layouts/front_layout');
//house design
Route::view('/category_products','/category_products');
Route::get('/category_products/{id}',[mainController::class, 'categoryproducts']);

Route::view('/house_design','/house_design');
Route::get('/house_design', [mainController::class, 'houses']);
Route::view('/single house_design','/single house_design');
 Route::view('/terms-and-condition','/terms-and-condition');
// Route::view('/bricks','/category/bricks');
// Route::view('/inner_designs','/category/inner_designs');
// Route::view('/grills_designs','/category/grills');
// Route::view('/marbls','/category/marbels');

Route::view('/buy_house','/realstate/buy_house');
Route::get('/buy_house',[mainController::class, 'Buy_house']);
Route::view('/buy_land','/realstate/buy_land');
Route::get('/buy_land',[mainController::class, 'showland']);

Route::view('/take_rent','/realstate/take_rent');
Route::get('/take_rent',[mainController::class, 'showrent']);

Route::view('/transport_for_shifting','/transport');
Route::view('/about','/about');
Route::view('/contact','/contact');
Route::view('/consultency','/consultency');
Route::view('/upload property','/post_property');
Route::view('/upload land and shop','/upload_land_shop');

Route::get('/single_property/{id}',[mainController::class, 'singleproperty']);
Route::get('/products',[mainController::class, 'products']);
Route::get('/products/category=/{category}',[mainController::class, 'categoruproducts']);
Route::get('/product_single_page/{id}',[mainController::class, 'productsinglepage']);


Route::group(['middleware'=>"auth"],function(){

    Route::get('/single_property/{id}',[mainController::class, 'singleproperty']);
    Route::get('/single_land_shoter/{id}',[mainController::class, 'singleland']);
    Route::post('/apply_property',[mainController::class, 'applyproperty']);
    Route::post('/apply_land',[mainController::class, 'applyland']);

    Route::get('add-to-cart/{id}', [mainController::class, 'addToCart'])->name('add.to.cart');
    Route::get('cart', [mainController::class, 'cart'])->name('cart');
    Route::delete('remove-from-cart', [mainController::class, 'remove'])->name('remove.from.cart');
    Route::patch('update-cart', [mainController::class, 'update'])->name('update.cart');
    Route::post('checkout', [mainController::class, 'ordersuccess']);

    Route::get('/recently orders', [mainController::class, 'recently']);
    Route::get('/single house_design/{id}',  [mainController::class, 'singlehouse']);
Route::get('/order_house_design/{id}',  [mainController::class, 'orderhouse']);
Route::post('/complete_house_design_order', [mainController::class, 'finalorder']);

Route::post('/upload_property', [mainController::class, 'property']);
Route::post('/post_land_shop', [mainController::class, 'post_land_shop']);


});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/admin_login_log',[adminAuthcontroller::class, 'check']);

    Route::get('/Admin_login',[adminAuthcontroller::class, 'login']);
   

Route::group(['middleware'=>"adminauth"],function(){

    Route::view('/Admin', '/admin/dashboard');
    Route::get('/Admin_logout',[adminAuthcontroller::class, 'logout']);
    Route::post('/Admin_register_save',[adminAuthcontroller::class, 'save']);

    Route::get('/Admin_register',[adminAuthcontroller::class, 'register']);
    Route::get('/admin/dashboard',[adminAuthcontroller::class, 'dashboard']);
   
    Route::get('/Admin_profile',[adminAuthcontroller::class,'profile']);

        //admin section
    Route::view('/Admin/house designs', '/admin/house_designs/house_designs');
    Route::view('/Admin/add_house designs', '/admin/house_designs/add_house_designs');
    Route::post('/add_house_designs',[house_designCon::class ,'Add']);
    Route::get('/Admin/house designs',[house_designCon::class ,'show']);
    Route::get('/Admin/edit_design/{id}',[house_designCon::class ,'edit']);
    Route::get('/Admin/delete_design/{id}',[house_designCon::class ,'delete']);
    Route::post('/update_design',[house_designCon::class ,'update']);

    Route::view('/Admin/products', '/admin/products/products');
    Route::view('/Admin/add_products', '/admin/products/add_products');
    Route::get('/Admin/add_products', [productCon::class ,'category']);
    Route::post('/add_products',[productCon::class ,'Add']);
    Route::get('/Admin/products',[productCon::class ,'show']);
    Route::get('/Admin/edit_products/{id}',[productCon::class ,'edit']);
    Route::get('/Admin/delete_products/{id}',[productCon::class ,'delete']);
    Route::get('/Admin/popular_products/{id}',[productCon::class ,'popular']);
    Route::post('/update_product',[productCon::class ,'update']);

    Route::view('/Admin/category', '/admin/category/category');
    Route::view('/Admin/add_category', '/admin/category/add_category');
    Route::post('/add_category',[categoryCon::class ,'Add']);
    Route::get('/Admin/category',[categoryCon::class ,'show']);
    Route::get('/Admin/edit_category/{id}',[categoryCon::class ,'edit']);
    Route::get('/Admin/delete_category/{id}',[categoryCon::class ,'delete']);
    Route::post('/update_category',[categoryCon::class ,'update']);

    Route::view('/Admin/realstate', '/admin/realstate/realstate');
    Route::view('/Admin/add_realstate', '/admin/realstate/add_realstate');
    Route::post('/Admin/add_realstate',[realstateCon::class ,'Add']);
    Route::get('/Admin/realstate',[realstateCon::class ,'show']);
    Route::get('/Admin/edit_realstate/{id}',[realstateCon::class ,'edit']);
    Route::get('/Admin/delete_realstate/{id}',[realstateCon::class ,'delete']);
    Route::post('/update_realstate',[realstateCon::class ,'update']);
    Route::get('/Admin/popular_realstate/{id}',[realstateCon::class ,'popular']);


    Route::view('/Admin/land-shoter', '/admin/land_shoter/land_shoter');
    Route::view('/Admin/add_land_shoter', '/admin/land_shoter/add_land_shoter');
    Route::post('/Admin/add_land_shoter',[land_shoterCon::class ,'Add']);
    Route::get('/Admin/land-shoter',[land_shoterCon::class ,'show']);
    Route::get('/Admin/edit_land_shoter/{id}',[land_shoterCon::class ,'edit']);
    Route::get('/Admin/delete_land_shoter/{id}',[land_shoterCon::class ,'delete']);
    Route::post('/update_land_shoter',[land_shoterCon::class ,'update']);


    Route::view('/Admin/slider', '/admin/slider/slider');
    Route::view('/Admin/slider', '/admin/slider/slider');
    Route::post('/slider-img',[sliderCon::class ,'Add']);
    Route::get('/Admin/slider',[sliderCon::class ,'show']);
    Route::get('/Admin/edit_slider/{id}',[sliderCon::class ,'edit']);
    Route::get('/Admin/delete_slider/{id}',[sliderCon::class ,'delete']);
    Route::post('/update_slider',[sliderCon::class ,'update']);

    Route::view('/Admin/product_order', '/admin/orders/product_order');
    Route::get('/Admin/product_order',[product_orderCon::class ,'show']);
    Route::get('/Admin/conform/{id}',[product_orderCon::class ,'conform']);
    Route::get('/Admin/print_order/{id}',[product_orderCon::class ,'print']);
    Route::get('/Admin/delete_order/{id}',[product_orderCon::class ,'delete']);
   
    Route::get('/Admin/realstate_orders',[property_orderCon::class ,'show']);
    Route::get('/Admin/conform-realstate/{id}',[property_orderCon::class ,'conform']);
    Route::get('/Admin/delete_realstate_order/{id}',[property_orderCon::class ,'delete']);

    Route::get('/Admin/house_design_order',[house_design_orderCon::class ,'show']);
    Route::get('/Admin/conform-house_design_order/{id}',[house_design_orderCon::class ,'conform']);
    Route::get('/Admin/delete-house_design_order/{id}',[house_design_orderCon::class ,'delete']);

    Route::get('/Admin/land_shoter_orders',[land_shoter_ordersCon::class ,'show']);
    Route::get('/Admin/conform-land_shoter_order/{id}',[land_shoter_ordersCon::class ,'conform']);
    Route::get('/Admin/delete-land_shoter_order/{id}',[land_shoter_ordersCon::class ,'delete']);


});