<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    //set guarded records blank and timestamp false
    protected $guarded = [];
    public $timestamps = false;


    //set relation with movie
    public function movie() {
        return $this->hasMany(Movie::class);
    }
}
