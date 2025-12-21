<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="fonts.googleapis.com" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    {!! ToastMagic::styles() !!}
    <style>
        .notyf-error-ar .notyf__message {
            font-family: "Tajawal", sans-serif;
            font-weight: 500;
            font-style: normal;
            font-size: 15px;
            direction: rtl;
            text-align: right;
        }

        .notyf__icon {
            margin-right: 0px !important;
            margin-left: 13px !important
        }
    </style>

</head>

<body>

    <header class="order__header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between or__cols">
                <div class="d-flex align-items-center text-white">
                    <i class="bi bi-person-add"></i>
                    <div>
                        <h3 class="tajawal-bold fs-20 m-0">طلب تصريح لزائر</h3>
                        <p class="tajawal-regular fs-14">تقديم طلب تصريح جديد</p>
                    </div>
                </div>

                <div>
                    <img src="{{ asset('assets/images/main-logo.png') }}" alt="" width="161px" height="116px">
                </div>

                <div class="d-flex align-items-center">
                    <a href="{{ route('index') }}" class="btn btn-primary tajawal-regular fs-16">
                        <i class="bi bi-arrow-right"></i> العودة
                    </a>
                </div>
            </div>
        </div>
    </header>

    <section class="order__application">
        <div class="container form-container">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="step-indicator mb-5" id="form-progress">
                <div class="step-item" data-step="4">

                    <div class="step-circle"> <i class="bi bi-send"></i></div>
                    <div style="text-align: right;">
                        <span class="tajawal-medium fs-14">الخطوة 4</span> <br>
                        <span class="tajawal-regular fs-16 text-muted small">المراجعة والارسال</span>
                    </div>
                </div>
                <div class="step-item" data-step="3">
                    <div class="step-circle"><i class="bi bi-info-circle"></i></div>
                    <div style="text-align: right;">
                        <span class="tajawal-medium fs-14">الخطوة 3</span> <br>
                        <span class="tajawal-regular fs-16 text-muted small">معلومات إضافية</span>
                    </div>
                </div>
                <div class="step-item" data-step="2">
                    <div class="step-circle"><i class="bi bi-calendar2"></i></div>
                    <div style="text-align: right;">
                        <span class="tajawal-medium fs-14">الخطوة 2</span> <br>
                        <span class="tajawal-regular fs-16 text-muted small">تفاصيل الزيارة</span>
                    </div>
                </div>
                <div class="step-item active" data-step="1">
                    <div class="step-circle"><i class="bi bi-person"></i></div>
                    <div style="text-align: right;">
                        <span class="tajawal-medium fs-14">الخطوة 1</span><br>
                        <span class="tajawal-regular fs-16 text-muted small">البيانات الشخصية</span>
                    </div>
                </div>
            </div>

            <form id="multi-step-form" method="POST" action="{{ route('visitor.order.submit') }}">
                @csrf
                <div class="step-content active" data-step="1">
                    <div class="form-title mb-4">
                        <h2 class="tajawal-bold fs-24">البيانات الشخصية للزائر</h2>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6"><label class="form-label">الاسم الكامل *</label>
                            <input type="text" required name="full_name" class="form-control key__name"
                                placeholder="أدخل الإسم الكامل">
                        </div>
                        <div class="col-md-6"><label class="form-label">رقم الهوية / الإقامة *</label><input required
                                name="identity_number" type="text" class="form-control" placeholder="1234567890">
                        </div>
                        <div class="col-md-6"><label class="form-label">الجنسية</label>
                            <div class="custom-select-wrapper">
                                <select id="purposeSelect" class="form-select" name="nationality">
                                    @foreach ($nationalities as $code => $country)
                                        <option value="{{ $code }}" {{ $code === 'YE' ? 'selected' : '' }}>
                                            {{ $country }}</option>
                                    @endforeach
                                </select>
                                <i class="bi bi-caret-down-fill custom-select-icon"></i>
                            </div>
                        </div>
                        <div class="col-md-6"><label class="form-label">رقم الجوال *</label><input type="tel"
                                name="phone" required class="form-control" placeholder="05xxxxxxxxx"></div>
                        <div class="col-md-6"><label class="form-label">البريد الالكتروني *</label><input
                                type="email" name="email" required class="form-control"
                                placeholder="azaid@aljouf.com.sa"></div>
                        <div class="col-md-6"><label class="form-label">الشركة / المؤسسة</label><input type="text"
                                name="company" class="form-control" placeholder="اسم الشركة"></div>
                        <div class="col-md-12"><label class="form-label">المنصب / الوظيفة</label><input
                                name="job_title" type="text" class="form-control"
                                placeholder="المنصب أو الوظيفة"></div>
                    </div>
                    <hr style="color: #6c757dab; margin: 25px 0px;">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-light prev-btn disable">
                            <i class="bi bi-arrow-right"></i> السابق
                        </button>
                        <button type="button" class="btn btn-success next-btn">
                            التالي <i class="bi bi-arrow-left"></i>
                        </button>
                    </div>
                </div>

                <div class="step-content" data-step="2">
                    <div class="form-title mb-4">
                        <h2 class="tajawal-bold fs-24">تفاصيل الزيارة</h2>
                    </div>


                    <div class="row g-4">
                        <div class="col-md-6"><label class="form-label">الغرض من الزيارة *</label>
                            <div class="custom-select-wrapper">
                                <select id="purposeSelect" class="form-select" name="visit_purpose" required>
                                    <option value="">اختر الغرض</option>
                                    @foreach ($visitPurposes as $purpose)
                                        <option value="{{ $purpose->value }}">
                                            {{ $purpose->value }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="bi bi-caret-down-fill custom-select-icon"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">تاريخ الزيارة *</label>
                            <div class="arabic-date-wrapper">
                                <i class="bi bi-calendar custom-calendar-icon"></i>

                                <input type="text" id="visitDate" class="arabic-date-input" name="visit_date"
                                    placeholder="اختر تاريخ الزيارة" required readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">وقت الزيارة *</label>

                            <div class="arabic-date-wrapper">
                                <i class="bi bi-clock custom-calendar-icon"></i>

                                <input type="text" id="visitTime" class="arabic-date-input" name="visit_time"
                                    placeholder="اختر وقت الزيارة" required readonly>
                            </div>
                        </div>

                        <div class="col-md-6"><label class="form-label">مدة الزيارة المتوقعة</label>
                            <div class="custom-select-wrapper">
                                <select id="purposeSelect" class="form-select" name="visit_duration">
                                    <option value="">اختر المدة </option>
                                    @foreach ($visitDurations as $duration)
                                        <option value="{{ $duration->value }}">
                                            {{ $duration->value }}
                                        </option>
                                    @endforeach 
                                </select>
                                <i class="bi bi-caret-down-fill custom-select-icon"></i>
                            </div>
                        </div>

                        <div class="col-md-6"><label class="form-label">الموظف المضيف *</label><input type="text"
                                class="form-control" placeholder="احمد جمال" name="host_employee" required></div>

                        <div class="col-md-6"><label class="form-label"> القسم</label>
                            <div class="custom-select-wrapper">
                                <select id="purposeSelect" class="form-select" name="department">
                                    <option value="" disabled selected>اختر القسم</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->value }}">
                                            {{ $department->value }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="bi bi-caret-down-fill custom-select-icon"></i>
                            </div>
                        </div>
                    </div>
                    <hr style="color: #6c757dab; margin: 25px 0px;">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-light prev-btn">
                            <i class="bi bi-arrow-right"></i> السابق
                        </button>
                        <button type="button" class="btn btn-success next-btn">
                            التالي <i class="bi bi-arrow-left"></i>
                        </button>
                    </div>
                </div>


                <div class="step-content" data-step="3">
                    <div class="form-title mb-4">
                        <h2 class="tajawal-bold fs-24">معلومات إضافية</h2>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6"><label class="form-label">رقم لوحة السيارة</label><input type="text"
                                name="car_plate" class="form-control" placeholder="أ ب ج 1234"></div>
                        <div class="col-md-6"><label class="form-label">المرافقون</label><input type="text"
                                name="companions" class="form-control" placeholder="أسماء المرافقين (إن وجد)"></div>
                        <div class="col-md-12">
                            <label class="form-label">طلبات خاصة</label>
                            <textarea class="form-control" rows="3" cols="4" style="height: 112px;" name="special_requests"
                                placeholder="أي طلبات خاصة أو ملاحظات إضافية..."></textarea>
                        </div>
                    </div>
                    <hr style="color: #6c757dab; margin: 25px 0px;">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-light prev-btn">
                            <i class="bi bi-arrow-right"></i> السابق
                        </button>
                        <button type="button" class="btn btn-success next-btn">
                            التالي <i class="bi bi-arrow-left"></i>
                        </button>
                    </div>
                </div>

                <div class="step-content" data-step="4">
                    <div class="form-title mb-4">
                        <h2 class="tajawal-bold fs-24">المراجعة والارسال</h2>
                    </div>
                    <div class="row g-4">

                        <div class="review mb-3">
                            <h5 class="tajawal-medium fs-18 mb-5" style="color: #111827;">ملخص الطلب</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <span class="tajawal-regular fs-14 key__name">الاسم</span>
                                    <p class="tajawal-medium fs-16 value__name" data-key="full_name"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <span class="tajawal-regular fs-14 key__name">رقم الهوية</span>
                                    <p class="tajawal-medium fs-16 value__name" data-key="identity_number"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <span class="tajawal-regular fs-14 key__name"> الشركة</span>
                                    <p class="tajawal-medium fs-16 value__name" data-key="company"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <span class="tajawal-regular fs-14 key__name"> الغرض من الزيارة</span>
                                    <p class="tajawal-medium fs-16 value__name" data-key="visit_purpose"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <span class="tajawal-regular fs-14 key__name"> تاريخ الزيارة</span>
                                    <p class="tajawal-medium fs-16 value__name" data-key="visit_date"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <span class="tajawal-regular fs-14 key__name"> وقت الزيارة</span>
                                    <p class="tajawal-medium fs-16 value__name" data-key="visit_time"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <span class="tajawal-regular fs-14 key__name"> الموظف المضيف</span>
                                    <p class="tajawal-medium fs-16 value__name" data-key="host_employee"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <span class="tajawal-regular fs-14 key__name"> القسم</span>
                                    <p class="tajawal-medium fs-16 value__name" data-key="department"></p>
                                </div>
                            </div>
                        </div>
                        <h4 class="tajawal-medium fs-18 mb-2" style="color: #111827;">المستندات المطلوبة</h4>
                        <div class="m-0">
                            <input type="hidden" name="has_valid_id" value="0">
                            <input type="checkbox" class="form-check-input" name="has_valid_id" value="1"
                                checked>
                            <span class="tajawal-regular fs-16" style="color: #374151;">أحمل هوية سارية المفعول
                                (إجباري) *</span>
                        </div>

                        <div class="m-0">
                            <input type="hidden" name="has_company_letter" value="0">
                            <input type="checkbox" class="form-check-input" name="has_company_letter"
                                value="1">
                            <span class="tajawal-regular fs-16" style="color: #374151;">أحمل خطاب من الشركة
                                (اختياري)</span>
                        </div>

                        <div class="conditions">
                            <h6 class="tajawal-medium fs-16" style="color: #1E3A8A;">الشروط والأحكام</h6>
                            <p class="tajawal-regular fs-14">• يجب الحضور في الوقت المحدد</p>
                            <p class="tajawal-regular fs-14">• يجب إحضار الهوية الشخصية</p>
                            <p class="tajawal-regular fs-14">• الالتزام بقوانين وأنظمة الشركة</p>
                            <p class="tajawal-regular fs-14">• عدم التصوير داخل المبنى إلا بإذن</p>
                        </div>
                    </div>
                    <hr style="color: #6c757dab; margin: 25px 0px;">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-light prev-btn">
                            <i class="bi bi-arrow-right"></i> السابق
                        </button>
                        <button type="submit" class="btn btn-success next-btn">
                            <i class="bi bi-send" style="margin-left: 8px;"></i> إرسال الطلب
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </section>

    <footer>
        <img src="{{ asset('assets/images/footer.jpg') }}" width="100%" height="88px" alt="">
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ar.js"></script>
    {!! ToastMagic::scripts() !!}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('multi-step-form');
            const steps = form.querySelectorAll('.step-content');
            const stepItems = document.querySelectorAll('#form-progress .step-item');
            let currentStep = 1;

            const fieldsToSave = [
                'full_name',
                'identity_number',
                'company',
                'visit_purpose',
                'visit_date',
                'visit_time',
                'host_employee',
                'department'
            ];

            // Load saved data on page load
            fieldsToSave.forEach(name => {
                const input = form.querySelector(`[name="${name}"]`);
                if (!input) return;

                const savedValue = localStorage.getItem(name);
                if (savedValue) input.value = savedValue;

                // Save on input / change
                if (input.tagName.toLowerCase() === 'select') {
                    input.addEventListener('change', () => localStorage.setItem(name, input.value));
                } else {
                    input.addEventListener('input', () => localStorage.setItem(name, input.value));
                }
            });

            function populateReview() {
                const reviewElements = form.querySelectorAll('.value__name');
                reviewElements.forEach(el => {
                    const key = el.dataset.key;
                    if (fieldsToSave.includes(key)) {
                        const value = localStorage.getItem(key);
                        el.textContent = value || '';
                    }
                });
            }

            function updateSteps(newStep) {
                steps.forEach(step => {
                    step.classList.toggle('active', parseInt(step.dataset.step) === newStep);
                });

                stepItems.forEach(item => {
                    const stepNum = parseInt(item.dataset.step);
                    item.classList.remove('active', 'done');
                    if (stepNum === newStep) item.classList.add('active');
                    else if (stepNum < newStep) item.classList.add('done');
                });

                currentStep = newStep;

                // إذا وصلنا للخطوة 4، نملأ الملخص
                if (currentStep === 4) {
                    populateReview();
                }
            }

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

            function validateCurrentStep() {
                const currentStepEl = form.querySelector(`.step-content[data-step="${currentStep}"]`);
                const requiredFields = currentStepEl.querySelectorAll('[required]');

                for (let field of requiredFields) {
                    if (!field.value || field.value.trim() === '') {
                        field.focus();

                        notyf.error('الرجاء ملء جميع الحقول الإلزامية قبل المتابعة');
                        return false;
                    }
                }
                return true;
            }

            // Next buttons
            form.querySelectorAll('.next-btn').forEach(button => {
                button.addEventListener('click', function(e) {

                    // If last step submit → allow form submit
                    if (this.type === 'submit') return;

                    if (!validateCurrentStep()) {
                        e.preventDefault();
                        return;
                    }

                    if (currentStep < steps.length) {
                        updateSteps(currentStep + 1);
                    }
                });
            });

            // Previous buttons
            form.querySelectorAll('.prev-btn').forEach(button => {
                button.addEventListener('click', function() {
                    if (currentStep > 1) {
                        updateSteps(currentStep - 1);
                    }
                });
            });

            updateSteps(currentStep);



        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const icon = document.querySelector('.custom-calendar-icon');
            const input = document.querySelector('.arabic-date-input');

            // Check if the input supports the 'showPicker' method (modern browsers)
            if (input.showPicker) {
                icon.addEventListener('click', function() {
                    input.showPicker();
                });
            }
            // Fallback (forces focus which may or may not open the picker)
            else {
                icon.addEventListener('click', function() {
                    input.focus();
                    input.click();
                });
            }
        });
    </script>

    <script>
        flatpickr("#visitTime", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            locale: "ar",
            defaultHour: 9,
            defaultMinute: 0
        });
    </script>
    <script>
        flatpickr("#visitDate", {
            altInput: true,
            altFormat: "l، j F Y", // الثلاثاء، 16 ديسمبر 2025
            dateFormat: "Y-m-d",
            locale: "ar",
            minDate: "today",
            disableMobile: true
        });
    </script>



</body>

</html>
