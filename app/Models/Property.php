<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
// use App\Models\Location;

class Property extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'property_name',
        'property_type',
        'property_size',
        'bedrooms',
        'bathrooms',
        'price',
        'location_id',
        // 'no_of_investors',
        // 'investment_multiple'
    ];
    /**
     * Get the location associated with the property.
     */
    public function location()
    {
        return $this->hasOne(Location::class,  'id', 'location_id');
    }
    /**
     * Get the images for the property.
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    /**
     * Get the image for the property.
     */
    public function image()
    {
        return $this->hasMany(Image::class)->limit(1);
    }
    /**
     * Get the campaigns for the property.
     */
    public function campaigns()
    {
        return $this->hasOneThrough(Campaign::class, PropertiesCampaign::class, 'property_id', 'id', 'id', 'campaign_id');
        // return $this->hasOneThrough(PropertiesCampaign::class, 'campaign_id', 'property_id');
    }

    // return $this->hasOneThrough(
    //     Owner::class,
    //     Car::class,
    //     'mechanic_id', // Foreign key on the cars table...
    //     'car_id', // Foreign key on the owners table...
    //     'id', // Local key on the mechanics table...
    //     'id' // Local key on the cars table...
    // );

    
    /**
     * Get the investments for the property.
     */
    public function investments()
    {
        return $this->hasManyThrough(Investment::class, PropertiesCampaign::class, 'property_id', 'campaign_id', 'id', 'property_id' );
    }
    /**
     * Get the investmentsStats for the property.
     */
    public function investmentsStats()
    {
        return $this->hasManyThrough(Investment::class, PropertiesCampaign::class, 'property_id', 'campaign_id', 'id', 'property_id' )
        ->selectRaw('count(1) as total_investments, sum(amount_invested) as total_amount_invested')
        ->groupBy('investments.campaign_id');
    }
    /**
     * Get the investmentsStats for the property.
     */
    public function investmentsRaised()
    {
        $target=$this->campaigns->target_amount;
        // if($target > 0)
        // {}

        return $this->hasManyThrough(Investment::class, PropertiesCampaign::class, 'property_id', 'campaign_id', 'id', 'property_id' )
        ->selectRaw('count(1) as total_investments, sum(amount_invested) as total_amount_invested, round(((SUM(amount_invested)/'.DB::raw($target).') * 100), 2) as amount_raised')
        ->groupBy('investments.campaign_id');
    }

}
// return $this->hasManyThrough(
//     Investment::class,
//     PropertiesCampaign::class,
//     'project_id', // Foreign key on the PropertiesCampaigns table...
//     'environment_id', // Foreign key on the Investments table...
//     'id', // Local key on the property table...
//     'id' // Local key on the PropertiesCampaign table...
// );