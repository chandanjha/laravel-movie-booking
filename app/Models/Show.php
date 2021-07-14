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
    
}
