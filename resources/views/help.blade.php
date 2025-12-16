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


    <!-- زر اختياري لفتح المودال -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        فتح المودال يدوياً
    </button>

    <!-- المودال -->
    <div class="modal fade bot__modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl bot__modal__settings" style="    width: 896px;">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex justify-content-between w-100 align-items-center">
                        <i class="bi bi-gear"></i>
                        <div style="flex: 1;">
                            <h3 class="tajawal-bold fs-30 text-white m-0">إعدادات البوت التفاعلي</h3>
                            <p class="tajawal-regular fs-16" style="color: #DBEAFE;">تخصيص وإدارة المساعد الذكي للشركة
                            </p>
                        </div>
                        <i class="bi bi-x" data-bs-dismiss="modal" aria-label="Close"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <h4 class="tajawal-bold fs-20"><i class="bi bi-info-square"
                                        style="color: #2563EB;"></i>الإعدادات العامة</h4>
                                <div class="content">
                                    <div class="mb-2">
                                        <label for="" class="tajawal-bold fs-14" style="color: #374151;">اسم
                                            البوت</label><br>
                                        <input class="tajawal-regular fs-14 w-100" type="text" name=""
                                            id="" value="المساعد الذكي">
                                    </div>
                                    <div class="mb-2">
                                        <label for="" class="tajawal-bold fs-14" style="color: #374151;">رسالة
                                            الترحيب
                                        </label><br>
                                        <textarea class="tajawal-regular fs-16 w-100" name="" rows="3" id="">مرحباً! أنا هنا لمساعدتك في أي استفسارات حول الشركة أو إجراءات العمل. كيف يمكنني مساعدتك؟</textarea>

                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="tajawal-bold fs-14" style="color: #374151;">اللغة
                                            الافتراضية
                                        </label><br>
                                        <select class="form-select" aria-label="Default select example">
                                            <option value="arabic">العربية</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <div class="status d-flex justify-content-between align-items-center">
                                            <div>
                                                <h5 class="tajawal-bold fs-16" style="color: #111827;">تفعيل البوت</h5>
                                                <p class="tajawal-regular fs-14" style="color: #6B7280;">السماح للموظفين
                                                    بالتفاعل مع البوت</p>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkNativeSwitch" switch checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <h4 class="tajawal-bold fs-20"><i class="bi bi-info-square"
                                        style="color: #16A34A;"></i>إعدادات الردود</h4>
                                <div class="content">
                                    <div class="mb-4">
                                        <label for="" class="tajawal-bold fs-14" style="color: #374151;">زمن
                                            الرد
                                            (بالثواني)</label><br>
                                        <input type="range" class="form-range" min="0" max="5"
                                            step="0.5" id="slider">

                                        <div class="d-flex justify-content-between">
                                            <span class="tajawal-bold fs-12" style="color: #6B7280;">فوري</span>
                                            <span class="tajawal-bold fs-12" style="color: #6B7280;">10 ثواني</span>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="status d-flex justify-content-between align-items-center">
                                            <div>
                                                <h5 class="tajawal-bold fs-16" style="color: #111827;">الردود الذكية
                                                </h5>
                                                <p class="tajawal-regular fs-14" style="color: #6B7280;">اقتراح ردود
                                                    تلقائية بناءً على السؤال</p>
                                            </div>
                                            <div class="form-check form-switch reponse">
                                                <input class="form-check-input " type="checkbox" value=""
                                                    id="checkNativeSwitch" switch checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="status d-flex justify-content-between align-items-center">
                                            <div>
                                                <h5 class="tajawal-bold fs-16" style="color: #111827;"> حفظ المحادثات
                                                </h5>
                                                <p class="tajawal-regular fs-14" style="color: #6B7280;">تخزين
                                                    المحادثات
                                                    لتحسين الخدمة</p>
                                            </div>
                                            <div class="form-check form-switch reponse">
                                                <input class="form-check-input " type="checkbox" value=""
                                                    id="checkNativeSwitch" switch checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box base">
                                <h4 class="tajawal-bold fs-20 mb-4"><i class="bi bi-info-square"
                                        style="color: #9333EA;"></i> قاعدة المعرفة</h4>
                                <div class="content">
                                    <div class="mb-3">
                                        <div class="status ">
                                            <div class="d-flex justify-content-between mb-3">
                                                <div>
                                                    <h5 class="tajawal-bold fs-16" style="color: #111827;">الأسئلة
                                                        المتكررة
                                                    </h5>
                                                    <p class="tajawal-regular fs-14" style="color: #6B7280;">مجموعة من
                                                        الأسئلة والأجوبة الشائعة </p>
                                                </div>
                                                <div class="count">
                                                    <span class="tajawal-regular fs-14">127 سؤال</span>
                                                </div>

                                            </div>
                                            <a href=""
                                                class="btn btn-primary tajawal-regular fs-14 w-100 action action__edit"><i
                                                    class=" bi
                                                bi-pencil-square"></i>تحرير
                                                الأسئلة</a>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="status ">
                                            <div class="d-flex justify-content-between mb-3">
                                                <div>
                                                    <h5 class="tajawal-bold fs-16" style="color: #111827;">سياسات
                                                        الشركة

                                                    </h5>
                                                    <p class="tajawal-regular fs-14" style="color: #6B7280;">ربط البوت
                                                        بسياسات وإجراءات الشركة</p>
                                                </div>
                                                <div class="count">
                                                    <span class="tajawal-regular fs-14"
                                                        style="background: #DBEAFE; color: #1E40AF">محدثة </span>
                                                </div>

                                            </div>
                                            <a href=""
                                                class="btn btn-primary tajawal-regular fs-14 w-100 action action__manage"><i
                                                    class="bi bi-link-45deg"></i> إدارة الربط</a>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="status ">
                                            <div class="d-flex justify-content-between mb-3">
                                                <div>
                                                    <h5 class="tajawal-bold fs-16" style="color: #111827;"> معلومات
                                                        الاتصال

                                                    </h5>
                                                    <p class="tajawal-regular fs-14" style="color: #6B7280;">أرقام
                                                        الهواتف وعناوين البريد الإلكتروني</p>
                                                </div>
                                                <div class="count">
                                                    <span class="tajawal-regular fs-14"
                                                        style="background: #DCFCE7; color: #166534">متصل </span>
                                                </div>

                                            </div>
                                            <a href=""
                                                class="btn btn-primary tajawal-regular fs-14 w-100 action action__info"><i
                                                    class="bi bi-telephone"></i> تحديث المعلومات</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="box stat">
                                <h4 class="tajawal-bold fs-20 mb-4"><i class="bi bi-info-square"
                                        style="color: #EA580C;"></i> التحليلات والتقارير</h4>
                                <div class="content">
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="item">
                                                    <strong class="tajawal-bold fs-24"
                                                        style="color: #EA580C;">127</strong>
                                                    <p class="tajawal-regular fs-14" style="color: #4B5563;">محادثة
                                                        اليوم</p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="item">
                                                    <strong class="tajawal-bold fs-24" style="color: #16A34A;">95
                                                        %</strong>
                                                    <p class="tajawal-regular fs-14" style="color: #4B5563;">نسبة
                                                        الحلول
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="status mb-3">
                                            <div class="d-flex justify-content-between mb-3">
                                                <div>
                                                    <h5 class="tajawal-bold fs-16" style="color: #111827;">التقارير
                                                        التلقائية
                                                    </h5>
                                                    <p class="tajawal-regular fs-14" style="color: #6B7280;">إرسال
                                                        تقارير أسبوعية عن أداء البوت</p>
                                                </div>
                                                <div class="form-check form-switch act">
                                                    <input class="form-check-input " type="checkbox" value=""
                                                        id="checkNativeSwitch" switch checked>
                                                </div>

                                            </div>
                                        </div>
                                        <a href=""
                                            class="btn btn-primary tajawal-regular fs-16 w-100 action action__download"><i
                                                class="bi bi-cloud-arrow-down"></i>تنزيل تقرير مفصل</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr class="mb-4" style="color: #80808066;">
                    <div class="row options mb-4">
                        <div class="col-md-6 d-flex gap-2 hb__acts">
                            <a href="javascript:void(0)" data-bs-dismiss="modal" aria-label="Close"
                                class="btn btn-primary tajawal-bold fs-16 flex-fill mb-2" style="color: #374151;"><i
                                    class="bi bi-x"></i> إغلاق</a>
                            <a href="" class="btn btn-primary tajawal-bold fs-16 flex-fill mb-2 return"><i
                                    class="bi bi-arrow-clockwise"></i>إعادة تعيين</a>
                        </div>
                        <div class="col-md-6 d-flex gap-2 hb__acts">
                            <a href="" class="btn btn-primary tajawal-bold fs-16 flex-fill mb-2 save"><i
                                    class="bi bi-play-fill"></i> حفظ التغييرات</a>
                            <a href="" class="btn btn-primary tajawal-bold fs-16 flex-fill mb-2 test"><i
                                    class="bi bi-arrow-clockwise"></i>اختبار البوت</a>
                        </div>
                    </div>
                    <div class="footer">
                        <h6 class="tajawal-bold fs-14" style="color: #3730A3;"> <i class="bi bi-lightbulb"></i> نصائح
                            سريعة</h6>
                        <ul class="m-0 p-0">
                            <li class="tajawal-regular fs-14" style="color: #4338CA;">• استخدم رسالة ترحيب واضحة
                                ومفيدة
                                للموظفين الجدد</li>
                            <li class="tajawal-regular fs-14" style="color: #4338CA;">• حدث قاعدة المعرفة بانتظام
                                لتحسين
                                دقة الإجابات</li>
                            <li class="tajawal-regular fs-14" style="color: #4338CA;">• راجع التقارير الأسبوعية لتحديد
                                نقاط التحسين</li>
                            <li class="tajawal-regular fs-14" style="color: #4338CA;">• اختبر البوت بعد كل تحديث
                                للتأكد
                                من جودة الأداء</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // فتح المودال تلقائياً عند تحميل الصفحة
        window.addEventListener('load', function() {
            var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
            myModal.show();
        });

        const slider = document.getElementById("slider");

        function updateSlider() {
            const percent = (slider.value - slider.min) / (slider.max - slider.min) * 100;
            slider.style.setProperty("--value", percent + "%");
        }

        slider.addEventListener("input", updateSlider);

        // تشغيل أول مرة
        updateSlider();
    </script>



</body>

</html>
