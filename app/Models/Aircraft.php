<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'body'];

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class, 'aircraft_keyword');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
