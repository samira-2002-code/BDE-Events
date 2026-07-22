<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable=[
        'title',
        'description',
        'date',
        'time',
        'location',
        'price',
        'capacity',
        'created_by',
    ];
    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}




