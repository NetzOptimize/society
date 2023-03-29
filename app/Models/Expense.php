<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable=[
        'payee' ,
        'amount',
        'comments',
        'payment_modes_id' ,
        'dateofpayment' ,
    ];
    public function paymentmode()
    {
        return $this->belongsto(paymentmode::class,'payment_modes_id', 'id');
    }
}
