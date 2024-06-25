<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['Tag'];

    public function aircraft()
    {
        return $this->belongsToMany(Aircraft::class, 'aircraft_tag');
    }
}
