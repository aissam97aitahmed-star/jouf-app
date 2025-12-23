<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\MessageTemplate;
use App\Http\Controllers\Controller;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class MessageTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $templates = MessageTemplate::latest()->paginate(20);
        return view('admin.templates.index', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:500',
        ]);

        MessageTemplate::create($request->only('title', 'content'));

        ToastMagic::success('تم إضافة القالب بنجاح');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $template = MessageTemplate::findOrFail($id);

        // التحقق من صحة البيانات
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:500',
        ]);

        // تحديث البيانات
        $template->update($request->only('title', 'content'));

        // إظهار رسالة نجاح
        ToastMagic::success('تم تحديث القالب بنجاح');

        // إعادة التوجيه إلى الصفحة السابقة
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MessageTemplate $template)
    {
        $template->delete();

        return response()->json([
            'success' => true,
            'message' => 'تم حذف بنجاح'
        ]);
    }
}
