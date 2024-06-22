<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'body', 'date'];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
