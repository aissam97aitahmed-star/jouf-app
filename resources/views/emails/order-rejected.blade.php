@extends('emails.layout')

@section('content')

<p>مرحباً {{ $order->full_name }},</p>

<p>
    نأسف لإبلاغك أنه تم <strong style="color:#dc3545;">رفض طلب الزيارة</strong>.
</p>

<p>
    <strong>رقم الطلب:</strong> {{ $order->order_number }} <br>
    <strong>تاريخ الزيارة:</strong> {{ $order->visit_date }} <br>
    <strong>وقت الزيارة:</strong> {{ $order->visit_time }}
</p>

<p>
    يمكنك تقديم طلب جديد في وقت آخر أو التواصل مع الجهة المختصة لمزيد من المعلومات.
</p>

<p>شكراً لتفهمكم.</p>

@endsection
