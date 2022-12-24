<?php

namespace App\Models;

use App\Traits\HasTimestampTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory, HasTimestampTrait;

    protected $fillable = ['plate_number','operating_card','operating_cardDate','application_date','Examination_date',
          'truck_type', 'truck_model', 'license_number', 'License_expiry'];


    public function driver()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
