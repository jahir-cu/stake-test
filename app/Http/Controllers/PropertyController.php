<?php
namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertiesCampaign;
use Illuminate\Http\Request;
use DB;
// DB::enableQueryLog();

class PropertyController extends Controller
{
    public function __construct()
    {
        /**
         * Include middleware of auth from listed routes.
         *
         * @return \Illuminate\Http\Response
         */
        $this->middleware('auth:sanctum')
            ->except(['index', 'store']);
    }
    /**
     * Display a listing of the properties.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $propertyId = '';
        $bedrooms = '';
        $bathrooms = '';
        $price = '';
        $propertySize = '';
        $propertyType = '';
        $locationId = '';
        $campaignId = '';
        if ($request->has('propertyId'))
        {
            $propertyId = $request->input('propertyId');
        }
        if ($request->has('bedrooms'))
        {
            $bedrooms = $request->input('bedrooms');
        }
        if ($request->has('bathrooms'))
        {
            $bathrooms = $request->input('bathrooms');
        }
        if ($request->has('price'))
        {
            $price = $request->input('bathrooms');
        }
        if ($request->has('bathrooms'))
        {
            $bathrooms = $request->input('bathrooms');
        }
        if ($request->has('propertySize'))
        {
            $propertySize = $request->input('propertySize');
        }
        if ($request->has('propertyType'))
        {
            $propertyType = $request->input('propertyType');
        }
        if ($request->has('locationId'))
        {
            $locationId = $request->input('locationId');
        }
        if ($request->has('campaignId'))
        {
            $campaignId = $request->input('campaignId');
        }
        $properties = Property::with(['location', 'campaigns', 'image', 'investmentStats']);
        $properties = $properties->whereHas('location', function ($q) use ($locationId)
        {
            if ($locationId)
            {
                $q->where('locations.id', $locationId);
            }
        });
        $properties = $properties->whereHas('campaigns', function ($q) use ($campaignId)
        {
            if ($campaignId)
            {
                $q->where('campaigns.id', $campaignId);
            }
        });
        if ($propertyId)
        {
            $properties = $properties->where('id', $propertyId);
        }
        if ($bedrooms)
        {
            $properties = $properties->where('bedrooms', $bedrooms);
        }
        if ($bathrooms)
        {
            $properties = $properties->where('bathrooms', $bathrooms);
        }
        if ($price)
        {
            $properties = $properties->where('price', $price);
        }
        if ($propertySize)
        {
            $properties = $properties->where('property_size', $propertySize);
        }
        if ($propertyType)
        {
            $properties = $properties->where('property_type', $propertyType);
        }

        $properties = $properties->latest('created_at')
            ->get();
        // SELECT distinct a.property_name, c.campaign_name, c.target_amount, SUM(d.amount_invested) as amount_invested, round(SUM((d.amount_invested)/c.target_amount * 100), 2) as percentage_raised, count(distinct d.user_id) as unique_no_of_investers FROM `properties` as a inner join properties_campaigns as b on b.property_id = a.id left outer join campaigns as c on c.id = b.campaign_id left outer join investments as d on d.campaign_id = b.campaign_id group by a.property_name, c.campaign_name, c.target_amount;
        // SELECT distinct a.property_name, c.campaign_name, c.target_amount, SUM(d.amount_invested) as amount_invested, round(SUM((d.amount_invested)/c.target_amount * 100), 2) as percentage_raised, count(distinct d.user_id) as unique_no_of_investers FROM `properties` as a left outer join properties_campaigns as b on b.property_id = a.id left outer join campaigns as c on c.id = b.campaign_id left outer join investments as d on d.campaign_id = b.campaign_id where b.id is not null and d.amount_invested is null group by a.property_name, c.campaign_name, c.target_amount;
        // dd(DB::getQueryLog());
        return response()
            ->json(['status' => 1, 'total' => count($properties) , 'data' => $properties], 200);
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

