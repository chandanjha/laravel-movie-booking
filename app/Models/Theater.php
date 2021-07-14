<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Theater extends Model
{
    use HasFactory;

    //set guarded records blank and timestamp false
    protected $guarded = [];

    public $timestamps = false;

    //set relation with screen
    public function screens() {
        return $this->hasMany(Screen::class);
    }

    //set relation with cities
    public function cities() {
        return $this->belongsTo(Cities::class);
    }

    //set relation with states
    public function states() {
        return $this->belongsTo(States::class);
    }
}
