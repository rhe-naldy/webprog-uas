<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['item_name', 'item_desc', 'price'];

    protected $primaryKey = 'item_id';

    public function orders(){
        return $this->belongsToMany(Account::class, "orders", "item_id", "account_id");
    }
}
