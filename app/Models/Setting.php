<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Setting extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'company',
        'address',
        'company_phone',
        'company_email',
        'name',
        'email',
        'phone',
        'quote',
        'logo',
        'user_id'
    ];
}
