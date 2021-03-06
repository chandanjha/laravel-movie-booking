<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    use HasFactory;
    //set guarded records blank and timestamp false
    public $timestamps = false;
    protected $guarded = [];

    //set relation with theater
    public function theater() {
        return $this->belongsTo(Theater::class);
    }

    public function show(){
        return $this->hasMany(Show::class);
    }
}
