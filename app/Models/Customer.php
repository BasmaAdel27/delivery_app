<?php

namespace App\Models;

use App\Traits\HasTimestampTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory, HasTimestampTrait;

    protected $guarded = [];


    public function getFullNameAttribute() // notice that the attribute name is in CamelCase.
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getCustomCreatedAtAttribute($value)
    {
        return Carbon::parse($this->created_at)->translatedFormat('Y-m-d');
    }


    public function orders(){
        $this->hasMany(Order::class,'customer_id');
    }
}
