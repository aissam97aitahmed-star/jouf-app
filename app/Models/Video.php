<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'title',
        'category',
        'target_group',
        'is_required',
        'description',
        'what_you_will_learn',
        'duration',
        'views',
        'video_path',
        'thumbnail',
        'key_points',
    ];

    protected $casts = [
        'is_required' => 'boolean',
        'key_points' => 'array',
    ];
}
