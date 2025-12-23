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
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {!! ToastMagic::styles() !!}

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
    </style>
</head>

<body>
    <header class="overveiw text-white">
        <div class="all__cols d-flex justify-content-between p-0 w-100 m-auto align-items-center">
            <div class="cl__1">
                <div class="d-flex align-items-center">
                    <div class="circle__bg z-1"></div>
                    <strong class="key tajawal-bold z-2">ع ز</strong>
                    <div class="z-2">
                        <h6 class="empname fs-18 tajawal-bold m-0 ">مرحباً، {{ Auth::user()->name ?? '****' }} 106000
                        </h6>
                        <p class="emptype fs-14 tajawal-regular ">موظف جديد</p>
                    </div>
                </div>
            </div>
            <div class="cl__2">
                <div class="circle__bg z-1"></div>

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


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

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
</body>

</html>
