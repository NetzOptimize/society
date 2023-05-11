<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Payment;
use App\Models\Expense;
use App\Models\Module;
use Illuminate\Support\Facades\DB;



class Activitylog extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id' ,
        'action',
        'module_id',
        'module_item_id' ,
        'created_at'
    ];

    protected $table='activity_logs';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class,'module_item_id','id');
    }
    public function expense()
    {
        return $this->belongsTo(Expense::class,'module_item_id','id');
    }

    public function scopeDatebetween($query, $start, $end)
    {
        return $query->wherebetween('created_at',[$start, $end])->get();
    }
}
