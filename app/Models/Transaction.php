<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['time_from','time_to','duration','slot_id'];


    protected $dates = [
        'time_from',
        'time_to',

    ];

    use HasFactory;
}
