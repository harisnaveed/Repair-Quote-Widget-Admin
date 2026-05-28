<?php

namespace App\Models;

use Database\Factories\LeadsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    /** @use HasFactory<LeadsFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'preference',
        'source',
        'location_id',
        'company_id',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function items()
    {
        return $this->hasMany(LeadItems::class);
    }
}
