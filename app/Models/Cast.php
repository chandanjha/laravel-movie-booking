<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    use HasFactory;

    //set guarded records blank and timestamp false
    protected $guarded = [];
    public $timestamps = false;

    //setting relation with the movie
    public function movie() {
        return $this->belongsTo(Movie::class);
    }
}
