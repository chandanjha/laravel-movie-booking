<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpManage extends Model
{
    use HasFactory;

    //set guarded records blank and timestamp false
    protected $fillable = ['otp','register_id','created_at'];
    public $timestamps = false;
}
