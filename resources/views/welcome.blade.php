
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
    <div class="home">
        <div class="overieed">
            <header>
                <img src="{{ asset('assets/images/splash_header.png') }}" class="splash__logo" alt="" width="100%">
            </header>
            <div class="container text-center">
                <h1 class="my-5 home__title tajawal-bold text-white">مرحباً بكم في <br> <span>شركة الجوف للتنمية
                        الزراعية</span>
                </h1>
                <p class="mb-5 tajawal-regular home__desc text-white">منصة شاملة ومتطورة لإدارة المنظمين حديثا للشركة
                    والزوار مع
                    أحدث
                    تقنيات الأمان والمراقبة</p>
                <div class="mb-5">
                    <div class="row first__r">
                        <div class="col-sm-6 col-xs-12 d-flex justify-content-end">
                            <div class="card p-4 align-items-center" style="width: 25rem;">
                                <i class="bi bi-person-fill-check mb-4"></i>
                                <div class="card-body p-0">
                                    <h5 class="card-title mb-4 tajawal-bold fs-30 text-white">البرنامج الترحيبي</h5>
                                    <p class="card-text mb-4 tajawal-regular fs-18 text-white">نظام متكامل لإدارة
                                        الموظفين والتدريب
                                        والتأهيل مع متابعة شاملة للأداء
                                    </p>
                                    <a href="{{ route('welcome.program') }}" class="btn btn-primary w-100 f-btn tajawal-bold fs-18">
                                       <i class="bi bi-arrow-right-circle"></i>
                                        <span>دخول البرنامج الترحيبي</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12 d-flex justify-content-start">
                            <div class="card p-4 align-items-center" style="width: 25rem;">
                                <i class="bi bi-ticket mb-4"></i>
                                <div class="card-body p-0">
                                    <h5 class="card-title mb-4 tajawal-bold fs-30 text-white">برنامج إصدار التصاريح</h5>
                                    <p class="card-text mb-4 tajawal-regular fs-18 text-white">نظام ذكي لإدارة الزوار
                                        وإصدار تصاريح
                                        الدخول مع تتبع آمن ومتطور</p>
                                    </p>
                                    <a href="{{ route('permit.program') }}" class="btn btn-primary w-100 s-btn tajawal-bold fs-18 text-main">
                                        <i class="bi bi-ticket-detailed"></i>
                                        <span>دخول برنامج التصاريح</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="features row ">
                    <div class="col-md-4 col-xs-12 mb-5">
                        <div class="box">
                            <i class="bi bi-shield-check text-white"></i>
                            <h5 class="text-white tajawal-bold mb-2 mt-4">أمان متطور</h5>
                            <p class="text-white tajawal-regular">نظام أمني شامل مع تقنيات حديثة</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 mb-5">
                        <div class="box">
                            <i class="bi bi-clock text-white"></i>
                            <h5 class="text-white tajawal-bold mb-2 mt-4">سرعة في الخدمة</h5>
                            <p class="text-white tajawal-regular">معالجة فورية للطلبات والتصاريح</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 mb-5">
                        <div class="box">
                            <i class="bi bi-headset text-white"></i>
                            <h5 class="text-white tajawal-bold mb-2 mt-4">دعم متواصل</h5>
                            <p class="text-white tajawal-regular">فريق دعم متاح على مدار الساعة</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
