<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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
Route::get('/home',[HomeController::class,"homeview"]);
Route::get('/login',[HomeController::class,"loginview"]);
Route::get('/login{id}',[HomeController::class,"logout"]);
Route::get('/dn',[HomeController::class,"dangnhap"]);
Route::get('/dk',[HomeController::class,"dangky"]);
Route::get('/dt',[HomeController::class,"data"]);
Route::get('/ct',[HomeController::class,"chitiet"]);
Route::get('/shop',[HomeController::class,"Shopview"]);
Route::get('/cats{id}',[HomeController::class,"Catogories"]);
Route::get('/brands{id}',[HomeController::class,"Brands"]);
Route::get('/ct{id}',[HomeController::class,"details"]);
Route::get('/tk',[HomeController::class,"timkiem"]);
Route::get('/gh',[HomeController::class,"getcart"]);
Route::get('/gh{id}',[HomeController::class,"addcart"]);
Route::get('/del',[HomeController::class,"xoatoanbo"]);
Route::get('/tt',[HomeController::class,"checkoutview"]);
Route::get('/update{id}',[HomeController::class,"capnhatgh"]);
Route::get('/ttoan',[HomeController::class,"thanhtoan"]);
Route::get('/delProduct{id}',[HomeController::class,"delProduct"]);


