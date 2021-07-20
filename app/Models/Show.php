<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $table = "show";
    //set guarded records blank and timestamp false
    protected $guarded = [];
    public $timestamps = false;
    
    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }

    public function screen() {
        return $this->belongsTo(Screen::class);
    }

    public function movie() {
        return $this->belongsTo(Movie::class);
    }

    public function seat() {
        return $this->hasMany(Seat::class);
    }

    public function book() {
        return $this->hasMany(Book::class);
    }
    
}
