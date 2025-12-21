@extends('employees.layout')

@section('content')
    <section class="general" style="padding: 60px 0px;">
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
                        <a href="" class="learn tajawal-bold"><i class="bi bi-play-circle"></i> &nbsp;&nbsp; ابدأ
                            رحلة
                            التعلم</a>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 mb-3">
                    <div class="quickly__actions">
                        <h5 class="tajawal-bold fs-18 mb-4">إجراءات سريعة</h5>
                        <a class="mb-2" href="{{ route('employee.videos') }}"><i class="bi bi-play"></i> &nbsp;&nbsp; مشاهدة
                            الفيديوهات</a>
                        <a class="mb-2" href="{{ route('employee.map') }}"><i class="bi bi-geo-alt"></i> &nbsp;&nbsp; عرض الخريطة
                            </a>
                        <a class="mb-5" href="{{ route('employee.employeeslist') }}"><i class="bi bi-people"></i> &nbsp;&nbsp; تواصل مع المرشدين
                            </a>
                        <h5 class="tajawal-bold fs-18 mb-4">التقدم الحالي</h5>
                        <div class="d-flex justify-content-between">
                            <span style="color: #4B5563;" class="tajawal-regular fs-14">الفيديوهات المطلوبة</span>
                            <span>2/5</span>
                        </div>

                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25"
                            style="height: 8px;" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-success"
                                style="width: 25%; background-color: #22C55E !important;"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
