@extends('employees.layout')
@push('css')
    <style>
        .new__aside {
            background: linear-gradient(105.06deg, #16A34A 3.82%, #16843F 38.96%, #167B3C 65.32%, #166534 100%);
            padding: 15px;
            border-radius: 10px;
        }

        .new__aside .nav-link {
            color: white !important
        }

        .new__aside a.active {
            color: black !important;
            background-color: white !important
        }
    </style>
@endpush


@section('content')
    <section class="general">
        <div class="content-body default-height">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card" style="border: none">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-3">
                                        <div class="nav flex-column nav-pills mb-3 new__aside">
                                            <a href="#v-pills-home" data-bs-toggle="pill"
                                                class="nav-link active show tajawal-medium">
                                                <i class="bi bi-graph-up-arrow"></i> إحصائيات عامة
                                            </a>
                                            <a href="#v-pills-company" data-bs-toggle="pill"
                                                class="nav-link tajawal-medium">
                                                <i class="bi bi-building"></i> عن الشركة
                                            </a>
                                            <a href="#v-pills-vision" data-bs-toggle="pill" class="nav-link tajawal-medium">
                                                <i class="bi bi-eye"></i> رؤيتنا الاستراتيجية
                                            </a>
                                            <a href="#v-pills-products" data-bs-toggle="pill"
                                                class="nav-link tajawal-medium">
                                                <i class="bi bi-gear"></i> المنتجات الصناعية
                                            </a>
                                            <a href="#v-pills-agricultural_crops" data-bs-toggle="pill"
                                                class="nav-link tajawal-medium">
                                                <i class="bi bi-flower1"></i> المحاصيل الزراعية
                                            </a>
                                            <a href="#v-pills-facilities" data-bs-toggle="pill"
                                                class="nav-link tajawal-medium">
                                                <i class="bi bi-building"></i> المرافق الصناعية
                                            </a>
                                            <a href="#v-pills-cert" data-bs-toggle="pill" class="nav-link tajawal-medium">
                                                <i class="bi bi-patch-check"></i> الشهادات الرسمية
                                            </a>
                                            <a href="#v-pills-work-hours" data-bs-toggle="pill"
                                                class="nav-link tajawal-medium">
                                                <i class="bi bi-clock"></i> أوقات العمل الرسمي
                                            </a>
                                            <a href="#v-pills-services" data-bs-toggle="pill"
                                                class="nav-link tajawal-medium">
                                                <i class="bi bi-folder-symlink"></i> خدمات الموظفين
                                            </a>
                                            <a href="#v-pills-apps" data-bs-toggle="pill" class="nav-link tajawal-medium">
                                               <i class="bi bi-box-arrow-up-right"></i> روابط تهمك
                                            </a>
                                            <a href="#v-pills-chart" data-bs-toggle="pill" class="nav-link tajawal-medium">
                                                <i class="bi bi-diagram-3"></i> الهيكل التنظيمي
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <div class="tab-content">
                                            @include('employees.pages.stats')
                                            @include('employees.pages.company')
                                            @include('employees.pages.vision')
                                            @include('employees.pages.products')
                                            @include('employees.pages.facilities')
                                            @include('employees.pages.agricultural_crops')
                                            @include('employees.pages.cert')
                                            @include('employees.pages.work-hours')
                                            @include('employees.pages.services')
                                            @include('employees.pages.apps')
                                            @include('employees.pages.chart')

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- <section class="general" style="padding: 60px 0px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12 mb-3">
                    <div class="welcome text-white">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h4 class="tajawal-bold">مرحباً بك {{ Auth::user()->name }} في شركة الجوف !</h4>
                                <p class="tajawal-regular">نحن سعداء بانضمامك إلى فريقنا المتميز</p>
                            </div>
                            <i class="bi bi-rocket-takeoff"></i>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4 col-xs-12 text-center stat mb-2">
                                <strong class="tajawal-bold fs-30">{{ $loactions }}</strong> <br>
                                <strong class="tajawal-bold">المواقع</strong>
                            </div>
                            <div class="col-md-4 col-xs-12 text-center stat mb-2">
                                <strong class="tajawal-bold fs-30">{{ $videos }}</strong> <br>
                                <strong class="tajawal-bold">الفيديوهات</strong>
                            </div>
                            <div class="col-md-4 col-xs-12 text-center stat mb-2">
                                <strong class="tajawal-bold fs-30">{{ $employees }}</strong> <br>
                                <strong class="tajawal-bold">المرشدين</strong>
                            </div>
                        </div>
                        <a href="{{ route('employee.videos') }}" class="learn tajawal-bold"><i
                                class="bi bi-play-circle"></i> &nbsp;&nbsp; ابدأ
                            رحلة
                            التعلم</a>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 mb-3">
                    <div class="quickly__actions">
                        <h5 class="tajawal-bold fs-18 mb-4">إجراءات سريعة</h5>
                        <a class="mb-2" href="{{ route('employee.videos') }}"><i class="bi bi-play"></i> &nbsp;&nbsp;
                            مشاهدة
                            الفيديوهات</a>
                        <a class="mb-2" href="{{ route('employee.map') }}"><i class="bi bi-geo-alt"></i> &nbsp;&nbsp;
                            عرض الخريطة
                        </a>
                        <a class="mb-5" href="{{ route('employee.employeeslist') }}"><i class="bi bi-people"></i>
                            &nbsp;&nbsp; تواصل مع المرشدين
                        </a>
                        <h5 class="tajawal-bold fs-18 mb-4">التقدم الحالي</h5>
                        <div class="d-flex justify-content-between">
                            <span style="color: #4B5563;" class="tajawal-regular fs-14">الفيديوهات المطلوبة</span>
                            <span>2/5</span>
                        </div>

                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25"
                            style="height: 8px;" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-success"
                                style="width: 25%; background-color: #22C55E !important;">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
