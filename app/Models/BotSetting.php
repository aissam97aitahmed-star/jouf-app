<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BotSetting extends Model
{
     protected $fillable = [
        'bot_name',
        'welcome_message',
        'language',
        'is_active',
        'response_delay',
        'smart_reply',
        'save_conversations',
    ];
}
