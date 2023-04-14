<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Usertype;
use App\Models\House;
use App\Models\Resident;
use App\Models\Payment;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    Const ADMIN = 1;
    Const RESIDENT = 2;
    Const MODERATOR = 3;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile1',
        'mobile2',
        'usertype_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function usertype()
    {
        return $this->belongsTo(Usertype::class);
    }

    public function houses()
    {
        return $this->belongsToMany(House::class, 'residents')->withPivot('isOwner', 'datofoccupancy');
    }

    public function residents()
    {
        return $this->hasMany(Resident::class);
    }

    public function payments()
    {
        return $this->hasManyThrough(Payment::class, Resident::class,'user_id', 'house_id', 'id','house_id');
    }

    public function scopesearch($query, $search)
    {
        return $query->where('name', 'Like' ,$search.'%')
            ->orwhere('mobile1', 'Like', '%'.$search.'%')->get();
    }
}
