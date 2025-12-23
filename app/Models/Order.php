<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        // Step 1 – Personal Info
        'full_name',
        'identity_number',
        'nationality',
        'phone',
        'email',
        'company',
        'job_title',

        // Step 2 – Visit Details
        'visit_purpose',
        'visit_date',
        'visit_time',
        'visit_duration',
        'host_employee',
        'department',

        // Step 3 – Additional Info
        'car_plate',
        'companions',
        'special_requests',

        // Step 4
        'has_valid_id',
        'has_company_letter',
        // Status
        'status',

        // Visit Tracking
        'entry_time', // وقت الدخول
        'exit_time',  // وقت الخروج
    ];
}
