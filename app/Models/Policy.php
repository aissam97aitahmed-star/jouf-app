<?php

namespace App\Models;

use App\Models\PolicyCategory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable = [
        'policy_category_id',
        'title',
        'description',
        'priority',
        'is_active',
        'pdf_path',
        'downloads',
        'views',
        'published_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'published_at' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(PolicyCategory::class, 'policy_category_id');
    }
}
