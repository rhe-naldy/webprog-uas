<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['account_id', 'item_id', 'price'];

    protected $primaryKey = 'order_id';

    public function account(){
        return $this->belongsTo(Account::class, "account_id", "account_id");
    }

    public function item(){
        return $this->belongsTo(Item::class, "item_id", "item_id");
    }
}
