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
        return $this->belongsToMany(Device::class)
            ->withPivot('is_active', 'position')
            ->withTimestamps();
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class)
            ->withPivot('is_active', 'position')
            ->withTimestamps();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function repairIssues()
    {
        return $this->hasMany(RepairIssue::class);
    }
}
