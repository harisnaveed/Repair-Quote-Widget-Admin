<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'phone',
        'no_of_locations',
        'is_active',
    ];

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function leads()
    {
        return $this->hasMany(Leads::class);
    }
}
