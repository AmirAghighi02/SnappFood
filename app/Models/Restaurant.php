<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;
    protected $fillable = [
        'name', 'phone', 'account', 'user_id', 'send_cost'
    ];
    protected $appends = ['is_open'];

    public function isOpen():Attribute
    {
        return Attribute::make(
            get: fn() => $this->schedules()->where('day', (now()->dayOfWeek + 2))
                ->where([
                    ['start_time', '<=', now()->toTimeString()],
                    ['end_time', '>', now()->toTimeString()],
                ])->get()->isNotEmpty()
        );
    }

    public function tiers()
    {
        return $this->belongsToMany(RestaurantTier::class, 'restaurant_tier');
    }

    protected function user()
    {
        return $this->belongsTo(User::class);
    }

    public function food()
    {
        return $this->hasMany(Food::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    protected function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function foodTiers()
    {
        return $this->belongsToMany(FoodTier::class, 'food');
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function comments()
    {
        return $this->orders()->has('comment')->get()->pluck('comment');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
