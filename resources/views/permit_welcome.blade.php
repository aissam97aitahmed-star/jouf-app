<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Aljouf Portal </title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/add.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>

<body>
    <button type="button" class="btn btn-back-to-top shadow" id="btn-back-to-top" title="العودة للأعلى">
        <i class="bi bi-arrow-up"></i>
        <svg class="progress-circle" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </button>

    <header class="home__visitor">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between vs__cols">
                <div class="d-flex align-items-center">
                    <button id="menuToggle" class="btn btn-light">
                        <i class="bi bi-list fs-3"></i>
                    </button>
                    <a href="{{ route('index') }}"><i class="bi bi-arrow-right-circle"></i></a>
                    <i class="bi bi-person-add"></i>
                    <div>
                        <h4 class="tajawal-bold fs-20 m-0">نظام إدارة الزوار</h4>
                        <p class="tajawal-regular fs-16">منصة آمنة وسريعة لطلبات الزيارة</p>
                    </div>
                </div>
                <div class="">
                    <img src="{{ asset('assets/images/main-logo.png') }}" alt="" width="161px">

                </div>
                <div class="">
                    <a href="{{ route('visitor.apply') }}" class="btn btn-primary tajawal-regular fs-16 link"
                        style="color: #00471F;"><i class="bi bi-plus"></i> طلب تصريح جديد</a>
                    <a href="{{ route('officer_security.login') }}" class="btn btn-primary tajawal-regular fs-16 link"
                        style="color: #00471F;"><i class="bi bi-box-arrow-right"></i>تسجيل دخول الموظفين</a>

                </div>
            </div>

        </div>
    </header>

    <div id="sideMenu" class="side-menu">
        <button id="menuClose" class="close-btn">
            <i class="bi bi-x-lg text-white"></i>
        </button>

        <ul class="menu-links">
            <li><a href="#hero"><i class="bi bi-arrow-return-left"></i> الصفحة الرئيسية</a></li>
            <li><a href="#about-section"><i class="bi bi-arrow-return-left"></i> عن الشركة</a></li>
            <li><a href="#vision-section"><i class="bi bi-arrow-return-left"></i> رؤيتنا الاستراتيجية</a></li>
            <li><a href="#product-section"><i class="bi bi-arrow-return-left"></i> المنتجات الصناعية</a></li>
            <li><a href="#agricultural_crops"><i class="bi bi-arrow-return-left"></i> المحاصيل الزراعية</a></li>
            <li><a href="#facilities-modern"><i class="bi bi-arrow-return-left"></i> المرافق الصناعية</a></li>
            <li><a href="#cert-section"><i class="bi bi-arrow-return-left"></i> الشهادات الرسمية</a></li>
            <li><a href="#visit"><i class="bi bi-arrow-return-left"></i> أنواع الزيارات</a></li>
            <li><a href="#mecan"><i class="bi bi-arrow-return-left"></i> آلية التصاريح</a></li>
            <li><a href="#system"><i class="bi bi-arrow-return-left"></i> هدف النظام</a></li>
            <li><a href="#work-hours-section"><i class="bi bi-arrow-return-left"></i>أوقات العمل الرسمي</a></li>
        </ul>
    </div>

    <div id="menuOverlay" class="menu-overlay"></div>

    <section class="hero" id="hero">
        <div class="container content">
            <div class="row">
                <div class="col-md-12 cls text-center py-2">
                    <h1 class="tajawal-bold fs-48 mb-4"> مرحباً بك في نظام الزوار الذكي</h1>
                    <p class="tajawal-regular fs-20 mb-4" style="color: #DBEAFE;">نظام متطور وآمن لإصدار تصاريح زيارات
                        الشركة. قدم طلبك الآن واحصل على الموافقة خلال دقائق معدودة.</p>
                    <div class="d-flex data mb-4 justify-content-center">
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

                        @if ($homeVideo && $homeVideo->video_path)
                            <a href="#" data-bs-toggle="modal" data-bs-target="#homeVideoModal"
                                class="btn btn-primary tajawal-regular fs-18"><i class="bi bi-play-circle"></i> شاهد
                                الفيديو التوضيحي</a>
                        @endif
                    </div>
                </div>
                {{-- <div class="col-md-6 cls">
                    <div class="statistic">
                        <h4 class="tajawal-bold fs-24">إحصائيات اليوم</h4>
                        <div class="item d-flex align-items-center justify-content-between">
                            <i class="bi bi-person-add"></i>
                            <div style="flex: 1;">
                                <p class="tajawal-medium fs-16">طلبات جديدة</p>
                                <p class="tajawal-regular fs-14" style="color: #BFDBFE;">اليوم</p>
                            </div>
                            <strong class="tajawal-bold fs-24" style="color: #4ADE80;">{{ $totalCountToday }}</strong>
                        </div>
                        <div class="item d-flex align-items-center justify-content-between">
                            <i class="bi bi-check2-all" style="background: #3B82F633; color: #60A5FA;"></i>
                            <div style="flex: 1;">
                                <p class="tajawal-medium fs-16">طلبات مقبولة</p>
                                <p class="tajawal-regular fs-14" style="color: #BFDBFE;">اليوم</p>
                            </div>
                            <strong class="tajawal-bold fs-24" style="color: #60A5FA;">{{ $completedCount }}</strong>
                        </div>
                        <div class="item d-flex align-items-center justify-content-between">
                            <i class="bi bi-person-fill-exclamation" style="background: #A855F733; color: #C084FC;"></i>
                            <div style="flex: 1;">
                                <p class="tajawal-medium fs-16">زوار حاليون</p>
                                <p class="tajawal-regular fs-14" style="color: #BFDBFE;">داخل المبنى</p>
                            </div>
                            <strong class="tajawal-bold fs-24" style="color: #C084FC;">{{ $inProgressCount ?? 0 }}</strong>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <section class="about-modern" id="about-section" dir="rtl">
        <div class="container">
            <div class="row align-items-center g-5">

                <div class="col-lg-6">
                    <div class="about-visual-container">
                        <img src="{{ asset('assets/images/home_bg.jpeg') }}" class="img-fluid main-about-img"
                            alt="الجوف للتنمية الزراعية">

                        <div class="exp-badge">
                            <span class="exp-year">1988م</span>
                            <span class="tajawal-regular">تاريخ من العطاء</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <span class="section-subtitle tajawal-light">إرث عريق</span>
                    <h2 class="about-title tajawal-bold">من نحن ؟</h2>

                    <p class="lead-text tajawal-bold">
                        تعد شركة الجوف للتنمية الزراعية أحد أكبر الصروح الزراعية والصناعية الرائدة في المملكة العربية
                        السعودية.
                    </p>

                    <p class="body-text tajawal-regular">
                        تأسست الشركة عام 1988م، برأس مال قدره 300 مليون ريال سعودي، وهي شركة مساهمة عامة مدرجة. بدأت
                        أولى نشاطاتها في منطقة بسيطا الجوف - وادي السرحان على أرض واسعة تمتد لتغطي أكثر من <strong>421
                            مليون متر مربع</strong>.
                    </p>

                    <div class="highlight-box">
                        <div class="highlight-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div>
                            <h5 class="m-0 tajawal-bold" style="color: var(--jadco-green);">الأمن الغذائي</h5>
                            <p class="m-0 small text-muted tajawal-regular">أحد أهم مصادر تأمين الغذاء في المملكة وفق
                                رؤية 2030.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="vs-modern-section" id="vision-section" dir="rtl">
        <div class="container-fluid p-0">
            <div class="row g-0 d-flex">

                <div class="col-lg-6 vs-box vision-box">
                    <div class="bg-text-decor">VISION</div>

                    <div class="vs-icon-circle">
                        <i class="bi bi-eye"></i>
                    </div>

                    <h2 class="vs-title tajawal-bold">الرؤية</h2>

                    <p class="vs-description tajawal-regular">
                        نعمل لنكون الشركة الرائدة في الشرق الأوسط في مجال زراعة وصناعة المنتجات الغذائية، ونبذل قصارى
                        جهدنا لنوفر الجودة العالية التي تلبي توقعات عملائنا، والربحية المستدامة التي ترضي مساهمينا.
                    </p>
                </div>

                <div class="col-lg-6 vs-box strategy-box">
                    <div class="bg-text-decor">STRATEGY</div>

                    <div class="vs-icon-circle">
                        <i class="bi bi-gear-wide-connected"></i>
                    </div>

                    <h2 class="vs-title tajawal-bold">الإستراتيجية</h2>

                    <p class="vs-description tajawal-regular">
                        التحول الجذري والمستدام من القطاع الزراعي إلى القطاع <strong>"الزراعي- الصناعي"</strong>
                        المتكامل، للمساهمة الفعالة في تحقيق مستهدفات رؤية المملكة 2030م.
                    </p>

                    <div>
                        <div class="v2030-pill tajawal-light">
                            <i class="bi bi-award me-2 "></i> رؤية المملكة 2030
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <section class="product-section" dir="rtl" id="product-section">
        <div class="container">
            <div class="header-box" style="margin-bottom: 0px">
                <h2 class="display-5 fw-bold text-dark tajawal-bold">المنتجات الصناعية</h2>
                <p class="text-muted fs-5 tajawal-regular ">انطلاقاً من ريادتنا في القطاع الزراعي، خطونا بثبات نحو
                    التصنيع الغذائي لتعظيم القيمة المضافة لخيرات أرضنا. نسخر في قطاعنا الصناعي أحدث التقنيات العالمية
                    لنقدم منتجات وطنية بجودة استثنائية، تساهم في تعزيز الأمن الغذائي وتجسد التحول الإستراتيجي للشركة بما
                    يواكب تطلعات رؤية المملكة 2030.</p>
            </div>
        </div>
        <div class="container py-5">

            <div class="row g-5">

                <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                    <div class="brand-product-card">
                        <div class="brand-image-wrapper">
                            <img src="{{ asset('assets/images/honey.png') }}" alt="Honey image" class="brand-img">
                        </div>
                        <div class="card-body p-0">
                            <h3 class="brand-product-title tajawal-bold">العسل</h3>
                            <p class="brand-english-title text-white">Honey</p>
                            <p class="brand-product-desc tajawal-regular fs-18 text-white">
                                توفر شركة الجوف للتنمية الزراعية عسل النحل الطبيعي والذي يمتاز بجودته ومذاقه بأنواع
                                مختلفة مثل (عسل صافي، بحبوب اللقاح، بغذاء الملكات، بحبة البركة، بالشمع والمزيد)
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                    <div class="brand-product-card">
                        <div class="brand-image-wrapper">
                            <img src="{{ asset('assets/images/olive_oil.png') }}" alt="Olive Oil" class="brand-img">
                        </div>
                        <div class="card-body p-0">
                            <h3 class="brand-product-title tajawal-bold">زيت الزيتون</h3>
                            <p class="brand-english-title text-white">Olive Oil</p>
                            <p class="brand-product-desc tajawal-regular fs-18 text-white">
                                تنتج شركة الجوف للتنمية الزراعية أجود أنواع زيت الزيتون البكر الممتاز العضوي الفاخر
                                المعصور على البارد، وتعتبر الشركة الرائدة في المملكة في إنتاج زيت الزيتون عالي الجودة
                                وفق أعلى المعايير العالمية، بطاقة إنتاجية سنوية 8 آلاف طن.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-5 mb-md-0">
                    <div class="brand-product-card">
                        <div class="brand-image-wrapper">
                            <img src="{{ asset('assets/images/frozen_fries.png') }}" alt="Frozen Fries"
                                class="brand-img">
                        </div>
                        <div class="card-body p-0">
                            <h3 class="brand-product-title tajawal-bold">أصابع البطاطس</h3>
                            <p class="brand-english-title text-white">Frozen Fries</p>
                            <p class="brand-product-desc tajawal-regular fs-18 text-white">
                                بدأت شركة الجوف للتنمية الزراعية في إنتاج أصابع البطاطس في عام 2023 بطاقة إنتاجية قدرها
                                35،000 طن/سنة وتعتبر من أكبر المصانع في المملكة العربية السعودية التي تنتج أفضل المنتجات
                                ذات جودة عالية.
                            </p>
                            {{-- <p class="brand-english-desc">
                                JADCO started producing 35,000 tons/yr of Frozen Fries in 2023. Our Frozen Fries factory
                                is considered to be the biggest Frozen Fries factory in the Kingdom which produces the
                                highest premium quality of fries.
                            </p> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="facilities-modern" dir="rtl" id="facilities-modern">
        <div class="container">
            <div class="header-box">
                <h2 class="display-5 fw-bold text-dark tajawal-bold">المرافق الصناعية</h2>
                <p class="text-muted fs-5 tajawal-regular ">بنية تحتية متطورة تضمن استدامة الإنتاج وجودة المخرجات</p>
            </div>
        </div>

        <div class="container p-0">
            <div class="row g-0 facility-row">
                <div class="col-lg-6 facility-image-col">
                    <img src="{{ asset('assets/images/fab1.png') }}" alt="Olive Oil Plant" class="facility-img">
                </div>
                <div class="col-lg-6 facility-text-col">
                    <div class="facility-number">01</div>
                    <h3 class="facility-name tajawal-regular">المجمع الصناعي لزيت الزيتون </h3>
                    <p class="facility-desc tajawal-light">
                        يُعد هذا المجمع الركيزة الأساسية لسلسلة القيمة لدينا، حيث يجمع بين أحدث تقنيات العصر البارد
                        وأنظمة التشغيل المؤتمتة للحفاظ على الجودة الطبيعية لزيت الزيتون. تعتمد خطوط الإنتاج على معايير
                        دقيقة في الفرز والاستخلاص والتخزين لضمان منتج غني بالقيمة الغذائية، بنكهته الأصلية وثباته العالي
                        وفق أعلى المواصفات العالمية.
                    </p>
                </div>
            </div>

            <div class="row g-0 facility-row">
                <div class="col-lg-6 facility-image-col">
                    <img src="{{ asset('assets/images/fab2.png') }}" alt="Potato Plant" class="facility-img">
                </div>
                <div class="col-lg-6 facility-text-col">
                    <div class="facility-number">02</div>
                    <h3 class="facility-name tajawal-regular">مشروع اصابع البطاطس </h3>
                    <p class="facility-desc tajawal-light">
                        يمثل هذا المشروع نموذجاً متطوراً للصناعات الغذائية التحويلية، إذ يتم فيه اختيار أجود المحاصيل
                        ومعالجتها عبر خطوط تقطيع وتجميد سريعة تحافظ على القوام والطعم الطبيعي. كما تعتمد العمليات على
                        أنظمة رقابة جودة مستمرة لضمان تقديم منتج صحي ومتجانس يلبي متطلبات الأسواق المحلية والدولية.
                    </p>
                </div>
            </div>

            <div class="row g-0 facility-row">
                <div class="col-lg-6 facility-image-col">
                    <img src="{{ asset('assets/images/fab3.png') }}" alt="Packaging Center" class="facility-img">
                </div>
                <div class="col-lg-6 facility-text-col">
                    <div class="facility-number">03</div>
                    <h3 class="facility-name tajawal-regular">محطة تنقية ومعالجة البذور </h3>
                    <p class="facility-desc tajawal-light">
                        تُعد هذه المحطة خطوة محورية في تعزيز كفاءة الإنتاج الزراعي، حيث توفر عمليات متكاملة لتنظيف وفرز
                        ومعالجة البذور باستخدام تقنيات دقيقة تضمن نقاءها وحيويتها. تسهم هذه العمليات في رفع معدلات
                        الإنبات وتحسين جودة المحاصيل، بما يدعم الاستدامة الزراعية ويعزز الإنتاجية على المدى الطويل.
                    </p>
                </div>
            </div>
            <div class="row g-0 facility-row">
                <div class="col-lg-6 facility-image-col">
                    <img src="{{ asset('assets/images/fab4.png') }}" alt="Potato Plant" class="facility-img">
                </div>
                <div class="col-lg-6 facility-text-col">
                    <div class="facility-number">04</div>
                    <h3 class="facility-name tajawal-regular">مصنع المخللات </h3>
                    <p class="facility-desc tajawal-light">
                        يعمل المصنع وفق منظومة تصنيع حديثة تركز على الحفاظ على القيمة الغذائية والمذاق الطبيعي للخضروات.
                        تبدأ العملية باختيار المواد الخام بعناية ثم معالجتها وفق أساليب تخليل مدروسة تضمن التوازن
                        المثالي بين النكهة والسلامة الغذائية، ليخرج المنتج النهائي بجودة عالية وثبات في الطعم والشكل.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section style="background: #f7f6f2;" id="agricultural_crops">
        <div class="container py-5" dir="rtl">
            <div class="container">
                <div class="header-box" style="margin-bottom: 0px">
                    <h2 class="display-5 fw-bold text-dark tajawal-bold">المحاصيل الزراعية</h2>
                    <p class="text-muted fs-5 tajawal-regular ">تعتمد محاصيلنا الزراعية على ممارسات زراعة حديثة تجمع
                        بين
                        الخبرة الميدانية والتقنيات المتطورة لضمان أعلى مستويات الجودة والإنتاجية. نولي عناية خاصة
                        لاختيار
                        الأصناف المناسبة لكل موسم، مع تطبيق أنظمة ريّ ذكية وأساليب حصاد متقدمة تحافظ على القيمة الغذائية
                        للمحصول وتدعم استدامة الموارد الزراعية. هدفنا هو تقديم منتجات طبيعية موثوقة تلبي احتياجات
                        الأسواق
                        المحلية والدولية بمعايير جودة ثابتة.
                    </p>
                </div>
            </div>

            <div class="swiper productSwiper pb-5">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="brand-product-card">
                            <div class="brand-image-wrapper">
                                <img src="{{ asset('assets/images/olives.png') }}" alt="الزيتون" class="brand-img">
                            </div>
                            <div class="card-body p-0">
                                <h3 class="brand-product-title tajawal-bold">الزيتون</h3>
                                <p class="brand-product-desc tajawal-regular fs-18 text-white mt-4">
                                    تمتلك شركة الجوف للتنمية الزراعية أكبر مزرعة زيتون عضوي حديثة
                                    في العالم وبذلك حصلت على شهادة غينيس لألرقام القياسية، حيث يعتبر
                                    الزيتون من المنتجات اإلستراتيجية للشركة ولدى الشركة أكثر من
                                    ٦مليون شجرة زيتون
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="brand-product-card">
                            <div class="brand-image-wrapper">
                                <img src="{{ asset('assets/images/wheat.png') }}" alt="العسل" class="brand-img">
                            </div>
                            <div class="card-body p-0">
                                <h3 class="brand-product-title tajawal-bold">القمح</h3>
                                <p class="brand-product-desc tajawal-regular fs-18 text-white mt-4">
                                    تعتبر شركة الجوف للتنمية الزراعية عضوا فعالًا في لجنة منتجي البذور
                                    تحت مظلة وزارة البيئة والمياه والزراعة، وتقوم بإنتاج بذور القمح وفقاً
                                    لأفضل المواصفات العالمية وامدادها للمزارعين وتعتبر الشركة من أكبر
                                    الشركات في إنتاج القمح في المملكة
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-product-card">
                            <div class="brand-image-wrapper">
                                <img src="{{ asset('assets/images/potato.png') }}" alt="العسل" class="brand-img">
                            </div>
                            <div class="card-body p-0">
                                <h3 class="brand-product-title tajawal-bold">البطاطس</h3>
                                <p class="brand-product-desc tajawal-regular fs-18 text-white mt-4">
                                    يعتبر محصول البطاطس من المحاصيل اإلستراتيجية في شركة الجوف
                                    للتنمية الزراعية، حيث يمتاز بوفرة إنتاجه وارتفاع جودته ، والذي يساهم
                                    في تغطية طلب السوق السعودي في جميع قنوات البيع في المملكة وتعتبر
                                    الشركة من أكبر منتجي البطاطس التصنيعية في المملكة
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-product-card">
                            <div class="brand-image-wrapper">
                                <img src="{{ asset('assets/images/pickles.png') }}" alt="العسل"
                                    class="brand-img">
                            </div>
                            <div class="card-body p-0">
                                <h3 class="brand-product-title tajawal-bold">المخللات</h3>
                                <p class="brand-product-desc tajawal-regular fs-18 text-white mt-4">
                                    تنتج شركة الجوف للتنمية الزراعية أجود أنواع مخللات الزيتون بعد
                                    أشكال مختلفة مثل ) الزيتون األخضر واألسود " حبة كاملة، منزوع
                                    النواة ، شرائح". معجون الزيتون، سلطة الزيتون ، والمزيد (. ويبلغ
                                    إنتاجها السنوي مايزيد عن ٦٠٠ طن.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-product-card">
                            <div class="brand-image-wrapper">
                                <img src="{{ asset('assets/images/palms.png') }}" alt="العسل" class="brand-img">
                            </div>
                            <div class="card-body p-0">
                                <h3 class="brand-product-title tajawal-bold">النخيل</h3>
                                <p class="brand-product-desc tajawal-regular fs-18 text-white mt-4">
                                    تمتلك شركة الجوف للتنمية الزراعية أكثر من 15 ألف شجرة نخيل ،
                                    وتنتج التمر البرحي ذو الجودة العالية والذي تمتاز به منطقة الجوف
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-product-card">
                            <div class="brand-image-wrapper">
                                <img src="{{ asset('assets/images/Fruits.png') }}" alt="العسل" class="brand-img">
                            </div>
                            <div class="card-body p-0">
                                <h3 class="brand-product-title tajawal-bold">الفواكة</h3>
                                <p class="brand-product-desc tajawal-regular fs-18 text-white mt-4">
                                    تقوم الشركة بزراعة الأشجار متساقطة الثمار كالخوخ والمشمش
                                    والبرقوق والكمثري والعنب بأكثر من ١٥٠ ألف شجرة فاكهة موزعة
                                    على حقول وبساتين الشركة. ويبلغ إنتاجها السنوي مايزيد عن ٣ اآلف
                                    طن.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>


    <section class="visits" id="visit">
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


    <section class="system" id="mecan">
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

    <section class="creating" id="system">
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


    <section class="cert-section" dir="rtl" id="cert-section">
        <div class="container">
            <div class="cert-header text-center mb-5">
                <h2 class="tajawal-bold fs-36 mb-3">الشهادات والاعتمادات</h2>
                <p class="text-muted tajawal-regular mx-auto" style="max-width: 700px;">
                    نفخر في شركة الجوف بحصولنا على أرقى الشهادات العالمية التي تعكس التزامنا بأعلى معايير الجودة
                    والاستدامة.
                </p>
            </div>

            <div class="swiper certSwiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="cert-card">
                            {{-- <div class="trust-badge tajawal-extralight">سجل عالمي</div> --}}
                            <div class="cert-icon-box">
                                <img src="{{ asset('assets/images/guiness.png') }}" width="90px" height="90px"
                                    alt="">
                            </div>
                            <h3 class="cert-title tajawal-bold">موسوعة غينيس للأرقام
                                القياسية</h3>
                            <p class="cert-desc tajawal-regular">حصلت شركة الجوف للتنمية الزراعية على شهادتي جينيس
                                باعتبارها أكبر مزرعة زيتون حديثة وعضوية.</p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="cert-card">
                            {{-- <div class="trust-badge tajawal-extralight">جودة</div> --}}
                            <div class="cert-icon-box">
                                <img src="{{ asset('assets/images/sfda.png') }}" width="90px" height="90px"
                                    alt="">
                            </div>
                            <h3 class="cert-title tajawal-bold">الهيئة العامة للغذاء والدواء (SFDA)</h3>
                            <p class="cert-desc tajawal-regular">ترخيص الهيئة العامة للغذاء والدواء يشمل المنشأة
                                بالكامل إذ تخضع للأنظمة واللوائح المحددة.</p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="cert-card">
                            {{-- <div class="trust-badge tajawal-extralight">مستتمر</div> --}}
                            <div class="cert-icon-box">
                                <img src="{{ asset('assets/images/organic.png') }}" width="90px" height="90px"
                                    alt="">
                                {{-- <i class="bi bi-flower1"></i> --}}
                            </div>
                            <h3 class="cert-title tajawal-bold">عضوي (ORGANIC)</h3>
                            <p class="cert-desc tajawal-regular">
                                عضوي من الجمعية السعودية للزراعة
                                العضوية
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cert-card">
                            {{-- <div class="trust-badge tajawal-extralight">مستتمر</div> --}}
                            <div class="cert-icon-box">
                                <img src="{{ asset('assets/images/saso.png') }}" width="90px" height="90px"
                                    alt="">
                                {{-- <i class="bi bi-flower1"></i> --}}
                            </div>
                            <h3 class="cert-title tajawal-bold">الهيئة السعودية للمواصفات والمقاييس (SASO)</h3>
                            <p class="cert-desc tajawal-regular">
                                عالمة الجودة السعودية تمنح عالمة الجودة من هيئة
                                المواصفات والمقاييس السعودية وهي شهادة منتج
                                مطابق للمواصفات والمقاييس السعودية والخاصة
                                بالجودة إلنتاج منتج امن داخل المجمع الصناعي
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cert-card">
                            {{-- <div class="trust-badge tajawal-extralight">مستتمر</div> --}}
                            <div class="cert-icon-box">
                                <img src="{{ asset('assets/images/gptw.png') }}" width="90px" height="90px"
                                    alt="">
                                {{-- <i class="bi bi-flower1"></i> --}}
                            </div>
                            <h3 class="cert-title tajawal-bold">منظمة (Great Place to Work)</h3>
                            <p class="cert-desc tajawal-regular">
                                حصلت شركة الجوف للتنمية الزراعية على شهادة
                                ،Great Place to Work – عمل بيئة أفضل
                                Great Place to Work® منظمة من الممنوحة
                                العالمية المتخصصة في ثقافة بيئات العمل،، وبنسبة
                                رضا بلغت 96%
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cert-card">
                            {{-- <div class="trust-badge tajawal-extralight">مستتمر</div> --}}
                            <div class="cert-icon-box">
                                <img src="{{ asset('assets/images/bcs.png') }}" width="90px" height="90px"
                                    alt="">
                                {{-- <i class="bi bi-flower1"></i> --}}
                            </div>
                            <h3 class="cert-title tajawal-bold">شركة (BCS)</h3>
                            <p class="cert-desc tajawal-regular">
                                شهادات عضوية من أكبر الشركات
                                المتخصصة بمجال الزراعة العضوية
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cert-card">
                            {{-- <div class="trust-badge tajawal-extralight">مستتمر</div> --}}
                            <div class="cert-icon-box">
                                <img src="{{ asset('assets/images/bio.png') }}" width="90px" height="90px"
                                    alt="">
                                {{-- <i class="bi bi-flower1"></i> --}}
                            </div>
                            <h3 class="cert-title tajawal-bold">الاتحاد الأوروبي</h3>
                            <p class="cert-desc tajawal-regular">
                                شهادة العضوية من الاتحاد الأوروبي
                                شهادة منتج عضوي باستخدام طرق اإلنتاج
                                المطابقة للشروط داخل المجمع الصناعي لشركة
                                الجوف للتنمية الزراعية
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cert-card">
                            {{-- <div class="trust-badge tajawal-extralight">مستتمر</div> --}}
                            <div class="cert-icon-box">
                                <img src="{{ asset('assets/images/iso_one.png') }}" width="90px" height="90px"
                                    alt="">
                                {{-- <i class="bi bi-flower1"></i> --}}
                            </div>
                            <h3 class="cert-title tajawal-bold">نظام ضمان سلامة الأغذية</h3>
                            <p class="cert-desc tajawal-regular">
                                هو معيار معترف به عالمياً لمراجعة جميع المواد
                                الغذائية ومراقبتها واعتمادها من أجل ضمان
                                سالمة األغذية
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cert-card">
                            {{-- <div class="trust-badge tajawal-extralight">مستتمر</div> --}}
                            <div class="cert-icon-box">
                                <img src="{{ asset('assets/images/iso_second.png') }}" width="90px" height="90px"
                                    alt="">
                                {{-- <i class="bi bi-flower1"></i> --}}
                            </div>
                            <h3 class="cert-title tajawal-bold">نظام إدارة البيئة</h3>
                            <p class="cert-desc tajawal-regular">
                                أحد أنظمة االيزو للجودة ويشمل عدة معايير في مجال
                                البيئة داخل نطاق المجمع الصناعي لشركة الجوف
                                للتنمية الزراعية
                            </p>
                        </div>
                    </div>

                </div>

                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>




    <section class="work-hours-section" dir="rtl" id="work-hours-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="tajawal-bold fs-36 mb-3">أوقات العمل الرسمي</h2>
                <p class="text-muted tajawal-regular">نلتزم في شركة الجوف بساعات عمل منظمة لضمان أعلى مستويات الإنتاجية
                </p>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="schedule-card">
                        <div class="dept-icon">
                            <i class="bi bi-building-gear"></i>
                        </div>
                        <h3 class="tajawal-bold mb-3">الأقسام الإدارية</h3>
                        <div class="work-day tajawal-regular">
                            <i class="bi bi-calendar3 ms-2 "></i> من الأحد إلى الخميس
                        </div>
                        <div class="time-badge tajawal-regular">
                            <i class="bi bi-clock-history ms-2"></i> 7:00 ص — 4:00 م
                        </div>
                        <div class="sub-depts tajawal-regular">
                            تشمل الإدارة العامة، المالية، الموارد البشرية، والخدمات المساندة.
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="schedule-card operational-card">
                        <div class="dept-icon">
                            <i class="bi-building-gear"></i>
                        </div>
                        <h3 class="tajawal-bold mb-3">الأقسام التشغيلية</h3>
                        <div class="work-day tajawal-regular">
                            <i class="bi bi-calendar3 ms-2"></i> من الأحد إلى الجمعة
                        </div>
                        <div class="time-badge tajawal-regular">
                            <i class="bi bi-clock-history ms-2"></i> 6:00 ص — 2:30 م
                        </div>
                        <div class="sub-depts tajawal-regular">
                            <strong>تشمل:</strong> المستودعات، الإنتاج والتشغيل، الصيانة، الجودة.
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <div class="manager-note tajawal-regular">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    توجيهات مدير الإدارة تنطبق على جميع الأقسام والموظفين
                </div>
            </div>
        </div>
    </section>

    <footer class="end">
        <h3 class="tajawal-bold fs-36 text-center text-white mb-5">جاهز لاستقبال زوار جدد ؟</h3>
        <div class="text-center">
            <a href="{{ route('visitor.apply') }}" class="btn btn-primary tajawal-bold fs-18 apply"><i
                    class="bi bi-person-add"></i> قدم
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


    @if ($homeVideo && $homeVideo->video_path)
        <div class="modal fade" id="homeVideoModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body p-0">
                        <video width="100%" controls>
                            <source src="{{ asset('storage/' . $homeVideo->video_path) }}" type="video/mp4">
                            متصفحك لا يدعم تشغيل الفيديو
                        </video>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script>
        const toggleBtn = document.getElementById('menuToggle');
        const closeBtn = document.getElementById('menuClose');
        const menu = document.getElementById('sideMenu');
        const overlay = document.getElementById('menuOverlay');

        toggleBtn.onclick = () => {
            menu.classList.add('active');
            overlay.classList.add('active');
        }

        closeBtn.onclick = () => {
            menu.classList.remove('active');
            overlay.classList.remove('active');
        }

        overlay.onclick = () => {
            menu.classList.remove('active');
            overlay.classList.remove('active');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.querySelectorAll('#sideMenu .menu-links a').forEach(link => {
            link.addEventListener('click', () => {
                menu.classList.remove('active');
                overlay.classList.remove('active');
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".productSwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 4,
                },
            },
        });
    </script>

    <script>
        let mybutton = document.getElementById("btn-back-to-top");

        // Show button when user scrolls down 300px from the top
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                mybutton.style.display = "flex";
            } else {
                mybutton.style.display = "none";
            }
        }

        // Scroll to top smoothly when clicked
        mybutton.addEventListener("click", backToTop);

        function backToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>

    <script>
        var swiper = new Swiper(".certSwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                },
                1200: {
                    slidesPerView: 4,
                },
            },
        });
    </script>
</body>

</html>
