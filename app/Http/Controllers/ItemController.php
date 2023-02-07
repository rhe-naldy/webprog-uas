<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function viewHomePage(){
        $items = Item::paginate(10);

        return view('home')->with('items', $items);
    }

    public function viewItemDetail($item_id){
        $item = Item::find($item_id);

        return view('view-item')->with('item', $item);
    }

    public function buyItem($item_id){
        $item = Item::find($item_id);

        OrderController::addItemToCart($item_id, $item->price);

        return redirect('/home');
    }
}
