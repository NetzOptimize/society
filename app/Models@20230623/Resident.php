<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\House;
use App\Models\User;
use App\Models\Payment;

class Resident extends Model
{

    use HasFactory;

    protected $fillable =[
        'user_id',
        'house_id',
        'isOwner',
        'datofoccupancy'
    ];

    public function scopeRecordExist($query, $record)
    {
        return $query->where('user_id', $record['user_id'])
                    ->where('house_id', $record['house_id'])
                    ->where('isOwner', $record['isOwner']);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function house()
    {
        return $this->belongsTo(House::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
