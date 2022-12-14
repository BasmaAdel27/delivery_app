<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const PENDING = 'pending';
    const DELIVERED = 'delivered';
    const CANCELED = 'canceled';


    const STATUSES = [self::PENDING, self::DELIVERED,self::CANCELED];


    public function user()
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
        $this->attributes['order_status'] = $value;
    }
}
