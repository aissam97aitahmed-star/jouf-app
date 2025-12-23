@extends('employees.layout')

@section('content')
    <section class="employees__list">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-5">
                <h4 class="tajawal-bold">قائمة الموظفين المرشدين</h4>
                <span class="badge rounded-pill text-bg-success tajawal-medium fs-14">
                    {{ $employees->count() }} مرشد متاح
                </span>
            </div>

            <div class="row pb-5">
                @foreach ($employees as $employee)
                    <div class="col-md-4 mb-4">
                        <div class="box">
                            <div class="d-flex align-items-center mb-3">
                                <span class="key tajawal-bold fs-18">
                                    {{ mb_substr($employee->name, 0, 1) }}
                                </span>
                                <div>
                                    <h5 class="tajawal-bold fs-18 m-0">{{ $employee->name }}</h5>
                                    <p class="tajawal-regular fs-14" style="color:#4B5563;">
                                        {{ $employee->position }}
                                    </p>
                                </div>
                            </div>

                            <div>
                                <ul class="info">
                                    <li class="tajawal-regular fs-14 mb-2">
                                        <i class="bi bi-bookmark-check"></i>&nbsp;&nbsp;
                                        {{ $employee->department }}
                                    </li>
                                    <li class="tajawal-regular fs-14 mb-2">
                                        <i class="bi bi-envelope-at"></i>&nbsp;&nbsp;
                                        {{ $employee->email }}
                                    </li>
                                    <li class="tajawal-regular fs-14 mb-2">
                                        <i class="bi bi-telephone"></i>&nbsp;&nbsp;
                                        {{ $employee->phone }}
                                    </li>
                                    <li class="tajawal-regular fs-14 mb-2">
                                        <i class="bi bi-geo-alt"></i>&nbsp;&nbsp;
                                        {{ $employee->office_location }}
                                    </li>
                                </ul>
                            </div>

                            <div class="d-flex gap-2 actions">
                                <a class="btn btn-primary flex-fill tajawal-regular fs-14 open-employee-modal"
                                    href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#AppelModal"
                                    data-name="{{ $employee->name }}" data-position="{{ $employee->position }}"
                                    data-email="{{ $employee->email }}" data-phone="{{ $employee->phone }}"
                                    data-office_location="{{ $employee->office_location }}">
                                    <i class="bi bi-telephone"></i>&nbsp; اتصال
                                </a>

                                <a class="btn btn-primary flex-fill tajawal-regular fs-14 open-employee-modal"
                                    href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#MessageModal"
                                    data-id="{{ $employee->id }}" data-name="{{ $employee->name }}"
                                    data-office_location="{{ $employee->office_location }}"
                                    data-email="{{ $employee->email }}" data-phone="{{ $employee->phone }}"
                                    data-department="{{ $employee->department }}">
                                    <i class="bi bi-chat"></i>&nbsp; رسالة
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= Call Modal (نفسه) ================= --}}
    <div class="modal fade employees__call" id="AppelModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex flex-column justify-content-center align-items-center w-100">
                        <span class="tajawal-bold fs-30 mb-3 modal-key">—</span>
                        <h5 class="tajawal-bold fs-24 modal-name" style="color:#FFFFFF;">—</h5>
                        <p class="tajawal-regular fs-16 modal-position" style="color:#E0E7FF;">—</p>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="d-flex item">
                        <i class="fa fa-phone"></i>
                        <div class="d-flex flex-column">
                            <strong class="tajawal-bold fs-14">رقم الهاتف</strong>
                            <strong class="tajawal-medium fs-16 modal-phone"></strong>
                        </div>
                    </div>

                    <div class="d-flex item">
                        <i class="fa fa-envelope mail"></i>
                        <div class="d-flex flex-column">
                            <strong class="tajawal-bold fs-14">البريد الإلكتروني</strong>
                            <strong class="tajawal-medium fs-16 modal-email"></strong>
                        </div>
                    </div>

                    <div class="d-flex item">
                        <i class="fa fa-map-marker map"></i>
                        <div class="d-flex flex-column">
                            <strong class="tajawal-bold fs-14">المكتب</strong>
                            <strong class="tajawal-medium fs-16 modal-office_location"></strong>
                        </div>
                    </div>

                    <a id="callBtn" href="#" class="btn btn-primary w-100 action tajawal-bold fs-16"> <i
                            class="bi bi-telephone-fill"></i> مكالمة
                        صوتية</a>
                    <a class="btn btn-primary w-100 action tajawal-bold fs-16"> <i class="bi bi-camera-video-fill"></i>
                        مكالمة فيديو</a>
                    <a class="btn btn-primary w-100 action tajawal-bold fs-16" data-bs-dismiss="modal"> <i
                            class="bi bi-x"></i> إغلاق</a>
                </div>
            </div>
        </div>
    </div>

    {{-- ================= Message Modal (كامل بدون حذف) ================= --}}
    <div class="modal fade employees__message" id="MessageModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex flex-column justify-content-center align-items-center w-100">
                        <span class="tajawal-bold fs-30 mb-3 modal-key">—</span>
                        <h5 class="tajawal-bold fs-24 modal-name" style="color:#FFFFFF;">—</h5>
                        <p class="tajawal-regular fs-16 modal-position" style="color:#E0E7FF;">—</p>
                    </div>
                </div>

                {{-- كل محتوى الفورم بقي كما هو --}}
                <div class="modal-body">
                    <form method="POST" action="{{ route('employee.send.message') }}">
                        @csrf
                        <input type="hidden" name="employee_id" id="employee_id">
                        <input type="hidden" name="employee_email" id="employee_email">
                        <input type="hidden" name="priority" id="priority" value="medium">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label tajawal-bold fs-14"
                                style="color: #111827;">موضوع الرسالة</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="subject"
                                placeholder="اكتب موضوع الرسالة...">
                        </div>
                        <div class="">
                            <label for="exampleFormControlTextarea1" class="form-label tajawal-bold fs-14"
                                style="color: #111827;"><i class="bi bi-chat-dots"></i> <span>محتوى الرسالة</span>
                            </label>
                            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" placeholder="اكتب رسالتك هنا..."
                                rows="3"></textarea>
                        </div>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="tajawal-regular fs-12" style="color: #6B7280;">الحد الأقصى 500 حرف</span>
                            <span class="tajawal-regular fs-12" style="color: #6B7280;" id="charCount">0/500</span>
                        </div>
                        <div>
                            <label class="form-label tajawal-bold fs-14" style="color: #111827;"> <span>قوالب
                                    سريعة</span>
                            </label>
                            <div class="templates mb-3">
                                @foreach ($templates as $template)
                                    <div class="item template-item" data-content="{{ $template->content }}"
                                        data-title="{{ $template->title }}">
                                        <h6 class="tajawal-medium fs-14" style="color: #00471F;">{{ $template->title }}
                                        </h6>
                                        <p class="tajawal-regular fs-12" style="color: #166534;">{{ $template->content }}
                                        </p>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                        <div class="priority mb-4">
                            <label for="exampleFormControlTextarea1" class="form-label tajawal-bold fs-14 m-0"
                                style="color: #111827; "><i class="bi bi-flag"></i> <span>مستوى الأولوية</span>
                            </label>
                            <div>
                                <span class="tajawal-medium fs-14 priority-item" data-value="low"><i
                                        class="bi bi-flag"></i>
                                    <strong>منخفضة</strong></span>
                                <span class="tajawal-medium fs-14 priority-item" data-value="medium"><i
                                        class="bi bi-flag-fill"></i>
                                    <strong>متوسطة</strong></span>
                                <span class="tajawal-medium fs-14 priority-item" data-value="high"><i
                                        class="bi bi-info-circle-fill"></i>
                                    <strong>عالية</strong></span>
                            </div>
                        </div>
                        <div class="row action g-2 mb-4">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary w-100 tajawal-bold fs-16 first-btn"><span><i
                                            class="bi bi-send-fill"></i></span>إرسال الرسالة</button>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-primary w-100 tajawal-bold fs-16 reset-btn"><i
                                        class="bi bi-arrow-clockwise"></i>مسح</button>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-primary w-100 tajawal-bold fs-16"
                                    data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i>إغلاق</button>
                            </div>
                        </div>

                        <div class="end mb-4">
                            <h6 class="tajawal-bold fs-14"><i class="bi bi-info-circle"></i><span>معلومات
                                    إضافية</span></h6>
                            <ul>
                                <li class="tajawal-regular fs-14"><i class="bi bi-envelope"></i><span
                                        class="modal-email">_</span></li>
                                <li class="tajawal-regular fs-14"><i class="bi bi-telephone"></i><span
                                        class="modal-phone">_</span></li>
                                <li class="tajawal-regular fs-14"><i class="bi bi-buildings"></i><span
                                        class="modal-department">_</span></li>
                                <li class="tajawal-regular fs-14"><i class="bi bi-geo-alt"></i><span
                                        class="modal-office_location">_</span></li>
                            </ul>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        document.querySelectorAll('.open-employee-modal').forEach(btn => {
            btn.addEventListener('click', function() {
                const callBtn = document.getElementById('callBtn');
                const phone = this.dataset.phone;
                // 🔥 ربط زر الاتصال برقم الهاتف
                callBtn.href = `tel:${phone}`;

                document.querySelectorAll('.modal-name').forEach(e => e.textContent = this.dataset.name);
                document.querySelectorAll('.modal-position').forEach(e => e.textContent = this.dataset
                    .position);
                document.querySelectorAll('.modal-email').forEach(e => e.textContent = this.dataset.email);
                document.querySelectorAll('.modal-phone').forEach(e => e.textContent = this.dataset.phone);
                document.querySelectorAll('.modal-department').forEach(e => e.textContent = this.dataset
                    .department);
                document.querySelectorAll('.modal-office_location').forEach(e => e.textContent = this
                    .dataset.office_location);
                document.querySelectorAll('.modal-key').forEach(e => e.textContent = this.dataset.name
                    .charAt(0));
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('MessageModal');

            modal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;

                const employeeId = button.getAttribute('data-id');
                const employeeEmail = button.getAttribute('data-email');
                const employeeName = button.getAttribute('data-name');
                const employeeJob = button.getAttribute('data-job');

                // hidden inputs
                document.getElementById('employee_id').value = employeeId;
                document.getElementById('employee_email').value = employeeEmail;

                // تحديث بيانات العرض في الـ modal
                modal.querySelector('h5').innerText = employeeName;
                modal.querySelector('p').innerText = employeeJob;
            });
        });
    </script>

    <script>
        document.querySelectorAll('.template-item').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelector('input[name="subject"]').value =
                    this.dataset.title;
                document.querySelector('textarea[name="message"]').value =
                    this.dataset.content;
            });
        });
    </script>


    <script>
        document.querySelectorAll('.template-item').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelector('input[name="subject"]').value = this.dataset.title;
                document.querySelector('textarea[name="message"]').value = this.dataset.content;

                // 👈 مهم جدًا
                toggleSendButton();
            });
        });
    </script>


    <script>
        function toggleSendButton() {
            const subjectInput = document.querySelector('input[name="subject"]');
            const messageTextarea = document.querySelector('textarea[name="message"]');
            const sendButton = document.querySelector('.first-btn');

            const subjectFilled = subjectInput.value.trim().length > 0;
            const messageFilled = messageTextarea.value.trim().length > 0;

            if (subjectFilled && messageFilled) {
                sendButton.style.opacity = '1';
                sendButton.style.pointerEvents = 'auto';
            } else {
                sendButton.style.opacity = '0.5';
                sendButton.style.pointerEvents = 'none';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const subjectInput = document.querySelector('input[name="subject"]');
            const messageTextarea = document.querySelector('textarea[name="message"]');

            toggleSendButton();

            subjectInput.addEventListener('input', toggleSendButton);
            messageTextarea.addEventListener('input', toggleSendButton);
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const resetBtn = document.querySelector('.reset-btn');
            const subjectInput = document.querySelector('input[name="subject"]');
            const messageTextarea = document.querySelector('textarea[name="message"]');
            const priorityInput = document.getElementById('priority');

            resetBtn.addEventListener('click', function() {

                // مسح المحتوى
                subjectInput.value = '';
                messageTextarea.value = '';

                // إعادة الأولوية إلى medium
                priorityInput.value = 'medium';

                document.querySelectorAll('.priority-item')
                    .forEach(el => el.classList.remove('text-success'));

                document.querySelector('.priority-item[data-value="medium"]')
                    ?.classList.add('text-success');

                // تحديث حالة زر الإرسال
                toggleSendButton();
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const textarea = document.querySelector('textarea[name="message"]');
            const counter = document.getElementById('charCount');
            const maxLength = 500;

            function updateCounter() {
                let length = textarea.value.length;

                if (length > maxLength) {
                    textarea.value = textarea.value.substring(0, maxLength);
                    length = maxLength;
                }

                counter.textContent = length;
            }

            // الحالة الافتراضية
            updateCounter();

            // عند الكتابة
            textarea.addEventListener('input', updateCounter);

            // دعم زر المسح
            document.querySelector('.reset-btn')?.addEventListener('click', function() {
                counter.textContent = '0';
            });
        });
    </script>
@endpush
