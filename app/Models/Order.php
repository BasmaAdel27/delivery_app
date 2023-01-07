<?php

namespace App\Models;

use App\Traits\HasTimestampTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const PENDING = 'pending';
    const DELIVERED = 'delivered';
    const CANCELED = 'canceled';


    const STATUSES = [self::PENDING, self::DELIVERED, self::CANCELED];
    protected $guarded = [];


    public function getCustomCreatedAtAttribute($value)
    {
        return Carbon::parse($this->created_at)->translatedFormat('Y-m-d');
    }

    public function getCustomDateAttribute($value)
    {
        return Carbon::parse($this->created_at)->translatedFormat('Y-m-d');
    }


    public function getCustomTimeAttribute($value)
    {
        return Carbon::parse($this->created_at)->translatedFormat('H:i A');
    }

    public function driver()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status_ar'] = trans($value);
        $this->attributes['status'] = $value;
    }
}
