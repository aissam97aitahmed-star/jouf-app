<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // الحقول التي يمكن تعبئتها مباشرة (Mass Assignment)
    protected $fillable = [
        'name',
        'position',
        'department',
        'email',
        'phone',
        'office_location',
    ];
}
