<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertiesCampaign;
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
        // $properties =DB::table('properties')
        // ->join('images', function ($join) {
        //     $join->on('properties.id', '=', 'images.property_id');
        // })
        // ->join('locations', function ($join) {
        //     $join->on('properties.location_id', '=', 'locations.id');
        // })
        // ->get();
        $properties= Property::with(['campaigns', 'investmentsRaised'])->get();



        // $properties = //DB::table('properties')->get();
        // Property::with('investments')->get();
        // $ddd= collect($properties)->withSum('investments','amount_invested')->invest_mmm;
        // SELECT distinct a.property_name, c.campaign_name, c.target_amount, SUM(d.amount_invested) as amount_invested, round(SUM((d.amount_invested)/c.target_amount * 100), 2) as percentage_raised, count(distinct d.user_id) as unique_no_of_investers FROM `properties` as a inner join properties_campaigns as b on b.property_id = a.id left outer join campaigns as c on c.id = b.campaign_id left outer join investments as d on d.campaign_id = b.campaign_id group by a.property_name, c.campaign_name, c.target_amount;
        // SELECT distinct a.property_name, c.campaign_name, c.target_amount, SUM(d.amount_invested) as amount_invested, round(SUM((d.amount_invested)/c.target_amount * 100), 2) as percentage_raised, count(distinct d.user_id) as unique_no_of_investers FROM `properties` as a left outer join properties_campaigns as b on b.property_id = a.id left outer join campaigns as c on c.id = b.campaign_id left outer join investments as d on d.campaign_id = b.campaign_id where b.id is not null and d.amount_invested is null group by a.property_name, c.campaign_name, c.target_amount;
        //Property::find(2)->images;

        // Property::select('properties.*')->join('images', 'images.property_id', '=', 'properties.id');
        
        
        // dd(DB::getQueryLog());
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
