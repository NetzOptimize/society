<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\House;
use App\Models\Resident;

class Payment extends Model
{
    use HasFactory;

    protected $fillable=[
        'house_id',
        'billingmonth',
        'payment_modes_id',
        'dateofdeposit',
        'amount',
    ];

    public function houses()
    {
        return $this->belongsTo(House::class,'house_id', 'id');
    }

    public function paymentmode()
    {
        return $this->belongsto(paymentmode::class,'payment_modes_id', 'id');
    }

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }

    public function scopeMonthlyfilter($query, $month)
    {
        return $query->where('billingmonth', $month)->get();
    }

    public function scopeDatebetween($query, $start, $end)
    {
        return $query->whereBetween(
            \DB::raw("STR_TO_DATE(billingmonth, '%d-%m-%Y')"),
            [date('Y-m-d', strtotime($start)), date('Y-m-d', strtotime($end))]
        )->get();
    }

}
