<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodTier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public $timestamps = false;
    public function food()
    {
        return $this->hasMany(Food::class);
    }
}
