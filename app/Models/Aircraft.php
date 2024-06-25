<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'body'];
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'aircraft_tag');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
