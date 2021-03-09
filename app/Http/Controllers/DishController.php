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
}
