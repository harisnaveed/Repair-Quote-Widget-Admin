<?php

namespace App\Models;

use Database\Factories\ActivityLogFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    /** @use HasFactory<ActivityLogFactory> */
    use HasFactory;

    protected $table = 'activity_logs';

    protected $fillable = [
        'user_id',
        'company_id',
        'location_id',

        'action',
        'action_label',
        'module',

        'entity_type',
        'entity_id',

        'changes',
        'description',

        'ip_address',
        'user_agent',
        'browser',
        'platform',
    ];

    protected $casts = [
        'changes' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * User who performed the action.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Related company.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Related location.
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Polymorphic entity relation.
     */
    public function entity()
    {
        return $this->morphTo();
    }
}
