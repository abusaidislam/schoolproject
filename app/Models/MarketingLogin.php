<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Foundation\Auth\User as Authenticatable;

class MarketingLogin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;
    protected $table = 'marketing_logins'; 
    protected $fillable = [
        'user_name',
        'password',
        'text_password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

}

