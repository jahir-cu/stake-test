<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
     * Get the images for the blog post.
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
