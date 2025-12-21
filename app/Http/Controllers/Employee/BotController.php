<?php

namespace App\Http\Controllers\Employee;

use Throwable;
use App\Models\BotFaq;
use App\Models\BotSetting;
use Illuminate\Http\Request;
use App\Models\BotConversation;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

class BotController extends Controller
{
    public function index()
    {

        $settings = BotSetting::first();

        $faqs = BotFaq::where('is_active', true)
            ->orderByDesc('views')
            ->limit(5)
            ->get();

        $todayConversations = BotConversation::whereDate('created_at', today())->count();

        $resolvedPercentage = BotConversation::count() > 0
            ? round(
                BotConversation::where('resolved', true)->count()
                    / BotConversation::count() * 100
            )
            : 0;

        // جميع المحادثات الحالية للموظف
        $conversations = BotConversation::where('user_id', Auth::id())
            ->orderBy('created_at', 'asc')
            ->get();

        return view('employees.bot', compact(
            'settings',
            'faqs',
            'conversations',
            'todayConversations',
            'resolvedPercentage'
        ));


        // $settings = BotSetting::first();
        // return view('employees.bot', compact('settings'));
    }


    public function ask(Request $request)
    {
        try {
            // ✅ Validation
            $validated = $request->validate([
                'question' => 'required|string|max:500',
            ]);

            // ✅ Create conversation using user_id
            $conversation = BotConversation::create([
                'user_id' => Auth::id(),
                'question' => $validated['question'],
            ]);

            // ✅ Search FAQ
            $faq = BotFaq::where('is_active', true)
                ->where('question', 'LIKE', '%' . trim($validated['question']) . '%')
                ->first();

            if ($faq) {
                $faq->increment('views');

                $conversation->update([
                    'answer' => $faq->answer,
                    'resolved' => true,
                ]);
            } else {
                $conversation->update([
                    'answer' => 'سيتم تحويل سؤالك إلى الموارد البشرية وسيتم الرد عليك في أقرب وقت.',
                    'resolved' => false,
                ]);
            }

            return response()->json([
                'status'     => 'success',
                'question'   => $conversation->question,
                'answer'     => $conversation->answer,
                'resolved'   => $conversation->resolved,
                'created_at' => $conversation->created_at->format('H:i'),
            ], 200);
        }
        // 🔴 Validation errors
        catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'validation_error',
                'errors' => $e->errors(),
            ], 422);
        }
        // 🔴 Database errors
        catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'status'  => 'db_error',
                'message' => $e->getMessage(),
            ], 500);
        }
        // 🔴 Any other error
        catch (\Throwable $e) {
            return response()->json([
                'status'  => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    public function export()
    {
        $conversations = BotConversation::with('user')->get();

        $content = "";

        foreach ($conversations as $conv) {
            // سؤال الموظف
            if ($conv->user_id) {
                $content .= "أنت: " . $conv->question . "\n";
                $content .= $conv->created_at->format('Y-m-d H:i') . "\n";
            }

            // جواب البوت
            if ($conv->answer) {
                $content .= "المساعد الذكي: " . $conv->answer . "\n";
                $content .= $conv->created_at->format('Y-m-d H:i') . "\n\n";
            }
        }

        $fileName = 'conversations_' . now()->format('Ymd_His') . '.txt';

        return Response::make($content, 200, [
            'Content-Type' => 'text/plain; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }
}
