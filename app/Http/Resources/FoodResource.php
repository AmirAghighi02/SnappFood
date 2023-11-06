<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     *
     */
    public function toArray(Request $request)
    {
        $restaurantId = \request('restaurant')->id;
        return ($restaurantId === $this->restaurant_id) ? [
            'name' => $this->name,
            'price'=>$this->price,
        ] : null;
    }
}
