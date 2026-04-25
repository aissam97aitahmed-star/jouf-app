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
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/add.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {!! ToastMagic::styles() !!}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    @stack('css')
    <style>
        #bot-form .sent.active {
            opacity: 1;
            /* يصبح واضح عند وجود نص */
        }

        .main__chat {
            height: 90vh;
            overflow: auto;
        }

        .notyf__message {
            font-family: "Tajawal", sans-serif !important;
            font-weight: 500 !important;
            font-style: normal !important;
            font-size: 15px !important;
            direction: rtl !important;
            text-align: right !important;
        }

        .notyf__icon {
            margin-right: 0px !important;
            margin-left: 13px !important
        }
    </style>
</head>
@php
    use App\Models\Notification;
    use Carbon\Carbon;
    $notificationCount = Notification::where([
        'role' => 'employee',
        'is_read' => false,
    ])->count();
    $user = Auth::user();
    $trialDays = 60;
    $createdAt = Carbon::parse($user->created_at);
    $today = Carbon::today();
    // حساب الفرق بالأيام كعدد صحيح
    $daysPassed = (int) $createdAt->diffInDays($today);
    $daysRemaining = max($trialDays - $daysPassed, 0); // لا يقل عن صفر
@endphp

<body>
    <header class="overveiw text-white">
        <div class="all__cols d-flex justify-content-between p-0 w-100 m-auto align-items-center">
            <div class="cl__1">
                <div class="d-flex align-items-center">
                    <strong class="key tajawal-bold z-2">ع ز</strong>
                    <div class="z-2">
                        <h6 class="empname fs-18 tajawal-bold m-0 ">مرحباً، {{ Auth::user()->name ?? '****' }}
                        </h6>
                        <p class="emptype fs-14 tajawal-regular ">موظف جديد</p>
                    </div>
                </div>
            </div>
            <div class="cl__2">

                <div class="text-center z-2 p-sticky">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="" width="161px" height="116px">
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
                        <strong class="experience__time fs-30">{{ $daysRemaining }}</strong>
                        <span class="tajawal-regular fs-12">يوم متبقي</span>
                    </div>
                </div>
                <div class="experience__icons z-2 d-flex">
                    <a href="{{ route('employee.notification') }}" class="d-inline text-white"
                        style="position: relative;">
                        <span class="notification-badge" id="notificationCount">{{ $notificationCount ?? 0 }}</span>
                        <i class="bi bi-bell notification-icon"></i>
                    </a>
                    {{-- <i class="bi bi-gear"></i> --}}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <a href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-left"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <nav class="main__nav">
        <ul class="d-flex justify-content-between align-items-center">
            <li class="tajawal-medium fs-18 {{ request()->routeIs('employee.dashboard') ? 'active' : '' }}"><a
                    href="{{ route('employee.dashboard') }}"><i class="bi bi-columns-gap"></i>
                    نظرة عامة</a></li>
            <li class="tajawal-medium fs-18 {{ request()->routeIs('employee.map') ? 'active' : '' }}"><a
                    href="{{ route('employee.map') }}"><i class="bi bi-map"></i>
                    الخريطة التفاعلية</a></li>
            <li class="tajawal-medium fs-18 {{ request()->routeIs('employee.videos') ? 'active' : '' }}"><a
                    href="{{ route('employee.videos') }}"><i class="bi bi-play-circle"></i>
                    الفيديوهات التعليمية</a></li>
            <li class="tajawal-medium fs-18 {{ request()->routeIs('employee.employeeslist') ? 'active' : '' }}"><a
                    href="{{ route('employee.employeeslist') }}"><i class="bi bi-person-lines-fill"></i> قائمة
                    الموظفين</a></li>
            <li class="tajawal-medium fs-18 {{ request()->routeIs('employee.privacy') ? 'active' : '' }}"><a
                    href="{{ route('employee.privacy') }}"><i class="bi bi-shield-lock"></i>
                    السياسات و الارشادات</a></li>
            <li class="tajawal-medium fs-18 {{ request()->routeIs('employee.bot') ? 'active' : '' }}"><a
                    href="{{ route('employee.bot') }}"><i class="bi bi-robot"></i> البوت
                    التفاعلي</a></li>
        </ul>
    </nav>

    @yield('content')

    <footer>
        <img src="{{ asset('assets/images/quickly_bg.jpg') }}" alt="" width="100%">
    </footer>

    <div class="to__top" id="toTop">
        <img src="{{ asset('assets/images/to__top.png') }}" width="35px" height="35px" alt="">
    </div>


    @if (!Auth::user()->terms_accepted_at)
        <div class="modal fade" id="termsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
                    <div class="modal-header bg-light border-0 pt-4 px-4" style="color: #00471f">
                        <i class="bi bi-shield-lock-fill fs-4 ms-3"></i>
                        <h5 class="modal-title tajawal-bold ">إشعار سرية المعلومات والبيانات</h5>
                    </div>
                    <div class="modal-body p-4">
                        <div class="alert alert-warning border-0 tajawal-regular mb-4"
                            style="background-color: #fff8e6; color: #856404;">
                            عزيزي الموظف، مرحباً بك في النظام الترحيبي لشركة الجوف.
                        </div>

                        <div class="content-scroll pe-2"
                            style="max-height: 300px; overflow-y: auto; text-align: justify;">
                            <p class="tajawal-regular fs-14">نود تنبيهك إلى أن جميع المعلومات والبيانات المتاحة عبر هذا
                                البرنامج – بما في ذلك سياسات الشركة، بيانات الموظفين، أرقام التواصل، المواقع، الأنظمة
                                التشغيلية، وأي محتوى إداري أو تقني – تُعد معلومات داخلية سرية ومملوكة للشركة.</p>

                            <strong class="tajawal-bold d-block mb-2">يُمنع منعاً باتاً:</strong>
                            <ul class="tajawal-regular fs-14 text-danger">
                                <li>نسخ أو تصوير أو مشاركة أي جزء من هذه البيانات خارج نطاق العمل.</li>
                                <li>إرسال المعلومات عبر وسائل شخصية أو غير معتمدة.</li>
                                <li>استخدامها لأغراض غير متعلقة بمهامك الوظيفية.</li>
                            </ul>

                            <p class="tajawal-regular fs-14 border-top pt-3">إن أي إفشاء أو إساءة استخدام لهذه
                                المعلومات قد يعرّض صاحبه للمساءلة النظامية وفقاً لنظام حماية البيانات الشخصية في المملكة
                                العربية السعودية، ونظام مكافحة الجرائم المعلوماتية.</p>
                        </div>

                        <div class="mt-4 p-3 bg-light rounded-3 border">
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input ms-3" type="checkbox" id="acceptCheck"
                                    style="width: 25px; height: 25px; cursor: pointer;">
                                <label class="form-check-label tajawal-bold fs-14 ms-2" for="acceptCheck"
                                    style="cursor: pointer;">
                                    أقرّ باطلاعي على هذا الإشعار والتزامي الكامل بسياسة سرية المعلومات.
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pb-4 px-4">
                        <button type="button" id="btnAccept"
                            class="btn btn-primary w-100 py-2 tajawal-bold disabled" onclick="submitAcceptance()">
                            موافق واستمرار
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Auto show modal on load
            document.addEventListener('DOMContentLoaded', function() {
                var myModal = new bootstrap.Modal(document.getElementById('termsModal'));
                myModal.show();

                // Enable button only if checkbox is checked
                const checkbox = document.getElementById('acceptCheck');
                const btn = document.getElementById('btnAccept');

                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        btn.classList.remove('disabled');
                    } else {
                        btn.classList.add('disabled');
                    }
                });
            });

            function submitAcceptance() {
                fetch("{{ route('employee.accept-terms') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    }
                }).then(response => {
                    if (response.ok) {
                        bootstrap.Modal.getInstance(document.getElementById('termsModal')).hide();
                    }
                });
            }
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <script>
        const toTop = document.getElementById("toTop");

        window.addEventListener("scroll", () => {

            if (window.scrollY > 300) {
                toTop.classList.add("show");
            } else {
                toTop.classList.remove("show");
            }
        });

        toTop.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>
    {!! ToastMagic::scripts() !!}

    @stack('js')



    <script>
        const notyf = new Notyf({
            duration: 100000,
            position: {
                x: 'left',
                y: 'top'
            },
            types: [{
                type: 'error',
                className: 'notyf-error-ar'
            }]
        });

        window.addEventListener('DOMContentLoaded', function() {

            let notificationCount = "{{ $notificationCount ?? 0 }}";
            window.Echo.channel('employee-notifications').listen('.new-notification', (e) => {
                notificationCount++;
                document.getElementById('notificationCount').innerText = notificationCount;
                notyf.success(e.message);
                // alert('test');



            });
        })
    </script>

</body>

</html>
