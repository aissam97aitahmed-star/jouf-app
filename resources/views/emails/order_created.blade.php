@extends('emails.layout')

@section('content')
    <p>مرحباً {{ $order->full_name ?? '_' }},</p>
    <p>تم إنشاء طلبك بنجاح!</p>
    <p>رقم الطلب: <strong>{{ $order->order_number }}</strong></p>
    <p>تاريخ الزيارة: {{ $order->visit_date }} الساعة {{ $order->visit_time }}</p>

    {{-- <p>QR Code الخاص بالطلب:</p>
    <div>
        <img src="{{ asset('qrcodes/order_' . $order->id . '.png') }}" alt="QR Code">
    </div> --}}

    <p>
        يرجى الانتظار حتى يتم اعتماد طلبك من طرف الموظف المسؤول.
        بعد الموافقة سيتم إرسال رمز الدخول (QR Code) إليك عبر البريد الإلكتروني.
    </p>

    <p>شكراً لاستخدامك خدمتنا.</p>
@endsection
