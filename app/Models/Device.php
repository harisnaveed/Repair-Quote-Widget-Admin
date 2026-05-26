<?php

namespace App\Models;

use Database\Factories\DeviceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    /** @use HasFactory<DeviceFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'slug',
        'icon',
        'location_id',
    ];

    public function locations()
    {
        return $this->belongsToMany(
            Location::class,
            'device_location',
            'device_id', // current table
            'location_id' // related table
        )
            ->withPivot('is_active', 'position')
            ->withTimestamps();
    }

    public function brands()
    {
        return $this->belongsToMany(
            Brand::class, 'device_brand', 'device_id', 'brand_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function repairIssues()
    {
        return $this->hasMany(RepairIssue::class);
    }

    public function leadItems()
    {
        return $this->hasMany(LeadItems::class);
    }
}
