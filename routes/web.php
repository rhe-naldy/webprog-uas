<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
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

Route::get('/', [AccountController::class, 'checkAuth']);
Route::get('/login', [AccountController::class, 'viewLoginPage']);
Route::post('/login', [AccountController::class, 'login']);
Route::get('/register', [AccountController::class, 'viewRegisterPage']);
Route::post('/register', [AccountController::class, 'register']);
Route::post('/logout', [AccountController::class, 'logout']);
Route::get('/home', [ItemController::class, 'viewHomePage']);
Route::get('/item/{item_id}', [ItemController::class, 'viewItemDetail']);
Route::post('/buy-item/{item_id}', [ItemController::class, 'buyItem']);
Route::get('/profile', [AccountController::class, 'viewProfilePage']);
Route::get('/manage', [AccountController::class, 'viewMaintenancePage']);

Route::get('/cart', [OrderController::class, 'viewCartPage']);
Route::delete('/delete-from-cart/{order_id}', [OrderController::class, 'deleteItemFromCart']);
Route::delete('/check-out', [OrderController::class, 'checkOut']);
