<?php

namespace App\Models;

use Database\Factories\LeadItemIssuesFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadItemIssues extends Model
{
    /** @use HasFactory<LeadItemIssuesFactory> */
    use HasFactory;

    protected $fillable = [
        'lead_item_id',
        'repair_issue_id',
        'repair_issue_name',
        'price',
        'notes',
    ];

    public function leadItem()
    {
        return $this->belongsTo(LeadItems::class);
    }

    public function repairIssue()
    {
        return $this->belongsTo(RepairIssue::class);
    }
}
