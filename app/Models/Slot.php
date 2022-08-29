<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $fillable = ['day'];


    public function transactions(){
    	return $this->hasMany('App\Models\Transaction','slot_id');
    }

    protected $dates = [
        'day',
        'created_at',
        'updated_at',
        // your other new column
    ];
    use HasFactory;
}
