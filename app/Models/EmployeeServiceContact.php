<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeServiceContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_key',
        'name',
        'phone',
        'email',
        'sort_order',
        'is_active',
    ];
}
