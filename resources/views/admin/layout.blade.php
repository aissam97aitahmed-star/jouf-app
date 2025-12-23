<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>Controle Panel</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords"
        content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">

    <!-- [Favicon] icon -->
    <link rel="icon" href=" {{ asset('admin/assets/images/favicon.svg') }}" type="image/x-icon">
    <!-- [Google Font] Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href=" {{ asset('admin/assets/fonts/tabler-icons.min.css') }}">
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href=" {{ asset('admin/assets/fonts/feather.css') }}">
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href=" {{ asset('admin/assets/fonts/fontawesome.css') }}">
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href=" {{ asset('admin/assets/fonts/material.css') }}">
    <!-- [Template CSS Files] -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href=" {{ asset('admin/assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href=" {{ asset('admin/assets/css/style-preset.css') }}">
    @stack('css')

    <style>
        * {
            font-family: "Tajawal", sans-serif !important;
            font-style: normal !important
        }

        .icon_mr {
            margin: 0px 10px
        }
        .dz-message {
            display: none
        }
        .text-right {
            text-align: right
        }
        .mrl {
            margin-left: 10px;
        }

        /* كامل شريط التمرير */
        ::-webkit-scrollbar {
            width: 12px;
            /* عرض الشريط العمودي */
            height: 12px;
            /* ارتفاع الشريط الأفقي */
        }

        /* خلفية المسار */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            /* لون المسار */
            border-radius: 6px;
        }

        /* الشريط القابل للسحب */
        ::-webkit-scrollbar-thumb {
            background-color: #00471f;
            /* لون الشريط الرئيسي */
            border-radius: 6px;
            border: 3px solid #f1f1f1;
            /* مسافة حول الشريط */
        }

        /* عند المرور بالفأرة */
        ::-webkit-scrollbar-thumb:hover {
            background-color: #00642c;
            /* لون أغمق عند hover */
        }

        * {
            scrollbar-width: thin;
            scrollbar-color: #00471f #f1f1f1;
            /* لون الشريط ولون المسار */
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .br-6 {
            border-radius: 6px;
        }

        #simpletable_wrapper {
            direction: rtl;
        }

        #simpletable_filter label {
            width: 100%;
        }

        #simpletable_wrapper .row {
            padding-bottom: 20px;
        }

        .head__link {
            background: #014820;
            padding: 10px !important;
            color: white !important;
            margin-right: 10px !important;
            border-radius: 8px;
        }

        .head__link i {
            vertical-align: sub;
            font-size: 17px;
        }

        .head__link i {
            color: white !important
        }
    </style>
    {!! ToastMagic::styles() !!}

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light" style="    direction: rtl;">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->
    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header justify-content-center">
                <a href="{{ route('admin.dashboard') }}" class="b-brand text-primary">
                    <!-- ========   Change your logo from here   ============ -->
                    <img src="{{ asset('assets/images/main-logo.png') }}" class="img-fluid logo-lg" alt="logo"
                        style="height: 116px !important">
                </a>
            </div>
            <div class="navbar-content">
                <ul class="pc-navbar" style="padding: 0">
                    <li class="pc-item">
                        <a href="{{ route('admin.dashboard') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                            <span class="pc-mtext">لوحة الإدارة</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('admin.map.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-map"></i></span>
                            <span class="pc-mtext"> مواقع الخريطة التفاعلية</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('admin.videos.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-video"></i></span>
                            <span class="pc-mtext"> الفيديوهات التعليمية</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('admin.policies.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-shield-check"></i></span>
                            <span class="pc-mtext"> السياسات و الارشادات</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('admin.bot.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-brand-hipchat"></i></span>
                            <span class="pc-mtext"> إعدادات البوت التفاعلي</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('admin.home-video.edit') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-settings"></i></span>
                            <span class="pc-mtext"> إدارة الفيديو التوضيحي</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('admin.employees.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-users"></i></span>
                            <span class="pc-mtext"> إدارة الموظفين المرشيدين</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('admin.users.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-user-check"></i></span>
                            <span class="pc-mtext"> إدارة مستخدي المنصة</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('admin.templates.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-files"></i></span>
                            <span class="pc-mtext">إدارة القوالب سريعة</span>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
    <!-- [ Sidebar Menu ] end --> <!-- [ Header Topbar ] start -->
    <header class="pc-header">
        <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
            <div class="pc-mob-drp">
                <ul class="list-unstyled">
                    <!-- ======= Menu collapse Icon ===== -->
                    <li class="pc-h-item pc-sidebar-collapse">
                        <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- [Mobile Media Block end] -->
            <div class="">
                <ul class="list-unstyled">

                    <li class="pc-h-item">
                        <a class="arrow-none me-0 w-100 head__link" href="{{ route('permit.program') }}"
                            target="_blank">
                            <i class="ti ti-ticket icon_mr"></i>
                            دخول برنامج التصاريح
                        </a>
                    </li>
                    <li class="pc-h-item">
                        <a class="arrow-none me-0 w-100 head__link" href="{{ route('welcome.program') }}"
                            target="_blank">
                            <i class="ti ti-arrow-up-right-circle icon_mr"></i>
                            دخول البرنامج الترحيبي
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <li class="pc-h-item">
                        <a class="arrow-none me-0 w-100 head__link" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ti ti-logout icon_mr"></i>
                            تسجيل الخروج
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- [ Header ] end -->

    @yield('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('admin/assets/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
    <!-- [Page Specific JS] start -->
    <script src="{{ asset('admin/assets/js/pages/dashboard-default.js') }}"></script>
    <!-- [Page Specific JS] end -->
    <!-- Required Js -->
    <script src="{{ asset('admin/assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/feather.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('js')
    {!! ToastMagic::scripts() !!}


</body>
<!-- [Body] end -->

</html>
