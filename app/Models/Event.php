<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'body', 'date'];
    protected $casts = [
        'time' => 'datetime',
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
