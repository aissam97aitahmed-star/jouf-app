<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>

<body>
    <header class="home__visitor">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between vs__cols">
                <div class="circle__bg z-1"></div>
                <div class="z-2">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person-add"></i>
                        <div>
                            <h4 class="tajawal-bold fs-20 m-0">نظام إدارة الزوار</h4>
                            <p class="tajawal-regular fs-16">منصة آمنة وسريعة لطلبات الزيارة</p>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="circle__bg z-1"></div>
                    <div class="text-center z-2 p-sticky">
                        <img src="{{ asset('assets/images/main-logo.png') }}" alt="" width="161px">
                    </div>
                </div>
                <div class="">
                    <a href="{{ route('visitor.apply') }}" class="btn btn-primary tajawal-regular fs-16 link" style="color: #00471F;"><i
                            class="bi bi-plus"></i> طلب تصريح جديد</a>
                    <a href="" class="btn btn-primary tajawal-regular fs-16 link" style="color: #00471F;"><i
                            class="bi bi-box-arrow-right"></i> طلب تصريح جديد</a>
                </div>
            </div>

        </div>
    </header>

    <section class="hero">
        <div class="container content">
            <div class="row">
                <div class="col-md-6 cls">
                    <h1 class="tajawal-bold fs-48 m-0">نظام الزوار الذكي</h1>
                    <h2 class="tajawal-bold fs-48 mb-4">مرحباً بك في</h2>
                    <p class="tajawal-regular fs-20 mb-4" style="color: #DBEAFE;">نظام متطور وآمن لإصدار تصاريح زيارات
                        الشركة. قدم طلبك الآن واحصل على الموافقة خلال دقائق معدودة.</p>
                    <div class="d-flex data mb-4">
                        <div class="text-center">
                            <strong style="color: #FACC15 ;" class="tajawal-bold fs-30">5 دقائق</strong>
                            <p class="tajawal-regular fs-14" style="color: #BFDBFE;">متوسط وقت الموافقة</p>
                        </div>
                        <div class="text-center">
                            <strong style="color: #4ADE80 ;" class="tajawal-bold fs-30">99 %</strong>
                            <p class="tajawal-regular fs-14" style="color: #BFDBFE;">معدل الموافقة</p>
                        </div>
                        <div class="text-center">
                            <strong style="color: #C084FC ;" class="tajawal-bold fs-30">27/4</strong>
                            <p class="tajawal-regular fs-14" style="color: #BFDBFE;">خدمة متواصلة</p>
                        </div>
                    </div>
                    <div class="actions">
                        <a href="{{ route('visitor.apply') }}" class="btn btn-primary tajawal-bold fs-18"><i
                                class="bi bi-play-circle"></i>إصدر
                            تصريح الآن</a>
                        <a href="" class="btn btn-primary tajawal-regular fs-18"><i
                                class="bi bi-play-circle"></i> شاهد
                            الفيديو التوضيحي</a>
                    </div>
                </div>
                <div class="col-md-6 cls">
                    <div class="statistic">
                        <h4 class="tajawal-bold fs-24">إحصائيات اليوم</h4>
                        <div class="item d-flex align-items-center justify-content-between">
                            <i class="bi bi-person-add"></i>
                            <div style="flex: 1;">
                                <p class="tajawal-medium fs-16">طلبات جديدة</p>
                                <p class="tajawal-regular fs-14" style="color: #BFDBFE;">اليوم</p>
                            </div>
                            <strong class="tajawal-bold fs-24" style="color: #4ADE80;">47</strong>
                        </div>
                        <div class="item d-flex align-items-center justify-content-between">
                            <i class="bi bi-check2-all" style="background: #3B82F633; color: #60A5FA;"></i>
                            <div style="flex: 1;">
                                <p class="tajawal-medium fs-16">طلبات مقبولة</p>
                                <p class="tajawal-regular fs-14" style="color: #BFDBFE;">اليوم</p>
                            </div>
                            <strong class="tajawal-bold fs-24" style="color: #60A5FA;">45</strong>
                        </div>
                        <div class="item d-flex align-items-center justify-content-between">
                            <i class="bi bi-person-fill-exclamation" style="background: #A855F733; color: #C084FC;"></i>
                            <div style="flex: 1;">
                                <p class="tajawal-medium fs-16">زوار حاليون</p>
                                <p class="tajawal-regular fs-14" style="color: #BFDBFE;">داخل المبنى</p>
                            </div>
                            <strong class="tajawal-bold fs-24" style="color: #C084FC;">23</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="visits">
        <div class="container ">
            <h2 class="tajawal-bold fs-36 text-center">أنواع الزيارات المتاحة</h2>
            <p class="tajawal-regular fs-20 mb-4 text-center" style="color: #4B5563;">اختر نوع الزيارة المناسب لك
                واحصل
                على تصريح دخول سريع وآمن</p>
            <div class="row align-items-stretch">
                <div class="col-md-3">
                    <div class="item">
                        <i class="bi bi-briefcase mb-4 start"></i>
                        <h3 class="tajawal-bold fs-24 mb-4" style="color: #111827;">زيارة عمل</h3>
                        <p class="tajawal-regular fs-16 mb-4" style="color: #4B5563;">اجتماعات عمل، مقابلات، استشارات
                            مهنية</p>
                        <p class="tajawal-regular fs-14 mb-2" style="color: #6B7280;"> <i class="bi bi-clock"></i>
                            المدة
                            المتوقعة: 1-9 ساعات</p>
                        <h6 class="tajawal-medium fs-16" style="color: #374151;">المتطلبات:</h6>
                        <ul class="p-0 mb-4">
                            <li class="tajawal-regular fs-14" style="color: #6B7280;"><i class="bi bi-check"></i>
                                هوية
                                شخصية</li>
                            <li class="tajawal-regular fs-14" style="color: #6B7280;"><i class="bi bi-check"></i>
                                موعد
                                مسبق</li>
                        </ul>
                        <a href="{{ route('visitor.apply') }}"
                            class="btn btn-primary tajawal-medium fs-16 w-100 apply d-flex align-items-center">
                            <span>قدم طلب زيارة عمل </span><i class="bi bi-arrow-left"></i></a>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="item">
                        <i class="bi bi-truck mb-4 start gradient__2"></i>
                        <h3 class="tajawal-bold fs-24 mb-4" style="color: #111827;">تسليم طرود</h3>
                        <p class="tajawal-regular fs-16 mb-4" style="color: #4B5563;">تسليم مستندات، طرود، معدات</p>
                        <p class="tajawal-regular fs-14 mb-2" style="color: #6B7280;"> <i class="bi bi-clock"></i>
                            المدة
                            المتوقعة: 15-60 دقيقة</p>
                        <h6 class="tajawal-medium fs-16" style="color: #374151;">المتطلبات:</h6>
                        <ul class="p-0 mb-4">
                            <li class="tajawal-regular fs-14" style="color: #6B7280;"><i class="bi bi-check"></i>
                                هوية
                                شخصية</li>
                            <li class="tajawal-regular fs-14" style="color: #6B7280;"><i class="bi bi-check"></i>
                                إثبات التسليم</li>
                        </ul>
                        <a href="{{ route('visitor.apply') }}"
                            class="btn btn-primary tajawal-medium fs-16 w-100 apply d-flex align-items-center gradient__2">
                            <span>قدم طلب تسليم طرود </span><i class="bi bi-arrow-left"></i></a>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="item">
                        <i class="bi bi-tools mb-4 start gradient__3"></i>
                        <h3 class="tajawal-bold fs-24 mb-4" style="color: #111827;">صيانة وخدمات</h3>
                        <p class="tajawal-regular fs-16 mb-4" style="color: #4B5563;">أعمال صيانة، خدمات، خدمات تقنية
                        </p>
                        <p class="tajawal-regular fs-14 mb-2" style="color: #6B7280;"> <i class="bi bi-clock"></i>
                            المدة
                            المتوقعة: 1-9 ساعات</p>
                        <h6 class="tajawal-medium fs-16" style="color: #374151;">المتطلبات:</h6>
                        <ul class="p-0 mb-4">
                            <li class="tajawal-regular fs-14" style="color: #6B7280;"><i class="bi bi-check"></i>
                                هوية
                                شخصية</li>
                            <li class="tajawal-regular fs-14" style="color: #6B7280;"><i class="bi bi-check"></i>
                                تصريح عمل</li>
                            <li class="tajawal-regular fs-14" style="color: #6B7280;"><i class="bi bi-check"></i>
                                معدات السلامة</li>
                        </ul>
                        <a href="{{ route('visitor.apply') }}"
                            class="btn btn-primary tajawal-medium fs-16 w-100 apply d-flex align-items-center gradient__3">
                            <span>قدم طلب صيانة وخدمات </span><i class="bi bi-arrow-left"></i></a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="item">
                        <i class="bi bi-person-heart mb-4 start gradient__4"></i>
                        <h3 class="tajawal-bold fs-24 mb-4" style="color: #111827;">زيارة شخصية</h3>
                        <p class="tajawal-regular fs-16 mb-4" style="color: #4B5563;">زيارة موظف، مناسبة اجتماعية
                        </p>
                        <p class="tajawal-regular fs-14 mb-2" style="color: #6B7280;"> <i class="bi bi-clock"></i>
                            المدة
                            المتوقعة: 30 دقيقة - 2 ساعة</p>
                        <h6 class="tajawal-medium fs-16" style="color: #374151;">المتطلبات:</h6>
                        <ul class="p-0 mb-4">
                            <li class="tajawal-regular fs-14" style="color: #6B7280;"><i class="bi bi-check"></i>
                                هوية
                                شخصية</li>
                            <li class="tajawal-regular fs-14" style="color: #6B7280;"><i class="bi bi-check"></i>
                                دعوة من موظف</li>
                        </ul>
                        <a href="{{ route('visitor.apply') }}"
                            class="btn btn-primary tajawal-medium fs-16 w-100 apply d-flex align-items-center gradient__4">
                            <span>قدم طلب زيارة شخصية </span><i class="bi bi-arrow-left"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="system">
        <div class="container">
            <h2 class="tajawal-bold fs-36 text-center" style="color: #111827;">كيف يعمل النظام؟</h2>
            <p class="tajawal-regular fs-20 mb-5 text-center" style="color: #4B5563;">أربع خطوات بسيطة للحصول على
                تصريح
                دخول آمن ومعتمد</p>
            <div class="row align-items-stretch mb-5">
                <div class="col-md-3">
                    <div class="item">
                        <div class="icon-container mb-4">
                            <span class="number">1</span>
                            <div class="badge">
                                <i class="bi bi-cursor"></i>
                            </div>
                        </div>
                        <h3 class="tajawal-bold fs-20 mb-4" style="color: #111827;">اختر نوع الزيارة</h3>
                        <p class="tajawal-regular fs-16 text-center" style="color: #4B5563;">حدد الغرض من زيارتة
                            للمنشأة
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <div class="icon-container mb-4">
                            <span class="number">2</span>
                            <div class="badge">
                                <i class="bi bi-pencil"></i>
                            </div>
                        </div>
                        <h3 class="tajawal-bold fs-20 mb-4" style="color: #111827;">املأ البيانات</h3>
                        <p class="tajawal-regular fs-16 text-center" style="color: #4B5563;">أدخل معلوماتك الشخصية
                            وتفاصيل الزائر</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <div class="icon-container mb-4">
                            <span class="number">3</span>
                            <div class="badge">
                                <i class="bi bi-clock"></i>
                            </div>
                        </div>
                        <h3 class="tajawal-bold fs-20 mb-4" style="color: #111827;">انتظر الموافقة</h3>
                        <p class="tajawal-regular fs-16 text-center" style="color: #4B5563;">سيتم مراجعة طلبك والرد
                            خلال
                            من قبل إدارة الامن</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <div class="icon-container mb-4">
                            <span class="number">4</span>
                            <div class="badge">
                                <i class="bi bi-qr-code"></i>
                            </div>
                        </div>
                        <h3 class="tajawal-bold fs-20 mb-4" style="color: #111827;">احصل على التصريح</h3>
                        <p class="tajawal-regular fs-16 text-center" style="color: #4B5563;">الزائر سيقوم باستلام رمز
                            QR
                            للدخول عر الرسائل النصية والواتساب</p>
                    </div>
                </div>

            </div>
            <div class="text-center">
                <a href="" class="btn btn-primary tajawal-bold fs-18 export__permit"><i
                        class="bi bi-rocket"></i> إصدار
                    تصريح </a>
            </div>
        </div>
    </section>


    <section class="creating">
        <div class="container">
            <h2 class="tajawal-bold fs-36 text-center" style="color: #111827;">لماذا تم انشاء النظام؟</h2>
            <p class="tajawal-regular fs-20 mb-5 text-center" style="color: #4B5563;">معرفة وإدارة الزوار القادمين
                للشركة لرفع متوى الامان
            </p>
            <div class="row">
                <div class="col-md-3">
                    <div class="item">
                        <i class="bi bi-clock mb-4"></i>
                        <h4 class="tajawal-bold fs-20" style="color: #111827;">سرعة في الإجراءات</h4>
                        <p class="tajawal-regular fs-16" style="color: #4B5563;">معالجة سريعة للطلبات </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <i class="bi bi-shield-check mb-4"></i>
                        <h4 class="tajawal-bold fs-20" style="color: #111827;">أمان عالي</h4>
                        <p class="tajawal-regular fs-16" style="color: #4B5563;">نظام أمني متطور لحماية المنشأة </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="item">
                        <i class="bi bi-tablet mb-4"></i>
                        <h4 class="tajawal-bold fs-20" style="color: #111827;"> تتبع إلكتروني</h4>
                        <p class="tajawal-regular fs-16" style="color: #4B5563;">متابعة حالة طلبك عبر المنصة </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <i class="bi bi-headset mb-4"></i>
                        <h4 class="tajawal-bold fs-20" style="color: #111827;">دعم متواصل</h4>
                        <p class="tajawal-regular fs-16" style="color: #4B5563;">فريق دعم متاح لمساعدتك </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="end">
        <h3 class="tajawal-bold fs-36 text-center text-white mb-5">جاهز لاستقبال زوار جدد ؟</h3>
        <div class="text-center">
            <a href="{{ route('visitor.apply') }}" class="btn btn-primary tajawal-bold fs-18 apply"><i class="bi bi-person-add"></i> قدم
                طلب
                تصريح</a>
            <a href="" class="btn btn-primary tajawal-regular fs-16 contact"><i class="bi bi-telephone"></i>
                تواصل
                معنا</a>
        </div>
    </footer>
    <div>
        <img src="{{ asset('assets/images/footer.jpg') }}" alt="" width="100%">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
