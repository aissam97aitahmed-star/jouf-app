<!DOCTYPE html>
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
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        header.security .actions a i {
            vertical-align: -webkit-baseline-middle;
            font-size: 20px;
            margin-left: 0 !important;
            color: white;
        }
    </style>

</head>

<body>

    <header class="order__header security">
        <div class="container-fluid">
            <div class="d-flex justify-content-between resp__head">
                <div class="d-flex align-items-center text-white">
                    <i class="bi bi-shield-check"></i>
                    <div>
                        <h3 class="tajawal-bold fs-20 m-0">لوحة تحكم الأمن</h3>
                        <p class="tajawal-regular fs-14">إدارة الزوار والتصاريح الأمنية</p>
                    </div>
                </div>

                <div>
                    <img src="{{ asset('assets/images/main-logo.png') }}" alt="" width="161px" height="116px">
                </div>

                <div class="d-flex align-items-center actions">
                    <a href="" class="btn btn-primary position-relative">
                        <i class="bi bi-bell"></i>
                        <span class="notification-badge">5</span>
                    </a>
                    <a href="" class="btn btn-primary"><i class="bi bi-gear"></i></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="javascript:void(0)" class="btn btn-primary"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="bi bi-box-arrow-left"></i></a>
                </div>
            </div>
        </div>
    </header>

    <section class="statistic__security">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-6 col-md-2">
                    <div class="item">
                        <i class="bi bi-people"></i>
                        <strong style="color: #111827;" class="tajawal-bold fs-24">5</strong>
                        <p class="tajawal-regular fs-12" style="color: #4B5563;">إجمالي اليوم</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-2">
                    <div class="item">
                        <i class="bi bi-clock"
                            style="background: linear-gradient(90deg, #EAB308 0%, #F97316 100%);"></i>
                        <strong style="color: #111827;" class="tajawal-bold fs-24">5</strong>
                        <p class="tajawal-regular fs-12" style="color: #4B5563;">في الانتظار</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-2">
                    <div class="item">
                        <i class="bi bi-check-circle"
                            style="background: linear-gradient(90deg, #22C55E 0%, #059669 100%);"></i>
                        <strong style="color: #111827;" class="tajawal-bold fs-24">5</strong>
                        <p class="tajawal-regular fs-12" style="color: #4B5563;">مُوافق عليه</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-2">
                    <div class="item">
                        <i class="bi bi-play-circle"
                            style="background: linear-gradient(90deg, #A855F7 0%, #DB2777 100%);"></i>
                        <strong style="color: #111827;" class="tajawal-bold fs-24">5</strong>
                        <p class="tajawal-regular fs-12" style="color: #4B5563;"> جاري</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-2">
                    <div class="item">
                        <i class="bi bi-check2-all"
                            style="background: linear-gradient(90deg, #3B82F6 0%, #0891B2 100%);"></i>
                        <strong style="color: #111827;" class="tajawal-bold fs-24">5</strong>
                        <p class="tajawal-regular fs-12" style="color: #4B5563;"> مكتمل</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-2">
                    <div class="item">
                        <i class="bi bi-exclamation-triangle"
                            style="background: linear-gradient(90deg, #EF4444 0%, #E11D48 100%);"></i>
                        <strong style="color: #111827;" class="tajawal-bold fs-24">5</strong>
                        <p class="tajawal-regular fs-12" style="color: #4B5563;"> تنبيهات</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <nav class="navbar__security">
        <div class="container">
            <div class="navbar">
                <ul>
                    <li><a href="{{ route('officer_security.dashboard') }}"
                            class="tajawal-medium fs-16 link {{ request()->routeIs('officer_security.dashboard') ? 'active' : '' }}"><i
                                class="bi bi-diagram-2"></i>نظرة
                            عامة</a>
                    </li>
                    <li><a href="{{ route('officer_security.scanner') }}"
                            class="tajawal-medium fs-16 link {{ request()->routeIs('officer_security.scanner') ? 'active' : '' }}"><i
                                class="bi bi-upc-scan"></i> ماسح
                            QR</a></li>
                    <li><a href="{{ route('officer_security.visitors') }}"
                            class="tajawal-medium fs-16 link {{ request()->routeIs('officer_security.visitors') ? 'active' : '' }}"><i
                                class="bi bi-people"></i> قائمة
                            الزوار</a></li>
                    <li><a href="{{ route('officer_security.notification') }}"
                            class="tajawal-medium fs-16 link {{ request()->routeIs('officer_security.notification') ? 'active' : '' }}"><i
                                class="bi bi-exclamation-diamond"></i>
                            التنبيهات</a></li>
                    <li><a href="{{ route('officer_security.reports') }}"
                            class="tajawal-medium fs-16 link {{ request()->routeIs('officer_security.reports') ? 'active' : '' }}"><i
                                class="bi bi-clipboard-data"></i>
                            التقارير</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')


    <footer>
        <img src="{{ asset('assets/images/footer.jpg') }}" width="100%" height="88px" alt="">
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
