@extends('officer_security.layout')

@section('content')
    <section class="alerts__security">
        <div class="container">
            <div class="div">
                <div class="d-flex justify-content-between align-items-center notification__head">
                    <h3 class="tajawal-bold fs-24 m-0" style="color: #111827; flex: 1;">التنبيهات الأمنية</h3>
                    <a href="" class="btn btn-primary tajawal-regular fs-16 read__all"> <i class="bi bi-check2-all"></i>
                        تحديد الكل كمقروء</a>

                </div>
                <div class="alerts__security__all">
                    <div class="alert__single d-flex justify-content-between">
                        <div class="alert__info d-flex">
                            <i class="bi bi-clock"></i>
                            <div>
                                <h3 class="tajawal-bold fs-18" style="color: #111827;">تصريح منتهي الصلاحية
                                    <span class="tajawal-medium fs-12">عاجل</span>
                                </h3>
                                <p class="tajawal-regular fs-16" style="color: #4B5563;">الزائر أحمد محمد تجاوز الوقت
                                    المحدد للزيارة</p>
                                <p class="tajawal-regular fs-14" style="color: #6B7280;">الوقت: 14:30</p>
                            </div>
                        </div>
                        <div class="alert__status">
                            <a href="" class="btn btn-primary tajawal-regular fs-16"> <i class="bi bi-check"></i>تم الحل
                            </a>
                            <a href="" class="btn btn-primary tajawal-regular fs-16 details"> <i
                                    class="bi bi-three-dots"></i>
                                تفاصيل</a>

                        </div>
                    </div>
                    <div class="alert__single d-flex justify-content-between">
                        <div class="alert__info d-flex">
                            <i class="bi bi-clock"></i>
                            <div>
                                <h3 class="tajawal-bold fs-18" style="color: #111827;">تصريح منتهي الصلاحية
                                    <span class="tajawal-medium fs-12">عاجل</span>
                                </h3>
                                <p class="tajawal-regular fs-16" style="color: #4B5563;">الزائر أحمد محمد تجاوز الوقت
                                    المحدد للزيارة</p>
                                <p class="tajawal-regular fs-14" style="color: #6B7280;">الوقت: 14:30</p>
                            </div>
                        </div>
                        <div class="alert__status">
                            <a href="" class="btn btn-primary tajawal-regular fs-16"> <i class="bi bi-check"></i>تم الحل
                            </a>
                            <a href="" class="btn btn-primary tajawal-regular fs-16 details"> <i
                                    class="bi bi-three-dots"></i>
                                تفاصيل</a>

                        </div>
                    </div>
                    <div class="alert__single d-flex justify-content-between">
                        <div class="alert__info d-flex">
                            <i class="bi bi-clock"></i>
                            <div>
                                <h3 class="tajawal-bold fs-18" style="color: #111827;">تصريح منتهي الصلاحية
                                    <span class="tajawal-medium fs-12">عاجل</span>
                                </h3>
                                <p class="tajawal-regular fs-16" style="color: #4B5563;">الزائر أحمد محمد تجاوز الوقت
                                    المحدد للزيارة</p>
                                <p class="tajawal-regular fs-14" style="color: #6B7280;">الوقت: 14:30</p>
                            </div>
                        </div>
                        <div class="alert__status">
                            <a href="" class="btn btn-primary tajawal-regular fs-16"> <i class="bi bi-check"></i>تم الحل
                            </a>
                            <a href="" class="btn btn-primary tajawal-regular fs-16 details"> <i
                                    class="bi bi-three-dots"></i>
                                تفاصيل</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
