<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    //set guarded records blank and timestamp false
    protected $guarded = [];
    public $timestamps = false;

    public function show() {
        return $this->belongsTo(Show::class);
    }
}
