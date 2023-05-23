<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\House;
use App\Models\Resident;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Carbon\Carbon;

class Payment extends Model
{
    use HasFactory,LogsActivity;

    protected $fillable=[
        'house_id',
        'billingmonth',
        'payment_modes_id',
        'dateofdeposit',
        'amount',
        'comments'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*']);

    }

    public function housename()
    {
        return House::where('id',$this->house_id)->value('full_address');
    }
    // public function doneby()
    // {
    //     return $this->hasManyThrough(
    //         User::class,
    //         Activitylog::class,
    //         'subject_id',
    //         'id',
    //         'id',
    //         'causer_id'
    //     )->latest('activity_log.created_at');
    // }
    public function doneby()
    {
        return $this->hasManyThrough(
            User::class,
            Activitylog::class,
            'subject_id',
            'id',
            'id',
            'causer_id'
        )->latest('activity_log.created_at');
    }
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
            \DB::raw("STR_TO_DATE(dateofdeposit, '%d-%m-%Y')"),
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

    public function scopeSort($query, $sort)
    {
        if($sort == 'Ascending')
        {
           return $query->where('billingmonth',Carbon::now()->startOfMonth()->format('d-m-Y'))
                        ->orderByRaw("STR_TO_DATE(dateofdeposit, '%d-%m-%y') ASC")->get();
        }
        return $query->where('billingmonth',Carbon::now()->startOfMonth()->format('d-m-Y'))
                    ->orderByRaw("STR_TO_DATE(dateofdeposit, '%d-%m-%y') DESC")->get();

    }

    public function Owner()
    {
        return $this->hasOneThrough(
            User::class,
            Resident::class,
            'house_id',
            'id',
            'house_id',
            'user_id'
        );
    }


}
