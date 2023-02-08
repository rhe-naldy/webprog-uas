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
        $count = count($carts);
        $total = 0;
        foreach($carts as $cart){
            $total += $cart->price;
        }
        return view('cart')->with('carts', $carts)->with('count', $count)->with('total', $total);
    }

    public function deleteItemFromCart($order_id){
        $item = Order::find($order_id);
        $item->delete();

        return redirect('/cart');
    }

    public function checkOut(){
        $account_id = Auth::user()->account_id;
        $order = Order::where('account_id', 'LIKE', "$account_id");

        $order->delete();

        return view('success');
    }
}
