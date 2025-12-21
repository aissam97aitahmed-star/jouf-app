<?php

namespace App\Http\Controllers\Admin;

use App\Models\BotFaq;
use App\Models\BotSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BotSettingController extends Controller
{

    public function index()
    {
        $faqs = BotFaq::latest()->paginate(10);
        $settings = BotSetting::first();
        return view('admin.bot.index', compact('settings', 'faqs'));
    }


    public function edit()
    {
        $settings = BotSetting::firstOrCreate([]);
        return view('admin.bot.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = BotSetting::first();

        $settings->update($request->validate([
            'bot_name' => 'required',
            'welcome_message' => 'required',
            'language' => 'required',
            'is_active' => 'boolean',
            'response_delay' => 'numeric',
            'smart_reply' => 'boolean',
            'save_conversations' => 'boolean',
        ]));

        return back()->with('success', 'تم حفظ الإعدادات بنجاح');
    }


   
}
