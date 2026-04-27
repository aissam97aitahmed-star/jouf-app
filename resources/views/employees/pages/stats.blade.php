<div id="v-pills-home" class="tab-pane fade active show">



    <div class="row">

        @php
            $employeeOnboardingSteps = $employeeOnboardingSteps ?? [];
        @endphp



        <div class="col-xl-8">
            <div class="welcome text-white">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="tajawal-bold">مرحباً بك
                            {{ Auth::user()->name }} في شركة الجوف !</h4>
                        <p class="tajawal-regular">نحن سعداء بانضمامك إلى فريقنا
                            المتميز</p>
                    </div>
                    <i class="bi bi-rocket-takeoff"></i>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4 col-xs-12 text-center stat mb-2">
                        <strong class="tajawal-bold fs-30">{{ $loactions }}</strong>
                        <br>
                        <strong class="tajawal-bold">المواقع</strong>
                    </div>
                    <div class="col-md-4 col-xs-12 text-center stat mb-2">
                        <strong class="tajawal-bold fs-30">{{ $videos }}</strong>
                        <br>
                        <strong class="tajawal-bold">الفيديوهات</strong>
                    </div>
                    <div class="col-md-4 col-xs-12 text-center stat mb-2">
                        <strong class="tajawal-bold fs-30">{{ $employees }}</strong>
                        <br>
                        <strong class="tajawal-bold">المرشدين</strong>
                    </div>
                </div>
                <a href="{{ route('employee.videos') }}" class="learn tajawal-bold"><i class="bi bi-play-circle"></i>
                    &nbsp;&nbsp; ابدأ
                    رحلة
                    التعلم</a>
            </div>
        </div>
        <div class="col-xl-4">
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
                    <div class="progress-bar bg-success" style="width: 25%; background-color: #22C55E !important;">
                    </div>
                </div>

            </div>
        </div>

        @if (count($employeeOnboardingSteps))
            <div class="col-xl-12">
                <div class="card border-0 shadow-sm"
                    style="border-radius: 24px; background: linear-gradient(135deg, #f8fff9 0%, #ffffff 100%); border: 1px solid #e7f6ea; box-shadow: 0 14px 30px rgba(15, 23, 42, 0.06);">
                    <div class="card-body p-4 p-xl-4">
                        <div class="mb-4">
                            <h5 class="tajawal-bold mb-1" style="color: #111827;">تقدمك الوظيفي</h5>
                            <p class="tajawal-regular mb-0" style="font-size: 14px; color: #6B7280;">
                                الخطوات التالية تم إعدادها لك من الإدارة وتظهر هنا كمسار واضح وبسيط.
                            </p>
                        </div>

                        <div class="d-flex flex-wrap align-items-start gap-3">
                            @foreach ($employeeOnboardingSteps as $stepIndex => $step)
                                <div class="d-flex align-items-center"
                                    style="flex: 0 0 calc(33.333% - 0.75rem); max-width: calc(33.333% - 0.75rem); min-width: 220px;">
                                    <div class="d-flex align-items-center flex-grow-1">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                            style="width: 48px; height: 48px; background: linear-gradient(135deg, #DCFCE7 0%, #BBF7D0 100%); border: 2px solid #86EFAC; color: #166534; box-shadow: 0 8px 18px rgba(34, 197, 94, 0.14);">
                                            <i class="bi bi-check2-circle fs-5"></i>
                                        </div>

                                        <div class="me-3">
                                            <div class="tajawal-bold" style="font-size: 14px; color: #111827;">
                                                {{ $step }}
                                            </div>
                                            <div class="tajawal-regular" style="font-size: 12px; color: #6B7280;">
                                                خطوة {{ $stepIndex + 1 }}
                                            </div>
                                        </div>
                                    </div>

                                    @if (!$loop->last)
                                        <div class="d-none d-xl-block ms-3 flex-grow-1"
                                            style="height: 2px; min-width: 30px; background: linear-gradient(90deg, #BBF7D0 0%, #E5F7EA 100%);">
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="col-xl-4 mt-5">
            <div class="d-flex align-items-center mb-3">
                <h5 class="tajawal-bold fs-18 mb-0">ميزات الموظفين</h5>
            </div>

            <div class="modern-ticket position-relative d-flex flex-column"
                style="background: linear-gradient(105.06deg, #16A34A 3.82%, #16843F 38.96%, #167B3C 65.32%, #166534 100%); border-radius: 20px; min-height: 380px; color: white; overflow: hidden; box-shadow: 0 10px 30px rgba(91, 91, 58, 0.3);">

                <div
                    style="position: absolute; top: 50%; left: -15px; width: 30px; height: 30px; background-color: white; border-radius: 50%; transform: translateY(-50%); z-index: 2;">
                </div>
                <div
                    style="position: absolute; top: 50%; right: -15px; width: 30px; height: 30px; background-color: white; border-radius: 50%; transform: translateY(-50%); z-index: 2;">
                </div>

                <div class="p-4 text-center border-bottom border-dashed border-white-50"
                    style="border-bottom-style: dashed !important;">
                    <span class="badge bg-white text-dark tajawal-bold mb-2">عرض خاص للموظفين</span>
                    <h3 class="tajawal-bold mt-2">قسيمة التخفيض</h3>
                    <p class="tajawal-regular opacity-75 mb-0">Discount Voucher</p>
                </div>

                <div
                    class="p-4 flex-grow-1 d-flex flex-column align-items-center justify-content-center position-relative">
                    <div class="d-flex align-items-start">
                        <span class="tajawal-bold display-1" style="font-family: 'serif'; line-height: 1;">20</span>
                        <span class="fs-1 mt-3">%</span>
                    </div>
                    <p class="tajawal-bold fs-5 mt-2 mb-0">خصم حصري</p>
                </div>

                <div class="p-3 bg-black bg-opacity-10 text-center">
                    <a href="#" class="btn btn-light btn-sm px-4 rounded-pill tajawal-bold text-dark shadow-sm">
                        على جميع املنتجات
                    </a>
                </div>

                <div
                    style="position: absolute; top: -100px; left: -100px; width: 300px; height: 300px; background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0) 70%); pointer-events: none;">
                </div>
            </div>
        </div>




    </div>
</div>
