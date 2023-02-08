<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public static function getAllRoles(){
        $roles = Role::all();

        return $roles;
    }
}
