<?php

namespace App\Models;

use App\Traits\HasTimestampTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory, HasTimestampTrait;

    protected $guarded = [];


    public function driver()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
