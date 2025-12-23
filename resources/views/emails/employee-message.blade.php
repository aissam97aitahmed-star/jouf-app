@extends('emails.layout')

@section('content')
    <p>مرحباً {{ $employeeName ?? '_' }},</p>
    <p>{{ $subjectText ?? '_' }}</p>

    <p>{{ $messageText ?? '_' }}</p>

    <ul style="list-style:none; padding:0; margin:0 0 20px; font-family:'Noto Kufi Arabic', Tahoma, Arial, sans-serif;">
        <li
            style="background:#f1f5f9; padding:10px; margin-bottom:8px; border-radius:6px; font-family:'Noto Kufi Arabic', Tahoma, Arial, sans-serif;">
            <strong>مستوى الأولوية:</strong>
            @if ($priority === 'low')
                منخفضة
            @elseif($priority === 'medium')
                متوسطة
            @else
                عالية
            @endif
        </li>
    </ul>
@endsection
