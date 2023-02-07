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
}
