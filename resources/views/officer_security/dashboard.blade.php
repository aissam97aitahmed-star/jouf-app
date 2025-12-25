@extends('officer_security.layout')

@section('content')

    <section class="overview__security">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="box">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="tajawal-bold fs-20" style="color: #111827;">الزوار الحاليين</h3>
                            <span class="tajawal-regular fs-14 count">{{ $activeOrders->count() ?? 0 }} زائر داخل المبنى</span>
                        </div>

                        @foreach($activeOrders as $key => $order)
                            <div class="visitor">
                                <div class="row justify-content-between">
                                    <div class="col-auto ">
                                        <div class="d-flex">
                                            <i class="bi bi-briefcase "></i>
                                            <div>
                                                <h4 class="tajawal-bold fs-18 m-0" style="color: #111827;"> {{ $order->full_name ?? '__' }}

                                                </h4>
                                                <p class="tajawal-regular fs-14" style="color: #4B5563;">{{ $order->company ?? '__' }}
                                                    </p>
                                                <p class="tajawal-regular fs-12" style="color: #16A34A;"> دخل في: {{ $order->entry_time ?? '__' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto text-end">
                                        <h6 class="tajawal-medium fs-16" style="color: #111827;">يزور:  {{ $order->host_employee ?? '__' }}</h6>
                                        <p class="tajawal-regular fs-14" style="color: #4B5563;"> {{ $order->department ?? '__' }}</p>
                                        <p class="tajawal-regular fs-14" style="color: #166534;"> {{ $order->visit_purpose ?? '__' }}</p>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-5">
                        <h3 class="tajawal-bold fs-18 mb-3" style="color: #111827;">ماسح QR السريع</h3>
                        <a href="{{ route('officer_security.scanner') }}" class="btn btn-primary tajawal-regular fs-16 scan__link"> <i
                                class="bi bi-upc-scan"></i> مسح رمز QR</a>
                    </div>
                    <div class="mb-5">
                        <h3 class="tajawal-bold fs-18 mb-3" style="color: #111827;">التنبيهات العاجلة</h3>
                        @foreach ($notifications as $notification)
                            <div class="alert">
                                <i class="bi bi-clock"></i>
                                <div>
                                    <p class="tajawal-medium fs-14 m-0" style="color: #111827;">{{ $notification->description }}</p>
                                    <p class="tajawal-regular fs-12 m-0" style="color: #4B5563;">{{ $notification->created_at->locale('ar')->diffForHumans() }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-5">
                        <h3 class="tajawal-bold fs-18 mb-3" style="color: #111827;">روابط سريعة</h3>
                        <a href="{{ route('officer_security.visitors') }}" class="btn btn-primary tajawal-regular fs-16 scan__link quikly__link"> <i
                                class="bi bi-clock-history"></i> سجل الزوار</a>
                        <a href="{{ route('officer_security.scanner') }}" class="btn btn-primary tajawal-regular fs-16 scan__link quikly__link"
                            style="background: #16A34A;"> <i class="bi bi-camera"></i> كاميرا المسح</a>
                        <a href="" class="btn btn-primary tajawal-regular fs-16 scan__link quikly__link"
                            style="background: #9333EA;"> <i class="bi bi-shield-check"></i> الموافقات الأمنية</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
