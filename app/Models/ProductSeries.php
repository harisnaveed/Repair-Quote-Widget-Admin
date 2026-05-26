<?php

namespace App\Models;

use Database\Factories\ProductSeriesFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSeries extends Model
{
    /** @use HasFactory<ProductSeriesFactory> */
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'parent_id',
        'name',
        'slug',
        'description',
        'icon',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(ProductSeries::class, 'parent_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
