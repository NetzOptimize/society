<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Payment;

class House extends Model
{
    use HasFactory;

    protected $fillable =[

        'society_id',
        'name',
        'image',
        'capacity',
        'address',
        'house_no',
        'owner',
        'resident',
        'dateofjoined',
        'bedrooms',
        'bathrooms',
        'squarefootage',
        'membership',
        'payment_status',
        'owner_id',
        'resident_id'
    ];

    public function society()
    {
        return $this->belongsTo(Society::class);
    }

    public function residents()
    {
        return $this->hasMany(Resident::class, 'house_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'residents')->withPivot('isOwner', 'datofoccupancy');
    }

    public function scopeAddress($query, $houseid)
    {
        return $query->where('id', $houseid)->first();
    }

    public function scopeSearch($query, $house)
    {
        return $query->where('full_address','Like' ,'%'.$house.'%')->get();
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
