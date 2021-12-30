<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $table = 'transaction_detail';

    protected $fillable = [
        'furniture_id',
        'transaction_id',
        'qty',
        'price'
    ];


    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
    public function furniture()
    {
        return $this->belongsTo(Furniture::class, 'furniture_id')->withTrashed();
    }
}
