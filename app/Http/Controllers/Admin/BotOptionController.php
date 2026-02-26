<?php

namespace App\Http\Controllers\Admin;

use App\Models\BotOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class BotOptionController extends Controller
{

    public function index()
    {
        return view('admin.bot.options', [
            'options' => BotOption::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'option_number' => 'required|numeric|min:1|max:9|unique:bot_options,option_number',
            'title'         => 'required|string|max:255',
            'content'         => 'nullable|string',
            'is_active'     => 'required|boolean',
        ]);

        BotOption::create($request->all());
        ToastMagic::success('تم إضافة الخيار');
        return back();
    }

    public function update(Request $request, BotOption $bot_option)
    {
        $request->validate([
            'option_number' => 'required|numeric|min:1|max:9|unique:bot_options,option_number,',
            'title'         => 'required|string|max:255',
            'content'         => 'nullable|string',
            'is_active'     => 'required|boolean',
        ]);

        $bot_option->update($request->all());
        ToastMagic::success('تم تحديث الخيار');
        return back();
    }


    public function destroy(BotOption $bot_option)
    {
        $bot_option->delete();

        return response()->json([
            'success' => true,
            'message' => 'تم حذف بنجاح'
        ]);
    }
}
