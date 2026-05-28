<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'device_id',
        'brand_id',
        'location_id',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function locations()
    {
        return $this->belongsToMany(
            Location::class,
            'product_location',
            'product_id',
            'location_id'
        )
            ->withPivot('is_active', 'position')
            ->withTimestamps();
    }

    public function productSeries()
    {
        return $this->belongsTo(ProductSeries::class);
    }

    public function repairIssuePricing()
    {
        return $this->hasMany(LocationProductRepairIssuePricing::class);
    }

    public function leadItems()
    {
        return $this->hasMany(LeadItems::class);
    }
}
