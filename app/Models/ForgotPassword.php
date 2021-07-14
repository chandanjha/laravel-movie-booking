<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForgotPassword extends Model
{
    use HasFactory;

    //set guarded records blank and timestamp false
    protected $fillable = ['otp','email','created_at'];
    public $timestamps = false;
}
