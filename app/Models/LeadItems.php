<?php

namespace App\Models;

use Database\Factories\LeadItemsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadItems extends Model
{
    /** @use HasFactory<LeadItemsFactory> */
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'device_name',
        'device_id',
        'product_name',
        'product_id',
    ];

    public function lead()
    {
        return $this->belongsTo(Leads::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function issues()
    {
        return $this->hasMany(LeadItemIssues::class);
    }
}
