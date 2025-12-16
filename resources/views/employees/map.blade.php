@extends('employees.layout')

@section('content')

    <section class="map">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-5">
                <h4 class="tajawal-bold">الخريطة التفاعلية للمواقع</h4>
                <span class="badge rounded-pill text-bg-success tajawal-medium fs-14">5 موقع متاح</span>
            </div>
            <div class="row pb-5 mb-5">
                <div class="col-md-6 col-xs-12 mb-3">
                    <h5 class="tajawal-bold mb-3">خريطة المواقع</h5>
                    <img src="{{ asset('assets/images/map.jpg') }}" alt="" width="100%" style="border-radius: 12px;">
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="box mb-5">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-geo-alt location__icon"></i>
                            <div>
                                <h6 class="tajawal-bold fs-18 m-0">مصنع البطاطس</h6>
                                <p class="tajawal-regular fs-14" style="color: #4B5563;">المجمع الصناعي</p>
                            </div>
                        </div>
                        <p class="tajawal-bold fs-14 mb-2" style="color: #374151;">المرافق المتاحة:</p>
                        <div class="mb-4">
                            <span class="badge rounded-pill text-bg-success disp tajawal-regular fs-12">غرف تبديل
                                الملابس</span>
                            <span class="badge rounded-pill text-bg-success disp tajawal-regular fs-12">عيادة
                                طبية</span>
                            <span class="badge rounded-pill text-bg-success disp tajawal-regular fs-12">ادارة
                                عامة</span>
                        </div>
                        <div class="info">
                            <div class="d-flex justify-content-between mb-2">
                                <p class="tajawal-regular fs-14"><i class="bi bi-info-circle"></i> &nbsp; معلومات الوصول
                                </p>
                                <p class="tajawal-regular fs-14"><i class="bi bi-telephone"></i> &nbsp; 011-345-6789
                                </p>
                            </div>
                            <p class="tajawal-regular fs-14">ساعات العمل: 6:00 ص - 6:00 م، معدات السلامة إجبارية</p>
                        </div>
                    </div>
                    <div class="box mb-5">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-geo-alt location__icon"></i>
                            <div>
                                <h6 class="tajawal-bold fs-18 m-0">مصنع البطاطس</h6>
                                <p class="tajawal-regular fs-14" style="color: #4B5563;">المجمع الصناعي</p>
                            </div>
                        </div>
                        <p class="tajawal-bold fs-14 mb-2" style="color: #374151;">المرافق المتاحة:</p>
                        <div class="mb-4">
                            <span class="badge rounded-pill text-bg-success disp tajawal-regular fs-12">غرف تبديل
                                الملابس</span>
                            <span class="badge rounded-pill text-bg-success disp tajawal-regular fs-12">عيادة
                                طبية</span>
                            <span class="badge rounded-pill text-bg-success disp tajawal-regular fs-12">ادارة
                                عامة</span>
                        </div>
                        <div class="info">
                            <div class="d-flex justify-content-between mb-2">
                                <p class="tajawal-regular fs-14"><i class="bi bi-info-circle"></i> &nbsp; معلومات
                                    الوصول
                                </p>
                                <p class="tajawal-regular fs-14"><i class="bi bi-telephone"></i> &nbsp; 011-345-6789
                                </p>
                            </div>
                            <p class="tajawal-regular fs-14">ساعات العمل: 6:00 ص - 6:00 م، معدات السلامة إجبارية</p>
                        </div>
                    </div>
                    <div class="box mb-5">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-geo-alt location__icon"></i>
                            <div>
                                <h6 class="tajawal-bold fs-18 m-0">مصنع البطاطس</h6>
                                <p class="tajawal-regular fs-14" style="color: #4B5563;">المجمع الصناعي</p>
                            </div>
                        </div>
                        <p class="tajawal-bold fs-14 mb-2" style="color: #374151;">المرافق المتاحة:</p>
                        <div class="mb-4">
                            <span class="badge rounded-pill text-bg-success disp tajawal-regular fs-12">غرف تبديل
                                الملابس</span>
                            <span class="badge rounded-pill text-bg-success disp tajawal-regular fs-12">عيادة
                                طبية</span>
                            <span class="badge rounded-pill text-bg-success disp tajawal-regular fs-12">ادارة
                                عامة</span>
                        </div>
                        <div class="info">
                            <div class="d-flex justify-content-between mb-2">
                                <p class="tajawal-regular fs-14"><i class="bi bi-info-circle"></i> &nbsp; معلومات
                                    الوصول
                                </p>
                                <p class="tajawal-regular fs-14"><i class="bi bi-telephone"></i> &nbsp; 011-345-6789
                                </p>
                            </div>
                            <p class="tajawal-regular fs-14">ساعات العمل: 6:00 ص - 6:00 م، معدات السلامة إجبارية</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
