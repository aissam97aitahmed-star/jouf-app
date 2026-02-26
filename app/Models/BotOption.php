<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BotOption extends Model
{
    protected $fillable = [
        'option_number',
        'title',
        'content',
        'is_active',
    ];
}
