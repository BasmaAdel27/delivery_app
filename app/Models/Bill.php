<?php

namespace App\Models;

use App\Traits\HasTimestampTrait;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use  HasTimestampTrait;

    protected $guarded = [];


    public function driver()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
