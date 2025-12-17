@extends('officer_security.layout')

@section('content')

    <section class="overview__security">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="box">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="tajawal-bold fs-20" style="color: #111827;">الزوار الحاليين</h3>
                            <span class="tajawal-regular fs-14 count">1 زائر داخل المبنى</span>
                        </div>
                        <div class="visitor">
                            <div class="row justify-content-between">
                                <div class="col-auto ">
                                    <div class="d-flex">
                                        <i class="bi bi-briefcase "></i>
                                        <div>
                                            <h4 class="tajawal-bold fs-18 m-0" style="color: #111827;">موسسة الفجر
                                                الجديد
                                            </h4>
                                            <p class="tajawal-regular fs-14" style="color: #4B5563;">مكتب المحاماة
                                                والاستشارات</p>
                                            <p class="tajawal-regular fs-12" style="color: #16A34A;"> دخل في: 11:05
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto text-end">
                                    <h6 class="tajawal-medium fs-16" style="color: #111827;">يزور: نائف الشراري</h6>
                                    <p class="tajawal-regular fs-14" style="color: #4B5563;">الشؤون القانونية</p>
                                    <p class="tajawal-regular fs-14" style="color: #166534;">زيارة عمل</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-5">
                        <h3 class="tajawal-bold fs-18 mb-3" style="color: #111827;">ماسح QR السريع</h3>
                        <a href="" class="btn btn-primary tajawal-regular fs-16 scan__link"> <i
                                class="bi bi-upc-scan"></i> مسح رمز QR</a>
                    </div>
                    <div class="mb-5">
                        <h3 class="tajawal-bold fs-18 mb-3" style="color: #111827;">التنبيهات العاجلة</h3>
                        <div class="alert">
                            <i class="bi bi-clock"></i>
                            <div>
                                <p class="tajawal-medium fs-14 m-0" style="color: #111827;">تصريح منتهي الصلاحية</p>
                                <p class="tajawal-regular fs-12 m-0" style="color: #4B5563;">14:30</p>
                            </div>
                        </div>
                        <div class="alert">
                            <i class="bi bi-clock"></i>
                            <div>
                                <p class="tajawal-medium fs-14 m-0" style="color: #111827;">تصريح منتهي الصلاحية</p>
                                <p class="tajawal-regular fs-12 m-0" style="color: #4B5563;">14:30</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="tajawal-bold fs-18 mb-3" style="color: #111827;">روابط سريعة</h3>
                        <a href="" class="btn btn-primary tajawal-regular fs-16 scan__link quikly__link"> <i
                                class="bi bi-clock-history"></i> سجل الزوار</a>
                        <a href="" class="btn btn-primary tajawal-regular fs-16 scan__link quikly__link"
                            style="background: #16A34A;"> <i class="bi bi-camera"></i> كاميرا المسح</a>
                        <a href="" class="btn btn-primary tajawal-regular fs-16 scan__link quikly__link"
                            style="background: #9333EA;"> <i class="bi bi-shield-check"></i> الموافقات الأمنية</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
