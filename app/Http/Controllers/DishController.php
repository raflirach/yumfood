<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\DishResource;
use App\Dish;

class DishController extends Controller
{
    public function index()
    {
        return DishResource::collection(Dish::orderBy('id')->paginate());
    }

    public function show($id)
    {
        $dish = Dish::find($id);

        if(!$dish) return response()->json([
            "status" => "error",
            "code" => 404,
            "message" => "Data not found"
        ], 404);

        return new DishResource($dish);
    }
}
