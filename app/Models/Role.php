<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    protected $table = 'roles';

    protected $fillable = [
        'name',
        'description',
        'company_id',
        'location_id',
        'guard_name',
    ];

    protected $casts = [
        'company_id' => 'integer',
        'location_id' => 'integer',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function scopePlatform($query)
    {
        return $query->where('guard_name', 'platform');
    }

    public function scopeWeb($query)
    {
        return $query->where('guard_name', 'web');
    }
}
