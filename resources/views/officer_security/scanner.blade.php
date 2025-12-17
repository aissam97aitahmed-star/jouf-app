@extends('officer_security.layout')

@section('content')

    <section class="scanner__security">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="scanner">
                        <h3 class="tajawal-bold fs-24 mb-3" style="color: #111827;">ماسح رمز QR</h3>
                        <div class="start__scan mb-4">
                            <i class="bi bi-qr-code"></i>
                            <p class="tajawal-regular fs-16" style="color: #6B7280;">اضغط لبدء المسح</p>
                        </div>
                        <a href="" class="btn btn-primary tajawal-medium fs-18 w-100 scan__link mb-4">بدء مسح رمز QR</a>
                        <div class="previous__scan w-100 text-center">
                            <p class="tajawal-regular fs-14" style="color: #166534;">آخر رمز تم مسحه:</p>
                            <strong class="tajawal-bold fs-18" style="color: #14532D;">QR001238</strong>
                        </div>
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
                                    <p class="tajawal-medium fs-18" style="color: #111827; margin-bottom: 8px;">اضغط على زر "بدء مسح رمز QR"</p>
                                    <p class="tajawal-regular fs-16" style="color: #4B5563;">سيبدأ النظام في البحث عن رمز QR تلقائياً</p>
                                </div>
                            </li>
                            <li class="d-flex mb-3">
                                <strong style="background: linear-gradient(90deg, #A855F7 0%, #DB2777 100%);">3</strong>
                                <div>
                                    <p class="tajawal-medium fs-18" style="color: #111827; margin-bottom: 8px;">تأكد من صحة البيانات</p>
                                    <p class="tajawal-regular fs-16" style="color: #4B5563;">راجع بيانات الزائر والموظف المستضيف قبل الموافقة</p>
                                </div>
                            </li>
                            <li class="d-flex mb-3">
                                <strong style="background: linear-gradient(90deg, #F97316 0%, #DC2626 100%);">2</strong>
                                <div>
                                    <p class="tajawal-medium fs-18" style="color: #111827; margin-bottom: 8px;">سجل الدخول أو الخروج</p>
                                    <p class="tajawal-regular fs-16" style="color: #4B5563;">اختر الإجراء المناسب وأضف أي ملاحظات أمنية إذا لزم الأمر</p>
                                </div>
                            </li>
                        </ul>
                        <div class="notes__requirement">
                            <h5 class="tajawal-medium fs-14" style="color: #854D0E;"> <i class="bi bi-info-circle"></i> ملاحظة مهمة</h5>
                            <p class="tajawal-regular fs-14" style="color: #A16207;">في حالة عدم وجود رمز QR صالح، يرجى التواصل مع الموظف المستضيف للتأكد من صحة الزيارة</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
