@extends('employees.layout')

@section('content')
    <section class="vedios__learning">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-5 v__header">
                <h4 class="tajawal-bold">الفيديوهات التعليمية</h4>
                <div class="d-flex align-items-center gap-3 actions">
                    <button class="btn btn-primary tajawal-medium active" type="submit">
                        <i class="bi bi-person-gear"></i> &nbsp; إداريين
                    </button>
                    <button class="btn btn-primary tajawal-medium" type="submit">
                        <i class="bi bi-person-gear"></i> &nbsp; عمال
                    </button>
                    <button class="btn btn-primary tajawal-regular fs-14 count" type="submit">
                        4 فيديو
                    </button>
                </div>
            </div>
            <div class="vedios__content">
                <div class="row pb-5">
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <span class="badge-live tajawal-medium">إجباري</span>
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="card-overlay-link" style="display:block; position:relative;">
                                <img src="{{ asset('assets/images/home_bg.jpeg') }}"
                                    class="card-img-top img-fluid card-img-fixed" alt="...">
                                <div class="card-overlay">
                                    <i class="bi bi-play-fill play-icon"></i>
                                </div>
                            </a>
                            <div class="card-body">
                                <h5 class="card-title tajawal-bold fs-18 mb-2">مقدمة شاملة عن الشركة</h5>
                                <p class="card-text tajawal-regular fs-14 mb-2" style="color: #8590A6;">تعرف على تاريخ
                                    الشركة ورؤيتها ورسالتها وقيمها الأساسية، </p>
                                <div class="actions d-flex justify-content-between align-items-center">
                                    <span class="tajawal-regular fs-12 pdg">عام</span>
                                    <a class="tajawal-regular fs-16" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="bi bi-play-circle"></i>
                                        <span>مشاهدة</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <span class="badge-live tajawal-medium">إجباري</span>
                            <a href="video-page.html" class="card-overlay-link" style="display:block; position:relative;">
                                <img src="{{ asset('assets/images/home_bg.jpeg') }}"
                                    class="card-img-top img-fluid card-img-fixed" alt="...">
                                <div class="card-overlay">
                                    <i class="bi bi-play-fill play-icon"></i>
                                </div>
                            </a>
                            <div class="card-body">
                                <h5 class="card-title tajawal-bold fs-18 mb-2">مقدمة شاملة عن الشركة</h5>
                                <p class="card-text tajawal-regular fs-14 mb-2" style="color: #8590A6;">تعرف على تاريخ
                                    الشركة ورؤيتها ورسالتها وقيمها الأساسية، </p>
                                <div class="actions d-flex justify-content-between align-items-center">
                                    <span class="tajawal-regular fs-12 pdg">عام</span>
                                    <a class="tajawal-regular fs-16" href="">
                                        <i class="bi bi-play-circle"></i>
                                        <span>مشاهدة</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <span class="badge-live tajawal-medium">إجباري</span>
                            <a href="video-page.html" class="card-overlay-link" style="display:block; position:relative;">
                                <img src="{{ asset('assets/images/home_bg.jpeg') }}"
                                    class="card-img-top img-fluid card-img-fixed" alt="...">
                                <div class="card-overlay">
                                    <i class="bi bi-play-fill play-icon"></i>
                                </div>
                            </a>
                            <div class="card-body">
                                <h5 class="card-title tajawal-bold fs-18 mb-2">مقدمة شاملة عن الشركة</h5>
                                <p class="card-text tajawal-regular fs-14 mb-2" style="color: #8590A6;">تعرف على تاريخ
                                    الشركة ورؤيتها ورسالتها وقيمها الأساسية، </p>
                                <div class="actions d-flex justify-content-between align-items-center">
                                    <span class="tajawal-regular fs-12 pdg">عام</span>
                                    <a class="tajawal-regular fs-16" href="">
                                        <i class="bi bi-play-circle"></i>
                                        <span>مشاهدة</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- المودال -->
    <div class="modal fade vedios__modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-play-circle"></i>
                            <div>
                                <h4 class="tajawal-bold m-0">مقدمة عن الشركة</h4>
                                <div>
                                    <span class="category tajawal-medium fs-14">إداري</span>
                                    <span class="tajawal-regular fs-14" style="color: #4B5563;"><i
                                            class="bi bi-clock"></i>&nbsp; 10 دقائق</span>
                                    <span class="tajawal-bold fs-12 required">إجباري</span>
                                </div>
                            </div>
                        </div>
                        <i class="fa fa-times close" data-bs-dismiss="modal" aria-label="Close"></i>
                    </div>
                </div>
                <div class="modal-body p-0">
                    <div class="position-relative">

                        <!-- الصورة الخلفية -->
                        <img src="{{ asset('assets/images/home_bg.jpeg') }}" alt="Background" class="img-fluid w-100 vd__bg"
                            style="height: 648px; object-fit: cover;">

                        <!-- Overlay سوداء نصف شفافة -->
                        <div class="position-absolute top-0 start-0 w-100 h-100 "
                            style="background: #404141; opacity: .8;"></div>

                        <!-- المحتوى داخل الصورة -->
                        <div id="contentBox"
                            class="position-absolute top-50 start-50 translate-middle text-center text-white">

                            <!-- أيقونة الفيديو -->
                            <div class="mb-4 play" id="playIcon" style="cursor:pointer;">
                                <i class="fa fa-play fs-4"></i>
                            </div>

                            <!-- العنوان -->
                            <h3 class="mb-3 tajawal-bold fs-30">مقدمة عن الشركة</h3>

                            <!-- الوصف -->
                            <p class="mb-4 tajawal-regular fs-20">تعرف على تاريخ الشركة ورؤيتها ورسالتها وقيمها
                                الأساسية،
                                واكتشف كيف تساهم في تحقيق أهدافنا المستقبلية</p>

                            <!-- الأزرار -->
                            <div class="d-flex justify-content-center gap-2 mb-5 acts">
                                <button class="btn btn-primary tajawal-bold fs-18 start__play">
                                    <i class="fa fa-play fs-4"></i> بدء التشغيل
                                </button>
                                <button class="btn btn-primary tajawal-bold fs-18 start__download">
                                    <i class="fa fa-download fs-4"></i> تحميل الفيديو
                                </button>
                            </div>

                            <!-- شريط المشاهدات -->
                            <div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="tajawal-regular fs-14" style="color: #D1D5DB;">التقدم</span>
                                    <span class="tajawal-regular fs-14" style="color: #D1D5DB;">245 مشاهدة</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" style="width: 25%;"></div>
                                </div>
                            </div>
                        </div>

                        <!-- الفيديو (مخفي في البداية) -->
                        <video id="companyVideo" class="position-absolute top-0 start-0 w-100 h-100 d-none" controls>
                            <source src="assets/videos/test.mp4" type="video/mp4">
                        </video>

                    </div>
                </div>

                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="tajawal-bold fs-20 mb-3"> <i class="bi bi-info-circle"></i>تفاصيل الفيديو</h5>
                                <div class="details">
                                    <div class="d-flex item">
                                        <i class="fa fa-clock"></i>
                                        <div class="d-flex flex-column">
                                            <span class="tajawal-bold fs-14" style="color: #111827;">مدة الفيديو</span>
                                            <span class="tajawal-bold fs-18" style="color: #2563EB;">15 دقيقة </span>
                                        </div>
                                    </div>
                                    <div class="d-flex item">
                                        <i class="fa fa-eye views"></i>
                                        <div class="d-flex flex-column">
                                            <span class="tajawal-bold fs-14" style="color: #111827;">عدد
                                                المشاهدات</span>
                                            <span class="tajawal-bold fs-18" style="color: #16A34A;">245 مشاهدة</span>
                                        </div>
                                    </div>
                                    <div class="d-flex item">
                                        <i class="fa fa-user category"></i>
                                        <div class="d-flex flex-column">
                                            <span class="tajawal-bold fs-14" style="color: #111827;">الفئة المستهدفة
                                            </span>
                                            <span class="tajawal-bold fs-18" style="color: #9333EA;">إداري </span>
                                        </div>
                                    </div>
                                    <div class="d-flex item">
                                        <i class="fa fa-star type"></i>
                                        <div class="d-flex flex-column">
                                            <span class="tajawal-bold fs-14" style="color: #111827;">نوع الدورة
                                            </span>
                                            <span class="tajawal-bold fs-18" style="color: #DC2626;">دورة إجبارية
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6 how__learn">
                                <h5 class="tajawal-bold fs-20 mb-3"> <i class="bi bi-lightbulb"></i>ما ستتعلمه</h5>

                                <div class="learn mb-3">
                                    <p class="tajawal-regular fs-16 mb-4" style="color: #374151;">تعرف على تاريخ الشركة
                                        ورؤيتها ورسالتها وقيمها الأساسية، واكتشف كيف تساهم في تحقيق أهدافنا المستقبلية
                                    </p>
                                    <h6 class="tajawal-bold fs-18 mb-3" style="color: #111827;">النقاط الرئيسية:</h6>
                                    <ul>
                                        <li class="d-flex align-items-center tajawal-medium fs-16 mb-2"><i
                                                class="fa fa-check"></i>
                                            <p>فهم رسالة ورؤية الشركة</p>
                                        </li>
                                        <li class="d-flex align-items-center tajawal-medium fs-16 mb-2"><i
                                                class="fa fa-check"></i>
                                            <p>التعرف على القيم الأساسية</p>
                                        </li>
                                        <li class="d-flex align-items-center tajawal-medium fs-16 mb-2"><i
                                                class="fa fa-check"></i>
                                            <p>معرفة تاريخ وإنجازات الشركة</p>
                                        </li>
                                        <li class="d-flex align-items-center tajawal-medium fs-16 mb-3"><i
                                                class="fa fa-check"></i>
                                            <p>فهم الهيكل التنظيمي</p>
                                        </li>
                                    </ul>
                                    <div class="adv">
                                        <h6><i class="bi bi-trophy"></i><span class="tajawal-bold fs-14"
                                                style="color: #9A3412;">نصيحة للنجاح</span>
                                        </h6>
                                        <p class="tajawal-regular fs-14 " style="color: #C2410C;">احرص على تدوين
                                            الملاحظات المهمة أثناء المشاهدة وطبق ما تعلمته في
                                            عملك اليومي</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
