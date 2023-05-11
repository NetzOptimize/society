<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class Expense extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable=[
        'payee' ,
        'amount',
        'comments',
        'payment_modes_id' ,
        'dateofpayment' ,
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*']);

    }

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
    public function scopeDatebetween($query, $start, $end)
    {
        return $query->whereBetween(
            \DB::raw("STR_TO_DATE(dateofpayment, '%d-%m-%Y')"),
            [date('Y-m-d', strtotime($start)), date('Y-m-d', strtotime($end))]
        )->get();
    }
}
