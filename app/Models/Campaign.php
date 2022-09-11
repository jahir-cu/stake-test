<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'campaign_name',
        'target_amount',
        'investment_multiple',
        'status'
    ];
    /**
     * Get the images for the blog post.
     */
    public function investments()
    {
        return $this->belongsTo(Investment::class, 'campaign_id', 'id');
    }
    /**
     * Get the images for the blog post.
     */
    public function properties()
    {
        return $this->belongsTo(Property::class, 'campaign_id', 'id');
    }
}
