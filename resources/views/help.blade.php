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
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>


    <header class="overveiw text-white">
        <div class="all__cols d-flex justify-content-between p-0 w-100 m-auto align-items-center">
            <div class="cl__1">
                <div class="d-flex align-items-center">
                    <div class="circle__bg z-1"></div>
                    <strong class="key tajawal-bold z-2">ع ز</strong>
                    <div class="z-2">
                        <h6 class="empname fs-18 tajawal-bold m-0 ">مرحباً، ​عمرو زيد 106000</h6>
                        <p class="emptype fs-14 tajawal-regular ">موظف جديد</p>
                    </div>
                </div>
            </div>
            <div class="cl__2">
                <div class="circle__bg z-1"></div>

                <div class="text-center z-2 p-sticky">
                    <img src="assets/images/logo.png" alt="" width="161px" height="116px">
                    <p class="fs-20  tajawal-bold"> المنصة الترحيبية للموظفين الجداد</p>
                </div>
            </div>
            <div class="cl__3 d-flex justify-content-end align-items-center">
                <!-- <div class="circle__bg z-1"></div> -->

                <div class="z-2">
                    <div class="experience d-flex align-items-center">
                        <div class="">
                            <span class="fs-12 tajawal-bold"> <i class="bi bi-clock"></i> فترة التجربة </span>
                        </div>
                        <strong class="experience__time fs-30">60</strong>
                        <span class="tajawal-regular fs-12">يوم متبقي</span>
                    </div>
                </div>
                <div class="experience__icons z-2 d-flex">
                    <div class="d-inline" style="position: relative;">
                        <span class="notification-badge">5</span>
                        <i class="bi bi-bell notification-icon"></i>
                    </div>
                    <i class="bi bi-gear"></i>
                    <i class="bi bi-box-arrow-left"></i>
                </div>
            </div>
        </div>
    </header>

    <nav class="main__nav">
        <ul class="d-flex justify-content-between align-items-center">
            <li class="active tajawal-medium fs-18 active"><a href="overview.html"><i class="bi bi-columns-gap"></i>
                    نظرة عامة</a></li>
            <li class="tajawal-medium fs-18"><a href="overview.html"><i class="bi bi-map"></i>
                    الخريطة التفاعلية</a></li>
            <li class="tajawal-medium fs-18"><a href="overview.html"><i class="bi bi-play-circle"></i>
                    الفيديوهات التعليمية</a></li>
            <li class="tajawal-medium fs-18"><a href="overview.html"><i class="bi bi-person-lines-fill"></i> قائمة
                    الموظفين</a></li>
            <li class="tajawal-medium fs-18"><a href="overview.html"><i class="bi bi-shield-lock"></i>
                    السياسات و الارشادات</a></li>
            <li class="tajawal-medium fs-18"><a href="overview.html"><i class="bi bi-robot"></i> البوت
                    التفاعلي</a></li>
        </ul>
    </nav>

    <section class="bot chat">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-5">
                <h4 class="tajawal-bold">البوت التفاعلي</h4>
                <span class="badge rounded-pill text-bg-success tajawal-bold fs-14 disp">مساعد ذكي متاح 24/7</span>
            </div>

            <div class="row pb-5">
                <div class="col-md-8 mb-5">
                    <div class="chat mb-4">
                        <header class="d-flex align-items-center">
                            <i class="bi bi-chat-heart-fill chat_icon"></i>
                            <div style="flex: 1;">
                                <h5 class="tajawal-bold fs-18 m-0">المساعد الذكي</h5>
                                <p class="tajawal-regular fs-14">جاهز للإجابة على استفساراتك</p>
                            </div>
                            <p> <i class="fa fa-circle" aria-hidden="true"></i>&nbsp; <span
                                    class="tajawal-regular fs-14 ">متصل</span> </p>
                        </header>

                    </div>
                    <form action="">
                        
                        <div>
                            <div class="chat_body mb-4 bot__message">
                                <div class="bot__msg__content">
                                    <h6><i class="fa fa-info" aria-hidden="true"></i> <span
                                            class="tajawal-medium fs-12">المساعد
                                            الذكي</span></h6>
                                    <p class="tajawal-regular fs-14">مرحباً! أنا هنا لمساعدتك في أي استفسارات حول الشركة
                                        أو إجراءات
                                        العمل. كيف يمكنني مساعدتك؟</p>
                                    <span class="tajawal-regular fs-12" style="color: #6B7280;">١١:٠٦:٠٥ ص</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <div class="chat_body mb-4 user__message">
                                <div class="bot__msg__content">
                                    <p class="tajawal-regular fs-14 text-white">ما هي ساعات العمل الرسمية؟</p>
                                    <span class="tajawal-regular fs-12 text-white" style="color: #6B7280;">١١:٠٦:٠٥
                                        ص</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex">
                            <input type="text" class="tajawal-medium fs-14"
                                placeholder="اكتب سؤالك أو استفسارك هنا...">
                            <button class="sent" type="submit"><i class="fa fa-paper-plane"
                                    aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="stat mb-5">
                        <h4 class="tajawal-bold fs-18 mb-3">إحصائيات البوت</h4>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa fa-commenting" aria-hidden="true"></i>
                            <div>
                                <p style="color: #4B5563;" class="tajawal-regular fs-14">المحادثات اليوم</p>
                                <strong style="color: #111827;">127</strong>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa fa-check quest" aria-hidden="true"></i>
                            <div>
                                <p style="color: #4B5563;" class="tajawal-regular fs-14 ">الأسئلة المحلولة</p>
                                <strong style="color: #111827;">95%</strong>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa fa-clock resp" aria-hidden="true"></i>
                            <div>
                                <p style="color: #4B5563;" class="tajawal-regular fs-14 ">متوسط الرد</p>
                                <strong style="color: #111827;">2.3 ثانية</strong>
                            </div>
                        </div>
                    </div>

                    <div class="repeat mb-5">
                        <h4 class="tajawal-bold fs-18 mb-3">الأسئلة الأكثر تكراراً</h4>
                        <ul>
                            <li class="tajawal-medium fs-14"><span>ما هي ساعات العمل؟</span> <strong
                                    class="tajawal-regular fs-12 ">43</strong></li>
                            <li class="tajawal-medium fs-14"><span> كيف أغير كلمة المرور؟</span> <strong
                                    class="tajawal-regular fs-12 ">43</strong></li>
                            <li class="tajawal-medium fs-14"><span> أين موقف السيارات؟</span> <strong
                                    class="tajawal-regular fs-12 ">43</strong></li>
                            <li class="tajawal-medium fs-14"><span> كيف أطلب إجازة؟</span> <strong
                                    class="tajawal-regular fs-12 ">43</strong></li>
                            <li class="tajawal-medium fs-14"><span> معلومات الراتب</span> <strong
                                    class="tajawal-regular fs-12 ">43</strong></li>
                        </ul>
                    </div>
                    <div class="settings">
                        <h4 class="tajawal-bold fs-18 mb-3">أدوات البوت</h4>
                        <div>
                            <button class="btn btn-primary w-100 tajawal-regular fs-16" type="submit"><i
                                    class="fa fa-cog" aria-hidden="true"></i> &nbsp; <span>إعدادات
                                    البوت</span></button>
                            <button class="btn btn-primary w-100 tajawal-regular fs-16" type="submit"><i
                                    class="fa fa-download" aria-hidden="true"></i> &nbsp; <span>تصدير
                                    المحادثات</span></button>
                            <button class="btn btn-primary w-100 tajawal-regular fs-16" type="submit"><i
                                    class="fa fa-bar-chart" aria-hidden="true"></i> &nbsp; <span>إحصائيات مفصلة
                                </span></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <footer>
        <img src="assets/images/quickly_bg.jpg" alt="" width="100%">
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
