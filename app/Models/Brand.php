<?php

namespace App\Models;

use Database\Factories\BrandFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /** @use HasFactory<BrandFactory> */
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
        return $this->belongsToMany(Location::class)
            ->withPivot('is_active', 'position')
            ->withTimestamps();
    }

    public function devices()
    {
        return $this->belongsToMany(
            Device::class,
            'device_brand',
            'brand_id',
            'device_id'
        );
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function productSeries()
    {
        return $this->hasMany(ProductSeries::class);
    }

    public function repairIssues()
    {
        return $this->hasMany(RepairIssue::class);
    }
}
