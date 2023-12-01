<?php

namespace App\Http\Controllers\admin;

use App\Classes\OrderStatus;
use App\Classes\SalesHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\SortArchiveRequest;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function archive(SortArchiveRequest $request)
    {
        $carts = SalesHelper::getSortedOrdersByDate(
            $request->validated('from'),
            $request->validated('to'),
            true
        );
        $totalIncome = $carts->get()->sum(function (Cart $cart) {return $cart->total_fee_after_off;});
        $carts = $carts->paginate(5);
        return view('admin.order.archive', compact('carts', 'totalIncome'));
    }

    public function show(Cart $cart)
    {
        return view('admin.order.show',compact('cart'));
    }
}