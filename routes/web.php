<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Session;

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


Route::get('/', function (){
    $locale = 'en';
    App::setLocale($locale);
    Session::put('locale', $locale);

    return redirect('/'.$locale);
});

Route::get('/{locale}', function ($locale){
    App::setLocale($locale);
    Session::put('locale', $locale);

    return redirect()->back();
});

Route::get('/{locale}', [AccountController::class, 'checkAuth']);
Route::get('/{locale}/login', [AccountController::class, 'viewLoginPage']);
Route::post('/{locale}/login', [AccountController::class, 'login']);
Route::get('/{locale}/register', [AccountController::class, 'viewRegisterPage']);
Route::post('/{locale}/register', [AccountController::class, 'register']);
Route::get('/{locale}/logout', [AccountController::class, 'viewLogoutPage'])->middleware('registered');
Route::post('/{locale}/logout', [AccountController::class, 'logout'])->middleware('registered');

Route::get('/{locale}/home', [ItemController::class, 'viewHomePage'])->middleware('registered');
Route::get('/{locale}/item/{item_id}', [ItemController::class, 'viewItemDetail'])->middleware('registered');
Route::post('/{locale}/buy-item/{item_id}', [ItemController::class, 'buyItem'])->middleware('registered');

Route::get('/{locale}/profile', [AccountController::class, 'viewProfilePage'])->middleware('registered');
Route::patch('/{locale}/update-profile', [AccountController::class, 'updateProfile'])->middleware('registered');
Route::get('/{locale}/update-success', [AccountController::class, 'viewSuccessPage'])->middleware('registered');

Route::get('/{locale}/maintenance', [AccountController::class, 'viewMaintenancePage'])->middleware('admin');
Route::get('/{locale}/update-role/{account_id}', [AccountController::class, 'viewUpdateRolePage'])->middleware('admin');
Route::patch('/{locale}/update-role/{account_id}', [AccountController::class, 'updateRole'])->middleware('admin');
Route::delete('/{locale}/delete-account/{account_id}', [AccountController::class, 'deleteAccount'])->middleware('admin');

Route::get('/{locale}/cart', [OrderController::class, 'viewCartPage'])->middleware('registered');
Route::delete('/{locale}/delete-from-cart/{order_id}', [OrderController::class, 'deleteItemFromCart'])->middleware('registered');
Route::delete('/{locale}/check-out', [OrderController::class, 'checkOut'])->middleware('registered');
