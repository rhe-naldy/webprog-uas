<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gender;

class GenderController extends Controller
{
    public static function getAllGenders(){
        $genders = Gender::all();

        return $genders;
    }
}
