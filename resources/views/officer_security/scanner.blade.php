@extends('officer_security.layout')

@section('content')
    <section class="scanner__security">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="scanner">
                        <h3 class="tajawal-bold fs-24 mb-3" style="color: #111827;">ماسح رمز QR</h3>
                        <div class="start__scan mb-4" id="startScanDiv">
                            <i class="bi bi-qr-code"></i>
                            <p class="tajawal-regular fs-16" style="color: #6B7280;">اضغط لبدء المسح</p>
                        </div>
                        <div id="reader" style="width:100%; display:none;"></div>
                        <p id="qr-loading-text" class="tajawal-regular fs-16" style="color: #6B7280; display:none;">جاري
                            المسح...</p>


                        <button class="btn btn-primary tajawal-medium fs-18 w-100 scan__link mb-4" id="startScanBtn">بدء مسح
                            رمز
                            QR</button>
                        <div class="previous__scan w-100 text-center">
                            <p class="tajawal-regular fs-14" style="color: #166534;">آخر رمز تم مسحه:</p>
                            <strong class="tajawal-bold fs-18" style="color: #14532D;" id="lastScannedQr">_</strong>
                        </div>


                        {{-- إضافة زر رفع صورة QR (Blade) --}}
                        <div class="mb-3">
                            <label class="btn btn-outline-secondary w-100">
                                <i class="bi bi-image"></i> اختبار عبر رفع صورة QR
                                <input type="file" id="qrImageInput" accept="image/*" hidden>
                            </label>
                        </div>
                        {{-- إضافة زر رفع صورة QR (Blade) --}}


                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="scanner align-items-start">
                        <h3 class="tajawal-bold fs-24 mb-4" style="color: #111827;">تعليمات الاستخدام</h3>
                        <ul class="Instructions__use p-0">
                            <li class="d-flex mb-3">
                                <strong>1</strong>
                                <div>
                                    <p class="tajawal-medium fs-18" style="color: #111827; margin-bottom: 8px;">اطلب من
                                        الزائر إظهار رمز QR</p>
                                    <p class="tajawal-regular fs-16" style="color: #4B5563;">يجب أن يكون الرمز واضحاً
                                        ومقروءاً على شاشة الهاتف أو مطبوعاً</p>
                                </div>
                            </li>
                            <li class="d-flex mb-3">
                                <strong style="background: linear-gradient(90deg, #22C55E 0%, #059669 100%);">2</strong>
                                <div>
                                    <p class="tajawal-medium fs-18" style="color: #111827; margin-bottom: 8px;">اضغط على زر
                                        "بدء مسح رمز QR"</p>
                                    <p class="tajawal-regular fs-16" style="color: #4B5563;">سيبدأ النظام في البحث عن رمز QR
                                        تلقائياً</p>
                                </div>
                            </li>
                            <li class="d-flex mb-3">
                                <strong style="background: linear-gradient(90deg, #A855F7 0%, #DB2777 100%);">3</strong>
                                <div>
                                    <p class="tajawal-medium fs-18" style="color: #111827; margin-bottom: 8px;">تأكد من صحة
                                        البيانات</p>
                                    <p class="tajawal-regular fs-16" style="color: #4B5563;">راجع بيانات الزائر والموظف
                                        المستضيف قبل الموافقة</p>
                                </div>
                            </li>
                            <li class="d-flex mb-3">
                                <strong style="background: linear-gradient(90deg, #F97316 0%, #DC2626 100%);">2</strong>
                                <div>
                                    <p class="tajawal-medium fs-18" style="color: #111827; margin-bottom: 8px;">سجل الدخول
                                        أو الخروج</p>
                                    <p class="tajawal-regular fs-16" style="color: #4B5563;">اختر الإجراء المناسب وأضف أي
                                        ملاحظات أمنية إذا لزم الأمر</p>
                                </div>
                            </li>
                        </ul>
                        <div class="notes__requirement">
                            <h5 class="tajawal-medium fs-14" style="color: #854D0E;"> <i class="bi bi-info-circle"></i>
                                ملاحظة مهمة</h5>
                            <p class="tajawal-regular fs-14" style="color: #A16207;">في حالة عدم وجود رمز QR صالح، يرجى
                                التواصل مع الموظف المستضيف للتأكد من صحة الزيارة</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade employees__call modal__security" id="oderDetailsModal" tabindex="-1"
        aria-labelledby="oderDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex flex-column justify-content-center align-items-center w-100">
                        <span class="tajawal-bold fs-30 mb-3"> <i class="bi bi-briefcase d-flex"></i></span>
                        <h5 class="tajawal-bold fs-24" style="color: #FFFFFF;">تأكيد بيانات الزائر</h5>
                        <p class="tajawal-regular fs-16" style="color: #E0E7FF;" id="modalFullName">_</p>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row global__info mb-4">
                        <div class="col visit__data" style="margin-left: 10px;">
                            <h5 class="tajawal-bold fs-18" style="color: #111827;">بيانات الزائر</h5>
                            <ul class="p-0">
                                <li><span class="tajawal-regular fs-16" style="color: #4B5563;">الاسم:</span><strong
                                        class="tajawal-medium fs-16" id="modalName">_</strong></li>
                                <li><span class="tajawal-regular fs-16" style="color: #4B5563;">الهاتف:</span><strong
                                        class="tajawal-medium fs-16" id="modalPhone">_</strong></li>
                                <li><span class="tajawal-regular fs-16" style="color: #4B5563;">الهوية:</span><strong
                                        class="tajawal-medium fs-16" id="modalIdentity">_</strong></li>
                                <li><span class="tajawal-regular fs-16" style="color: #4B5563;">الشركة:</span><strong
                                        class="tajawal-medium fs-16" id="modalCompany">_</strong></li>
                            </ul>
                        </div>
                        <div class="col visit__data">
                            <h5 class="tajawal-bold fs-18" style="color: #111827;">بيانات الزيارة</h5>
                            <ul class="p-0">
                                <li><span class="tajawal-regular fs-16" style="color: #4B5563;">نوع
                                        الزيارة:</span><strong class="tajawal-medium fs-16"
                                        id="modalVisitPurpose">_</strong></li>
                                <li><span class="tajawal-regular fs-16" style="color: #4B5563;">الموظف
                                        المستضيف:</span><strong class="tajawal-medium fs-16" id="modalHost">_</strong>
                                </li>
                                <li><span class="tajawal-regular fs-16" style="color: #4B5563;">القسم:</span><strong
                                        class="tajawal-medium fs-16" id="modalDepartment">_</strong></li>
                                <li><span class="tajawal-regular fs-16" style="color: #4B5563;">المدة
                                        المتوقعة:</span><strong class="tajawal-medium fs-16" id="modalDuration">_</strong>
                                </li>

                            </ul>
                        </div>
                    </div>




                    <div class="add mb-4" style="background: #EFF6FF;">
                        <h6 class="tajawal-bold fs-14" style="color: #111827;"> <span>الغرض من الزيارة</span></h6>
                        <p class="tajawal-regular fs-14" style="color: #374151;" id="modalSpecialRequests">_</p>
                    </div>



                    <div class="add mb-4" style="background: #F9FAFB;">
                        <h6 class="tajawal-bold fs-14 d-flex justify-content-between m-0" style="color: #111827;"> <span>
                                الحالة الحالية: </span> <span class="visit___status tajawal-medium fs-14">جاري</span> </h6>
                        <p class="tajawal-regular fs-14" style="color: #4B5563;">وقت الدخول: <span
                                id="modalEntryTime"></span></p>
                    </div>


                    <div class="mb-4">
                        <label for="" class="tajawal-medium fs-16 d-block" style="color: #374151;">ملاحظات أمنية
                            (اختيارية)</label>
                        <textarea class="w-100" name="" id="" placeholder="ملاحظات أمنية " rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <a class="btn btn-primary w-100 action" id="exitBtn"
                                style="background: linear-gradient(90deg, #DC2626 0%, #E11D48 100%);" type="submit"> <i
                                    class="bi bi-box-arrow-left"></i><span class="tajawal-bold fs-16">تسجيل
                                    الخروج</span></a>
                        </div>
                        <div class="col-md-4">
                            <a class="btn btn-primary w-100 action" data-bs-dismiss="modal" aria-label="Close"
                                style="background: #F3F4F6; color: #374151;" type="submit"><i class="bi bi-x"></i><span
                                    class="tajawal-bold fs-16">إغلاق
                                </span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const lastQr = localStorage.getItem('last_scanned_qr');
            if (lastQr) {
                document.getElementById('lastScannedQr').textContent = lastQr;
            }
        });
    </script>

    <script>
        const notyf = new Notyf({
            duration: 6000,
            position: {
                x: 'left',
                y: 'top'
            },
            types: [{
                type: 'error',
                className: 'notyf-error-ar'
            }]
        });

        let html5QrcodeScanner = null;

        function onScanSuccess(decodedText, decodedResult) {
            console.log("Scan result:", decodedText, decodedResult);

            // عرض النتيجة على الصفحة
            document.getElementById('qr-loading-text').textContent = "تم المسح: " + decodedText;

            // إرسال البيانات للـ Controller
            fetch("{{ route('officer_security.qr.scan') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        qr_code: decodedText
                    })
                })
                .then(response => response.json())
                .then(data => {

                    if (!data.success) {
                        notyf.error(data.message);
                        // alert(data.message);
                        return;
                    }

                    const order = data.order;

                    currentOrderNumber = order.order_number; // ⭐ مهم
                    // تحديث آخر QR
                    document.querySelector('.previous__scan strong').textContent = order.order_number;

                    // تعبئة المودال
                    document.getElementById('modalFullName').textContent = order.full_name;

                    document.getElementById('modalName').textContent = order.full_name;
                    document.getElementById('modalPhone').textContent = order.phone;
                    document.getElementById('modalIdentity').textContent = order.identity_number;
                    document.getElementById('modalCompany').textContent = order.company ?? '—';

                    document.getElementById('modalVisitPurpose').textContent = order.visit_purpose;
                    document.getElementById('modalHost').textContent = order.host_employee;
                    document.getElementById('modalDepartment').textContent = order.department ?? '—';
                    document.getElementById('modalDuration').textContent = order.visit_duration ?? '—';

                    document.getElementById('modalSpecialRequests').textContent =
                        order.special_requests ?? 'لا توجد ملاحظات';

                    document.getElementById('modalEntryTime').textContent = order.entry_time ?? '—';
                    // فتح المودال

                    localStorage.setItem('last_scanned_qr', order.order_number);

                    const modal = new bootstrap.Modal(document.getElementById('oderDetailsModal'));
                    modal.show();

                    // alert('تمت عملية المسح بنجاح: ' + data.code);
                    // document.querySelector('.previous__scan strong').textContent = decodedText;
                })
                .catch(err => console.error(err));

            // إيقاف المسح بعد القراءة
            if (html5QrcodeScanner) {
                html5QrcodeScanner.stop().then(() => {
                    console.log("QR Code scanning stopped.");
                }).catch(err => console.error(err));
            }
        }

        document.getElementById('startScanBtn').addEventListener('click', function() {
            // إخفاء القسم الأول
            document.getElementById('startScanDiv').style.display = 'none';

            // إظهار منطقة المسح والنص
            document.getElementById('reader').style.display = 'block';
            document.getElementById('qr-loading-text').style.display = 'block';

            const qrCodeRegionId = "reader";

            html5QrcodeScanner = new Html5Qrcode(qrCodeRegionId);

            const config = {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                },
                aspectRatio: 1.0,
                supportedScanFormats: [Html5QrcodeSupportedFormats.QR_CODE, Html5QrcodeSupportedFormats.AZTEC],
                videoConstraints: {
                    facingMode: "environment"
                }
            };

            html5QrcodeScanner.start({
                    facingMode: "environment"
                },
                config,
                onScanSuccess,
                (errorMessage) => {
                    console.log("Scanning...", errorMessage);
                }
            ).then(() => {
                console.log("Scanner started successfully.");
            }).catch((err) => {
                console.error("Error starting QR scanner:", err);
                document.getElementById('qr-loading-text').textContent = "خطأ في تشغيل الكاميرا.";
            });
        });
    </script>


    {{-- 2️⃣ كود JavaScript للمسح من صورة --}}
    <script>
        const fileInput = document.getElementById('qrImageInput');

        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;

            // إنشاء Scanner بدون كاميرا
            const imageScanner = new Html5Qrcode("reader");

            // إظهار منطقة المعاينة
            document.getElementById('startScanDiv').style.display = 'none';
            document.getElementById('reader').style.display = 'block';
            document.getElementById('qr-loading-text').style.display = 'block';
            document.getElementById('qr-loading-text').textContent = 'جاري قراءة الصورة...';

            imageScanner.scanFile(file, true)
                .then(decodedText => {
                    // نفس دالة النجاح الخاصة بالكاميرا
                    onScanSuccess(decodedText, {});
                })
                .catch(err => {
                    console.error(err);
                    alert('لم يتم العثور على رمز QR في الصورة');
                });
        });
    </script>

    {{-- 2️⃣ كود JavaScript للمسح من صورة --}}


    <script>
        let currentOrderNumber = null;
        // زر تسجيل الخروج
        document.getElementById('exitBtn').addEventListener('click', function() {

            if (!currentOrderNumber) {
                Swal.fire({
                    icon: 'warning',
                    title: 'تنبيه',
                    text: 'لا يوجد طلب نشط حالياً',
                    confirmButtonText: 'حسناً',
                    confirmButtonColor: '#166534'
                });
                return;
            }


            Swal.fire({
                title: 'تأكيد تسجيل الخروج',
                text: 'هل أنت متأكد من تسجيل خروج الزائر؟',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'نعم، تسجيل الخروج',
                cancelButtonText: 'إلغاء',
                confirmButtonColor: '#DC2626',
                cancelButtonColor: '#6B7280'
            }).then((result) => {
                if (!result.isConfirmed) return;

                fetch("{{ route('officer_security.qr.exit') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            order_number: currentOrderNumber
                        })
                    })
                    .then(res => res.json())
                    .then(data => {

                        if (!data.success) {
                            notyf.error(data.message);

                            // alert(data.message);
                            return;
                        }
                        notyf.success('تم تسجيل الخروج بنجاح ⏱️');


                        // إغلاق المودال
                        const modal = bootstrap.Modal.getInstance(
                            document.getElementById('oderDetailsModal')
                        );
                        modal.hide();

                        // تعطيل الزر بعد الخروج
                        document.getElementById('exitBtn').classList.add('disabled');
                    })
                    .catch(err => {
                        console.error(err);
                        alert('حدث خطأ أثناء تسجيل الخروج');
                    });
            });

            // if (!confirm('هل أنت متأكد من تسجيل الخروج؟')) {
            //     return;
            // }


        });
    </script>
@endpush
