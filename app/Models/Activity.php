<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table="activity_log";

    public function scopeUsername()
    {
        return User::where('id', $this->causer_id)->value('name');
    }

    public function scopeUsermobile()
    {
        return User::where('id', $this->causer_id)->value('mobile1');
    }

    public function paymentmode($id)
    {
        return PaymentMode::where('id',$id)->value('name');
    }
    public function house($id)
    {
        return House::where('id',$id)->value('full_address');
    }
}



