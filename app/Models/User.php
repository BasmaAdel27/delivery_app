<?php

namespace App\Models;

use App\Models\Chat\AdminMessage;
use App\Models\Chat\TrainerMessage;
use App\Models\Country\Country;
use App\Models\Society\Society;
use App\Models\State\State;
use App\Traits\HasAssetsTrait;
use App\Traits\HasTimestampTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use MattDaneshvar\Survey\Models\Entry;
use Spatie\Permission\Traits\HasRoles;
use willvincent\Rateable\Rateable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasTimestampTrait;

    const ADMIN = 'admin';
    const DRIVER = 'driver';
    const EMPLOYEE = 'employee';

    const types = [self::ADMIN, self::DRIVER,self::EMPLOYEE];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
          'password',
          'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
          'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute() // notice that the attribute name is in CamelCase.
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
    }
    public function truck()
    {
        return $this->hasOne(Truck::class);
    }


    public function orders()
    {
        $this->hasMany(Order::class, 'driver_id');
    }

}
