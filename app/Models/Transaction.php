<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';
    protected $guarded = [];

    protected $fillable = [
        'users_id',
        'method',
        'cardNumber',
        'total_price'
    ];

    public function furniture()
    {
        return $this->hasMany(Furniture::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
