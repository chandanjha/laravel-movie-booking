<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    //set guarded records blank and timestamp false
    protected $guarded = [];
    public $timestamps = false;

    
    //set relation with genre
    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    //set relation with cast
    public function cast() {
        return $this->hasMany(Cast::class);
    }
}
