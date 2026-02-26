@extends('emails.layout')

@section('content')

<p>مرحباً،</p>

<p>يوجد طلب زيارة جديد بانتظار موافقتك.</p>

<hr>

<h4>بيانات الزائر</h4>
<ul>
    <li><strong>الاسم:</strong> {{ $order->full_name }}</li>
    <li><strong>رقم الهوية:</strong> {{ $order->identity_number }}</li>
    <li><strong>الجوال:</strong> {{ $order->phone }}</li>
    <li><strong>البريد:</strong> {{ $order->email }}</li>
    <li><strong>الشركة:</strong> {{ $order->company ?? '-' }}</li>
    <li><strong>الوظيفة:</strong> {{ $order->job_title ?? '-' }}</li>
</ul>

<h4>تفاصيل الزيارة</h4>
<ul>
    <li><strong>رقم الطلب:</strong> {{ $order->order_number }}</li>
    <li><strong>الغرض:</strong> {{ $order->visit_purpose }}</li>
    <li><strong>التاريخ:</strong> {{ $order->visit_date }}</li>
    <li><strong>الوقت:</strong> {{ $order->visit_time }}</li>
    <li><strong>المدة:</strong> {{ $order->visit_duration ?? '-' }}</li>
    <li><strong>الموظف المضيف:</strong> {{ $order->host_employee }}</li>
    <li><strong>القسم:</strong> {{ $order->department }}</li>
</ul>

<h4>معلومات إضافية</h4>
<ul>
    <li><strong>لوحة السيارة:</strong> {{ $order->car_plate ?? '-' }}</li>
    <li><strong>المرافقون:</strong> {{ $order->companions ?? '-' }}</li>
    <li><strong>طلبات خاصة:</strong> {{ $order->special_requests ?? '-' }}</li>
</ul>

<hr>

<p>يرجى اختيار الإجراء المناسب:</p>

<div style="margin-top:20px; text-align:center;">

    <a href="{{ route('visitor.orders.approve', $order->id) }}"
       style="background:#16a34a;color:white;padding:12px 20px;
              text-decoration:none;border-radius:6px;margin-right:10px;display:inline-block;">
        ✅ قبول الطلب
    </a>

    <a href="{{ route('visitor.orders.reject', $order->id) }}"
       style="background:#dc2626;color:white;padding:12px 20px;
              text-decoration:none;border-radius:6px;display:inline-block;">
        ❌ رفض الطلب
    </a>

</div>

<p style="margin-top:25px;">شكراً لتعاونكم.</p>

@endsection
