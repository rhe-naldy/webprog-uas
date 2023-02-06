<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['account_id', 'item_id', 'price'];

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
