<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'description',
        'marque',
        'price',
        'status',
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'user_id');
    }

    public function renters()
    {
        return $this->hasMany(Renter::class);
    }
}


