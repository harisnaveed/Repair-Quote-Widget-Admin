<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Location extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'company_id',
        'name',
        'email',
        'phone',
        'address',
        'gmb_link',
        'notification_email',
        'notification_phone',
        'is_active',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function devices()
    {
        return $this->belongsToMany(
            Device::class,
            'device_location',
            'location_id', // current table
            'device_id' // related table
        )
            ->withPivot('is_active', 'position')
            ->withTimestamps();
    }

    public function brands()
    {
        return $this->belongsToMany(
            Device::class,
            'brand_location',
            'location_id', // current table
            'brand_id' // related table
        )
            ->withPivot('is_active', 'position')
            ->withTimestamps();
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'product_location',
            'location_id',
            'product_id'
        )
            ->withPivot('is_active', 'position')
            ->withTimestamps();
    }

    public function repairIssues()
    {
        return $this->belongsToMany(
            RepairIssue::class,
            'location_repair_issue',
            'location_id',
            'repair_issue_id'
        )
            ->withPivot('is_active', 'position')
            ->withTimestamps();
    }

    public function repairIssuePricing()
    {
        return $this->hasMany(LocationProductRepairIssuePricing::class);
    }

    public function leads()
    {
        return $this->hasMany(Leads::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_location', 'location_id', 'user_id')
            ->withPivot('is_active')
            ->withTimestamps();
    }
}
