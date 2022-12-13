<?php

namespace App\Models;

use App\Traits\HasTimestampTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory, HasTimestampTrait;
    protected $fillable=['plate_number','truck_type','truck_model','license_number','License_expiry'];


    public function driver(){
       return $this->hasOne(User::class,'truck_id');
    }
}
