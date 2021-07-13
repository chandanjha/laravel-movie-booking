<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;
    //set guarded records blank and timestamp false
    public $timestamps = false;
    protected $guarded = [];

    //set relation with state
    public function state()
    {
        return $this->belongsTo(States::class);
    }

    //set relation with theater
    public function theater() {
        return $this->hasMany(Theater::class);
    }
}
