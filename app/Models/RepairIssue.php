<?php

namespace App\Models;

use Database\Factories\RepairIssueFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairIssue extends Model
{
    /** @use HasFactory<RepairIssueFactory> */
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

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function repairIssuePricing()
    {
        return $this->hasMany(LocationProductRepairIssuePricing::class);
    }
}
