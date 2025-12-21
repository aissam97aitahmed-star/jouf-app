<?php

namespace App\Http\Controllers\Admin;

use App\Models\BotFaq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class BotFaqController extends Controller
{
    public function index()
    {
        $faqs = BotFaq::latest()->paginate(10);
        return view('admin.bot.faqs.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        BotFaq::create($request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]));
        ToastMagic::success('تم إضافة السؤال بنجاح');
        return back();
    }

    public function update(Request $request, BotFaq $faq)
    {
        $faq->update($request->only('question', 'answer', 'is_active'));
        ToastMagic::success('تم التحديث السؤال بنجاح');
        return back();
    }



    public function destroy(BotFaq $faq)
    {
        $faq->delete();

        return response()->json([
            'success' => true,
            'message' => 'تم حذف بنجاح'
        ]);
    }
}
