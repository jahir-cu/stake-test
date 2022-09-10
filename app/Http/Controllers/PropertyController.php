<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use DB;
DB::enableQueryLog();

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')
            ->except([
                'index',
                'create'
            ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties =DB::table('properties')
        ->join('images', function ($join) {
            $join->on('properties.id', '=', 'images.property_id');
        })
        ->join('locations', function ($join) {
            $join->on('properties.location_id', '=', 'locations.id');
        })
        ->get();


        // $properties = Property::find(2)->images;

        // Property::select('properties.*')->join('images', 'images.property_id', '=', 'properties.id');
        
        
        dd(DB::getQueryLog());
        return response()->json(['status' => 1, 'data' => $properties], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
