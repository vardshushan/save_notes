<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountCredential extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'phone_number',
        'email',
        'token',
        'password',
        'other',
        'user_id'
    ];
}
