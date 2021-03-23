<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//frontend
Route::get('/','App\Http\Controllers\frontend\DefaultController@index')->name('homepage');
Route::get('/about','App\Http\Controllers\frontend\AboutController@index')->name("about");
Route::get('/contact','App\Http\Controllers\frontend\ContactController@index')->name('contact');
Route::post('/contact','App\Http\Controllers\frontend\ContactController@store')->name('contact-post');
Route::get('/account','App\Http\Controllers\frontend\AccountController@index')->name('account');
Route::post('/account/{id}','App\Http\Controllers\frontend\AccountController@update')->name('user.address.update');
Route::post('/account/password/{id}','App\Http\Controllers\frontend\AccountController@store')->name('user.info.update');

//pages
Route::get('/privacy', function () {return view('frontend.pages.privacy');})->name('privacy');
Route::get('/contract', function () {return view('frontend.pages.contract');})->name('contract');
Route::get('/withdrawal', function () {return view('frontend.pages.withdrawal');})->name('withdrawal');

//reservation
Route::get('/reservation','App\Http\Controllers\frontend\ReservationController@index')->name('reservation');
Route::post('/reservation','App\Http\Controllers\frontend\ReservationController@store')->name('reservationpost');

//product
Route::get('/products','App\Http\Controllers\frontend\ProductsController@index')->name("products");
Route::get('/products/{slug}','App\Http\Controllers\frontend\ProductsController@detail')->name("product");
Route::get('/search','App\Http\Controllers\frontend\ProductsController@search')->name("search");
{
//cart
Route::get('/cart','App\Http\Controllers\frontend\CartController@index')->name("cart");
Route::delete('/cart/{product}','App\Http\Controllers\frontend\CartController@destroy')->name("cart.destroy");
Route::patch('/cart/{product}','App\Http\Controllers\frontend\CartController@update')->name("cart.update");
Route::post('/cart','App\Http\Controllers\frontend\CartController@store')->name("cart.store");
Route::get('empty',function (){
    Cart::destroy();
});

//checkout
Route::get('/checkout','App\Http\Controllers\frontend\CheckoutController@index')->name("checkout")->middleware('auth');
Route::post('/checkout','App\Http\Controllers\frontend\CheckoutController@store')->name("checkout.store")->middleware('auth');

//confirmation
    Route::get('/confirmation', function () {return view('frontend.pages.confirmation');})->name('confirmation');


//Backend
//login
Route::get('nedmin','App\Http\Controllers\Backend\DefaultController@login')->name('nedmin.Login');
Route::post('nedmin/login','App\Http\Controllers\Backend\DefaultController@authenticate')->name('nedmin.Authenticate');
Route::get('nedmin/logout', 'App\Http\Controllers\Backend\DefaultController@logout')->name('nedmin.Logout');
Route::middleware('admin')->group(function () {


//index
    Route::get('nedmin/dashboard', 'App\Http\Controllers\Backend\DefaultController@index')->name('nedmin.Index');



//reservation
    Route::get('nedmin/reservations','App\Http\Controllers\Backend\ReservationController@index')->name('nedmin-reservation');
    Route::get('nedmin/reservations/delete/{id}', 'App\Http\Controllers\Backend\ReservationController@destroy');

//messages
    Route::get('nedmin/messages','App\Http\Controllers\Backend\MessagesController@index')->name('nedmin-messages');
    Route::get('nedmin/messages/delete/{id}', 'App\Http\Controllers\Backend\MessagesController@destroy');
//order
    Route::get('nedmin/orders','App\Http\Controllers\Backend\OrdersController@index')->name('nedmin-order');
    Route::get('nedmin/order/detail/{id}','App\Http\Controllers\Backend\OrdersController@detail')->name('order.product');
    Route::get('nedmin/order/delete/{id}', 'App\Http\Controllers\Backend\OrdersController@destroy');

//settings
    Route::get('nedmin/settings', 'App\Http\Controllers\Backend\SettingsController@index')->name('setting.Index');
    Route::post('nedmin/settings/sortable', 'App\Http\Controllers\Backend\SettingsController@sortable')->name('settings.Sortable');
    Route::get('nedmin/settings/delete/{id}', 'App\Http\Controllers\Backend\SettingsController@destroy');
    Route::get('nedmin/settings/edit/{id}', 'App\Http\Controllers\Backend\SettingsController@edit')->name('edit.Settings');
    Route::post('nedmin/update/{id}', 'App\Http\Controllers\Backend\SettingsController@update')->name('settings.Update');
    Route::get('nedmin/settings/create', 'App\Http\Controllers\Backend\SettingsController@create')->name('settings.Create');
    Route::post('nedmin/settings/store', 'App\Http\Controllers\Backend\SettingsController@store')->name('settings.Store');

//products
    Route::resource('nedmin/products', 'App\Http\Controllers\Backend\ProductsController');
    Route::post('nedmin/products/sortable', 'App\Http\Controllers\Backend\ProductsController@sortable')->name('products.Sortable');

//slider
    Route::resource('nedmin/slider', 'App\Http\Controllers\Backend\SliderController');
    Route::post('nedmin/slider/sortable', 'App\Http\Controllers\Backend\SliderController@sortable')->name('slider.Sortable');

//category
    Route::resource('nedmin/category', 'App\Http\Controllers\Backend\CategoryController');
    Route::post('nedmin/category/sortable', 'App\Http\Controllers\Backend\CategoryController@sortable')->name('category.Sortable');

//team
    Route::resource('nedmin/team', 'App\Http\Controllers\Backend\TeamsController');
    Route::post('nedmin/team/sortable', 'App\Http\Controllers\Backend\TeamsController@sortable')->name('team.Sortable');

//user
    Route::resource('nedmin/user', 'App\Http\Controllers\Backend\UserController');
    Route::post('nedmin/user/sortable', 'App\Http\Controllers\Backend\UserController@sortable')->name('user.Sortable');
});
//auth
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
}
