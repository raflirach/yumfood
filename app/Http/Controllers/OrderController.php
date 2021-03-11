<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use App\Order;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    public function index()
    {
        return OrderResource::collection(Order::orderBy('id')->paginate());
    }

    public function store(OrderRequest $request)
    {
        $user_id = $request->user_id;
        $dish_id = $request->dish_id;
        $quantity = $request->quantity;

        $order = Order::create([
            "user_id" => $user_id,
            "dish_id" => $dish_id,
            "status" => false,
            "quantity" => $quantity,
        ]);

        return new OrderResource($order);
    }
}

