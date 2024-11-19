<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [

        'guitar_id',
        'user_id',
        'rating',
        'comment',

    ];

    public function guitar()
    {
        return $this->belongsTo(guitar::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
