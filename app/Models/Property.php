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
        return $this->hasMany(Image::class, 'property_id', 'id');
    }
    /**
     * Get the investments for the property.
     */
    public function investments()
    {
        return $this->hasMany(Investment::class, 'property_id', 'id');
    }
    
    /**
     * Get the main image for the property.
     */
    public function image()
    {
        return $this->hasOne(Image::class, 'property_id', 'id');
    }
    /**
     * Get the campaigns for the property.
     */
    public function campaigns()
    {
        return $this->hasOneThrough(Campaign::class, PropertiesCampaign::class, 'property_id', 'id', 'id', 'campaign_id');
    }
    /**
     * Get the investmentsStats for the property.
     */
    public function investmentStats()
    {
        $target=$this->campaigns->target_amount?$this->campaigns->target_amount:0;
        return $this->hasMany(Investment::class, 'property_id', 'id')
            ->select('property_id',
            DB::raw('count(1) as total_investments,
            sum(amount_invested) as total_amount_invested,
            round(((SUM(amount_invested)/'.DB::raw($target).') * 100), 2) as amount_raised'
            ))
            ->groupBy('investments.property_id');
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
// return $this->hasOneThrough(
    //     Owner::class,
    //     Car::class,
    //     'mechanic_id', // Foreign key on the cars table...
    //     'car_id', // Foreign key on the owners table...
    //     'id', // Local key on the mechanics table...
    //     'id' // Local key on the cars table...
    // );