@extends('emails.layout')

@section('content')

<p>مرحباً {{ $order->full_name }},</p>

<p>نود إعلامك بأنه تمت <strong style="color:green;">الموافقة على طلب الزيارة</strong>.</p>

<p>
    <strong>رقم الطلب:</strong> {{ $order->order_number }} <br>
    <strong>تاريخ الزيارة:</strong> {{ $order->visit_date }} <br>
    <strong>وقت الزيارة:</strong> {{ $order->visit_time }} <br>
    <strong>الموظف المضيف:</strong> {{ $order->host_employee }}
</p>

<p>يرجى إبراز رمز الدخول التالي عند الوصول:</p>

<div style="text-align:center;margin:20px 0;">
    <img src="{{ asset('qrcodes/order_' . $order->id . '.png') }}" width="180">
</div>

<p>
    ⚠️ يرجى الحضور في الوقت المحدد وإحضار الهوية الشخصية.
</p>

<p>شكراً لتعاونكم.</p>

@endsection
