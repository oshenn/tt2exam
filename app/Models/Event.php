<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'body', 'time'];
    protected $casts = [
        'time' => 'datetime',
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
