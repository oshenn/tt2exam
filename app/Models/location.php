<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location'];

    public function aircraft()
    {
        return $this->belongsToMany(Aircraft::class);
    }

}
