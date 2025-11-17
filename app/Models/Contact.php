<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'event_type',
        'guests',
        'city',
        'location',
        'date',
        'observations',
        'type', // 'contact' or 'budget'
    ];

    protected $casts = [
        'date' => 'date',
        'guests' => 'integer',
    ];
}

