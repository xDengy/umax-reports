<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Report extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'link',
        'dateStart',
        'dateEnd',
        'color',
        'logo',
        'name',
        'email',
        'phone',
        'quote',
        'photo',
        'user_id',
    ];
}
