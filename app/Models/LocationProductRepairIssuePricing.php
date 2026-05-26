<?php

namespace App\Models;

use Database\Factories\LocationProductRepairIssuePricingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationProductRepairIssuePricing extends Model
{
    /** @use HasFactory<LocationProductRepairIssuePricingFactory> */
    use HasFactory;

    protected $fillable = [
        'location_id',
        'product_id',
        'repair_issue_id',
        'price',
        'is_active',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function repairIssue()
    {
        return $this->belongsTo(RepairIssue::class);
    }
}
