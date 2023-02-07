<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function viewHomePage(){
        $items = Item::paginate(10);

        return view('home')->with('items', $items);
    }
}
