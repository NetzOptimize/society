<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    public $timestamps = false;
    protected $table = 'password_reset_tokens';
    protected $fillable = [
        'email',
        'token',
        'expires_at',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
