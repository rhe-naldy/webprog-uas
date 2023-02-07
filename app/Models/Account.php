<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['role_id', 'gender_id', 'first_name', 'last_name', 'email', 'display_picture_link', 'password'];

    protected $primaryKey = 'account_id';

    public function gender(){
        return $this->belongsTo(Gender::class, "gender_id", "gender_id");
    }

    public function role(){
        return $this->belongsTo(Role::class, "role_id", "role_id");
    }

    public function orders(){
        return $this->belongsToMany(Item::class, "orders", "account_id", "item_id");
    }
}
