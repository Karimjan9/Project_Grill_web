<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/adminmenu',[App\Http\Controllers\Controller::class, 'index'])->middleware(['admin']);

Route::get('/allproducts',[App\Http\Controllers\Controller::class, 'allproducts'])->middleware(['admin']);

Route::get('/menuproducts',[App\Http\Controllers\Controller::class, 'products'])->middleware(['admin']);

Route::get('/edit_product/{id}',[App\Http\Controllers\Controller::class, 'edit_product']);

Route::post('/change_product/{id}',[App\Http\Controllers\Controller::class, 'change_product']);

Route::post('/send',[App\Http\Controllers\Controller::class, 'send']);

Route::get('/delete_product/{id}' ,[App\Http\Controllers\Controller::class, 'delete_product']);

Route::get('/allusers',[App\Http\Controllers\UserController::class, 'allusers']);

Route::get('/edit_user/{id}',[App\Http\Controllers\UserController::class, 'edit_user']);

Route::post('/change_user/{id}',[App\Http\Controllers\UserController::class,'change_user']);

Route::post('/delete_user/{id}',[App\Http\Controllers\UserController::class,'delete_user']);

Route::get('/menu',[App\Http\Controllers\Controller::class, 'menu']);

Route::get('/menu2/{id}',[App\Http\Controllers\Controller::class, 'menu2']);

Route::get('/korzinka/{id}',[App\Http\Controllers\Controller::class, 'korzinka']);

Route::post('/korzinka_database',[App\Http\Controllers\Controller::class, 'korzinka_database']);

Route::get('/delete_product_by_id/{id}',[App\Http\Controllers\Controller::class,'delete_by_id']);

Route::post('/total_cost',[App\Http\Controllers\Controller::class,'total_cost']);