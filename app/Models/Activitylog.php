<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Module;


class Activitylog extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id' ,
        'action',
        'module_id',
        'module_item_id' ,
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

}
