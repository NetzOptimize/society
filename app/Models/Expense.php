<?php



namespace App\Models;



use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

use Spatie\Activitylog\Traits\LogsActivity;

use Spatie\Activitylog\LogOptions;



use App\Models\User;

use App\Models\Activitylog;



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

    public function scopeSort($query, $sort, $start , $end, $month)
    {
        if($sort == 'Ascending')
        {
            if(!empty($start)  && !empty($end))
            {
                return $query->whereBetween(
                    \DB::raw("STR_TO_DATE(dateofpayment, '%d-%m-%Y')"),
                    [date('Y-m-d', strtotime($start)), date('Y-m-d', strtotime($end))]
                )->orderBy(\DB::raw("STR_TO_DATE(dateofpayment, '%d-%m-%Y')"), 'asc')->get();

            }
            if(!empty($month))
            {
                if($month == 'All')
                {
                    return $query->orderBy(\DB::raw("STR_TO_DATE(dateofpayment, '%d-%m-%Y')"), 'asc')->get();
                }
                $start = Carbon::createFromFormat('d-m-Y', $month)->startOfMonth();
                $end = $start->copy()->endOfMonth();

                return $query->whereBetween(
                    \DB::raw("STR_TO_DATE(dateofpayment, '%d-%m-%Y')"),
                    [date('Y-m-d', strtotime($start)), date('Y-m-d', strtotime($end))]
                )->orderBy(\DB::raw("STR_TO_DATE(dateofpayment, '%d-%m-%Y')"), 'asc')->get();
            }
            return $query->whereBetween(\DB::raw("STR_TO_DATE(dateofpayment, '%d-%m-%Y')"), [
                Carbon::now()->startOfMonth()->format('Y-m-d'),
                Carbon::now()->endOfMonth()->format('Y-m-d')
            ])->orderBy(\DB::raw("STR_TO_DATE(dateofpayment, '%d-%m-%Y')"), 'asc')->get();


        }
        else
        {
            if(!empty($start)  && !empty($end))
            {
                return $query->whereBetween(
                    \DB::raw("STR_TO_DATE(dateofpayment, '%d-%m-%Y')"),
                    [date('Y-m-d', strtotime($start)), date('Y-m-d', strtotime($end))]
                )->orderBy(\DB::raw("STR_TO_DATE(dateofpayment, '%d-%m-%Y')"), 'desc')->get();

            }
            if(!empty($month))
            {
                if($month == 'All')
                {
                    return $query->orderBy(\DB::raw("STR_TO_DATE(dateofpayment, '%d-%m-%Y')"), 'desc')->get();
                }
                $start = Carbon::createFromFormat('d-m-Y', $month)->startOfMonth();
                $end = $start->copy()->endOfMonth();

                return $query->whereBetween(
                    \DB::raw("STR_TO_DATE(dateofpayment, '%d-%m-%Y')"),
                    [date('Y-m-d', strtotime($start)), date('Y-m-d', strtotime($end))]
                )->orderBy(\DB::raw("STR_TO_DATE(dateofpayment, '%d-%m-%Y')"), 'desc')->get();
            }
            return $query->whereBetween(\DB::raw("STR_TO_DATE(dateofpayment, '%d-%m-%Y')"), [
                Carbon::now()->startOfMonth()->format('Y-m-d'),
                Carbon::now()->endOfMonth()->format('Y-m-d')
            ])->orderBy(\DB::raw("STR_TO_DATE(dateofpayment, '%d-%m-%Y')"), 'desc')->get();
        }

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
        )->orderBy(\DB::raw("STR_TO_DATE(dateofpayment, '%d-%m-%Y')"), 'asc')->get();

    }
    public function scopeMonthlyfilter($query, $month)
    {
        $start = Carbon::createFromFormat('d-m-Y', $month)->startOfMonth();
        $end = $start->copy()->endOfMonth();

        return $query->whereBetween(
            \DB::raw("STR_TO_DATE(dateofpayment, '%d-%m-%Y')"),
            [date('Y-m-d', strtotime($start)), date('Y-m-d', strtotime($end))]
        )->orderBy(\DB::raw("STR_TO_DATE(dateofpayment, '%d-%m-%Y')"), 'asc')->get();
    }


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

}

