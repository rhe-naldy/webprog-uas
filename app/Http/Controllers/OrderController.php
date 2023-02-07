<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function viewCartPage(){
        $account_id = Auth::user()->account_id;
        $items = Order::where('account_id', 'LIKE', "$account_id")->get();

        return view('cart')->with('items', $items);
    }

    public function deleteItemFromCart($item_id){
        $account_id = Auth::user()->account_id;
        $item = Order::where('account_id', 'LIKE', "$account_id")->where('item_id', 'LIKE', "$item_id")->get();
        $item->delete();

        return redirect()->back();
    }
}
