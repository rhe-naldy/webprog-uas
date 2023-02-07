<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['role_name'];

    protected $primaryKey = 'role_id';

    public function accounts(){
        return $this->hasMany(Account::class, "role_id", "role_id");
    }
}
