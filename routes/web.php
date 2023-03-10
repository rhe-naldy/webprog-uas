<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

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

Route::get('/{locale?}', function ($locale = null) {
    if (isset($locale) && in_array($locale, config('app.available_locales'))) {
        App::setLocale($locale);
    }

    return redirect('/{locale}/index');
});

Route::get('/lang/{locale}', function ($locale) {
    App::setLocale($locale);
    Session::put('locale', $locale);

    return redirect()->back();
});

Route::get('/{locale}/index', [AccountController::class, 'checkAuth']);
Route::get('/{locale}/login', [AccountController::class, 'viewLoginPage']);
Route::post('/login', [AccountController::class, 'login']);
Route::get('/{locale}/register', [AccountController::class, 'viewRegisterPage']);
Route::post('/register', [AccountController::class, 'register']);
Route::get('/{locale}/logout', [AccountController::class, 'viewLogoutPage']);
Route::post('/logout', [AccountController::class, 'logout'])->middleware('registered');

Route::get('/{locale}/home', [ItemController::class, 'viewHomePage'])->middleware('registered');
Route::get('/{locale}/item/{item_id}', [ItemController::class, 'viewItemDetail'])->middleware('registered');
Route::post('/buy-item/{item_id}', [ItemController::class, 'buyItem'])->middleware('registered');

Route::get('/{locale}/profile', [AccountController::class, 'viewProfilePage'])->middleware('registered');
Route::patch('/update-profile', [AccountController::class, 'updateProfile'])->middleware('registered');
Route::get('/{locale}/update-success', [AccountController::class, 'viewSuccessPage'])->middleware('registered');

Route::get('/{locale}/maintenance', [AccountController::class, 'viewMaintenancePage'])->middleware('admin');
Route::get('/{locale}/update-role/{account_id}', [AccountController::class, 'viewUpdateRolePage'])->middleware('admin');
Route::patch('/update-role/{account_id}', [AccountController::class, 'updateRole'])->middleware('admin');
Route::delete('/delete-account/{account_id}', [AccountController::class, 'deleteAccount'])->middleware('admin');

Route::get('/{locale}/cart', [OrderController::class, 'viewCartPage'])->middleware('registered');
Route::delete('/delete-from-cart/{order_id}', [OrderController::class, 'deleteItemFromCart'])->middleware('registered');
Route::delete('/check-out', [OrderController::class, 'checkOut'])->middleware('registered');
