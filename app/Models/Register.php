<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    //set guarded records blank and timestamp false
    protected $fillable = ['name','email','otp','phone','created_at'];
    public $timestamps = false;
}
