<?php

namespace App\Models;

use App\Traits\HasTimestampTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const PENDING = 'pending';
    const DELIVERED = 'delivered';
    const CANCELED = 'canceled';


    const STATUSES = [self::PENDING, self::DELIVERED,self::CANCELED];
    protected $fillable=['price','quantity','weight','moves_number','customer_id','driver_id','lat','lng','location'];

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
