<?php
// app/Models/Renter.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
    use HasFactory;

    protected $fillable = [
        'pickup_date',
        'return_date',
        'car_id',
        'user_id',
    ];

    // Assurez-vous d'avoir défini les relations dans vos modèles Car et User le cas échéant
    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
