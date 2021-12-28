<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    use HasFactory;

    public function transaction()
    {
        return $this->belongsToMany(Transaction::class);
    }
    public function transactionDetail(){
        return $this->hasMany(Transaction::class);
    }
}
