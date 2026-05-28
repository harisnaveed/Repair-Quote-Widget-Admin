<?php

namespace App\Models;

use Database\Factories\SystemLogFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemLog extends Model
{
    /** @use HasFactory<SystemLogFactory> */
    use HasFactory;

    protected $table = 'system_logs';

    protected $fillable = [
        'company_id',
        'location_id',

        'level',
        'message',

        'context',
        'extra',

        'trace',
        'file',
        'line',

        'ip_address',
        'user_agent',
        'url',
        'method',
    ];

    protected $casts = [
        'context' => 'array',
        'extra' => 'array',

        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

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
}
