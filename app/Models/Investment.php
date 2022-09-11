<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        // 'campaign_id',
        'property_id',
        'amount_invested'
    ];

    /**
     * Get the images for the blog post.
     */
    public function properties()
    {
        return $this->belongsTo(Property::class, 'property_id', 'property_id');
    }
}
