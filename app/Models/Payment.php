<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\House;
use App\Models\Resident;
use Illuminate\Support\Facades\DB;

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
        return $this->belongsto(PaymentMode::class,'payment_modes_id', 'id');
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

    public function scopesortedData($query, $payments)
    {
        return $query->select('payments.*', 'houses.full_address')
        ->whereIn('payments.id', $payments)
        ->join('houses', 'payments.house_id', '=', 'houses.id')
        ->orderBy('houses.block1', 'ASC')
        ->orderBy('houses.block2', 'ASC')
        ->orderBy('houses.house_no', 'ASC');
}
}
