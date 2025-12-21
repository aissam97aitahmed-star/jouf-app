<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class BotConversation extends Model
{
      protected $fillable = [
        'user_id', // بدل employee_id
        'question',
        'answer',
        'resolved',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // العلاقة مع المستخدم
    }
}
