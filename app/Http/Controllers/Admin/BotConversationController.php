<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\BotConversation;
use App\Http\Controllers\Controller;

class BotConversationController extends Controller
{
    public function index()
    {
        $conversations = BotConversation::latest()->paginate(20);
        return view('admin.bot.conversations', compact('conversations'));
    }
}
