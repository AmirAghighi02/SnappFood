<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodTierResource;
use App\Http\Resources\RestaurantResource;
use App\Models\Food;
use App\Models\FoodTier;
use App\Models\Restaurant;
use App\Models\RestaurantTier;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $restaurants = Restaurant::all();
        $validated = ($request->validate([
            'is_open' => ['boolean'],
            'type' => ['string'],
        ]));
        if (isset($validated['is_open'])) {
            $restaurants = $restaurants->intersect(
                Restaurant::query()->where('is_open', $validated['is_open'])->get()
            ) ;
        }
        if (isset($validated['type'])) {
            $restaurants = $restaurants->intersect(
                RestaurantTier::query()->where('name', $validated['type'])->first()->restaurants
            ) ;
        }

        return $restaurants;
    }

    public function show(Restaurant $restaurant)
    {
        return $restaurant;
    }

    public function food(Restaurant $restaurant)
    {
//        $categories = $restaurant->foodTiers()->get()->unique();
//        return [
//            'name' => $restaurant->name,
//            'menu' => FoodTierResource::collection($categories)
//        ];
//        $food = $restaurant->food()->get()->groupBy('food_tier_id');

//        $categories = FoodTier::query()->findMany($categoryIds);
//        $food = $categories->toQuery()->has('food')->getRelation('food')
//            ->where('restaurant_id',$restaurant->id)->get()->groupBy('food_tier_id');
        $food = $restaurant->food()->get()->groupBy(function (Food $item , $key){
            return $item->foodTier->name;
        })->toArray();
        return $food;
    }
}
