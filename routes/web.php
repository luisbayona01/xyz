<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');



Route::post('/auth/logear',[App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'Logout'])->name('logout')->middleware('auth');
//Route::post('logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout')->middleware('auth');

Route::get('register', [App\Http\Controllers\Auth\RegisterController::class,'showRegistrationForm'])->name('register');

Route::post('register', [App\Http\Controllers\Auth\RegisterController::class,'register']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/productos',[App\Http\Controllers\ProductoController::class,'index'])->middleware('auth');


Route::get('/factura/cantidadproductosA',[App\Http\Controllers\FacturaController::class,'cantidadproductos']);
Route::post('/factura/addproduct',[App\Http\Controllers\FacturaController::class,'store']);
Route::get('/factura',[App\Http\Controllers\FacturaController::class,'index']);
Route::get('/factura/listdata',[App\Http\Controllers\FacturaController::class,'listdata']);
Route::post('/factura/actualizadata',[App\Http\Controllers\FacturaController::class,'update']);
Route::post('/factura/delete/{id}',[App\Http\Controllers\FacturaController::class,'destroy']);
