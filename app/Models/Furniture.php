<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Furniture extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'furniture';

    protected $dates = ['deleted_at'];

    public function transaction()
    {
        return $this->belongsToMany(Transaction::class);
    }
    public function transactionDetail()
    {
        return $this->hasMany(Transaction::class);
    }
}
