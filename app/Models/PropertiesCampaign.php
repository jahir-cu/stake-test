<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertiesCampaign extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'property_id',
        'campaign_id'
    ];

    /**
     * Get the properties that owns the campaign.
     */
    public function properties()
    {
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }
    /**
     * Get the properties that owns the campaign.
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id', 'id');
    }
}