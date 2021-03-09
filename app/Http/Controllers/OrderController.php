<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        return OrderResource::collection(Order::orderBy('id')->paginate());
    }
}

