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
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function devices()
    {
        return $this->belongsToMany(Device::class)
            ->withPivot('status', 'position')
            ->withTimestamps();
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class)
            ->withPivot('status', 'position')
            ->withTimestamps();
    }
}
