<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public static function addItemToCart($item_id, $price){
        $account_id = Auth::user()->account_id;

        Order::insert([
            'account_id' => $account_id,
            'item_id' => $item_id,
            'price' => $price
        ]);
    }

    public function viewCartPage(){
        $account_id = Auth::user()->account_id;
        $carts = Order::where('account_id', 'LIKE', "$account_id")->get();

        return view('cart')->with('carts', $carts);
    }

    public function deleteItemFromCart($item_id){
        $account_id = Auth::user()->account_id;
        $item = Order::where('account_id', 'LIKE', "$account_id")->where('item_id', 'LIKE', "$item_id");
        $item->delete();

        return redirect()->back();
    }

    public function checkOut(){
        $account_id = Auth::user()->account_id;
        $order = Order::where('account_id', 'LIKE', "$account_id")->get();

        $order->delete();

        return view('success');
    }
}
