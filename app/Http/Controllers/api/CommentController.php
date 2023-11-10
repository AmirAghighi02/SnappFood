<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowCommentsRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isFalse;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        return Comment::create($validated);
    }

    public function index(ShowCommentsRequest $request)
    {

        if(!$request->validated('restaurant_id') & !$request->validated('food_id')) {
            return 'please enter a field to filter';
        }
        return ($request->missing('restaurant_id')) ?

            Food::find($request->validated('food_id'))
                ->carts()->with('comment')->getRelation('comment')->get()

            : Restaurant::find($request->validated('restaurant_id'))
                ->carts()->with('comment')->getRelation('comment')->get();
    }
}
