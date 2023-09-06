<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


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
        return $this->belongsto(PaymentMode::class,'payment_modes_id', 'id');
    }
    public function scopeSort($query, $sort)
    {
        if($sort == 'Ascending')
        {
            return $query->orderBy(DB::raw("STR_TO_DATE(dateofpayment, '%d-%m-%Y')"), 'asc')->get();
        }
        return $query->orderBy(DB::raw("STR_TO_DATE(dateofpayment, '%d-%m-%Y')"), 'desc')->get();
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('payee', 'LIKE', '%'.$search.'%')->get();
    }
}
