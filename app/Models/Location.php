<?php

namespace App\Models;

use App\Models\Facility;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name',
        'category',
        'phone',
        'access_info',
        'working_hours',
        'is_active',
        'lat',
        'lng',
    ];

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }
}
