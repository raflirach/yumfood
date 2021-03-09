<?php

namespace App\Http\Controllers;

use App\Http\Resources\VendorResource;
use App\Vendor;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Requests\VendorRequest;
use App\Http\Resources\DishResource;
use App\Dish;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $filter = $request->query('tags');
        if($filter){
            return VendorResource::collection(Vendor::whereHas('tags', function($query) use ($filter) {
                $query->whereIn('name', $filter);
            })
                ->orderBy('id')
                ->paginate());
        } else {
            return VendorResource::collection(Vendor::orderBy('id')->paginate());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendorRequest $request)
    {
        $name = $request->name;
        $logo = $request->logo;
        $tags = $request->tags;

        $vendor = Vendor::create([
            "name" => $name,
            "logo" => $logo
        ]);
        if($vendor) {
            foreach ($tags as $tag) {
                Tag::firstOrCreate(['name' => $tag]);
            }
    
            $newTags = Tag::whereIn('name', $tags)->get()->pluck('id');
            $vendor->tags()->sync($newTags);
        }
        return new VendorResource($vendor);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendor = Vendor::find($id);

        if(!$vendor) return response()->json([
            "status" => "error",
            "code" => 404,
            "message" => "Data not found"
        ], 404);

        return new VendorResource($vendor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VendorRequest $request, $id)
    {
        $vendor = Vendor::find($id);

        $name = $request->name;
        $logo = $request->logo;
        $tags = $request->tags;
        
        if(!$vendor) return response()->json([
            "status" => "error",
            "code" => 404,
            "message" => "Data not found"
        ], 404);

        $vendor->fill([
            "name" => $name,
            "logo" => $logo
        ]);
        if($vendor) {
            foreach ($tags as $tag) {
                Tag::firstOrCreate(['name' => $tag]);
            }
    
            $newTags = Tag::whereIn('name', $tags)->get()->pluck('id');
            $vendor->tags()->sync($newTags);
        }
        return new VendorResource($vendor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendor = Vendor::find($id);
        
        if(!$vendor) return response()->json([
            "status" => "error",
            "code" => 404,
            "message" => "Data not found"
        ], 404);

        Vendor::destroy($id);
        return response()->json([
            "message" => "Vendor deleted successfully"
        ]);
    }

    public function dishes($id)
    {
        $vendor = Vendor::find($id);
        
        if(!$vendor) return response()->json([
            "status" => "error",
            "code" => 404,
            "message" => "Data not found"
        ], 404);
        
        return DishResource::collection(Dish::where('vendor_id', $id)->get());
    }
}
