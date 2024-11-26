<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guitar extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'colour',
        'brand',
        'price',
        'image'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }
}
