<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>Aljouf Portal</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="لوحة تحكم إدارية حديثة لبوابة الجوف">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('admin/assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/fonts/material.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style-preset.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('css')

    <style>
        :root {
            --admin-bg: #f4f7f2;
            --admin-surface: rgba(255, 255, 255, 0.88);
            --admin-surface-strong: #ffffff;
            --admin-stroke: rgba(13, 68, 40, 0.1);
            --admin-stroke-strong: rgba(13, 68, 40, 0.18);
            --admin-text: #123524;
            --admin-text-soft: #5f7468;
            --admin-primary: #0b6b3a;
            --admin-primary-deep: #084d2a;
            --admin-primary-soft: #dff5e6;
            --admin-accent: #c7a74b;
            --admin-shadow: 0 24px 60px rgba(12, 54, 33, 0.12);
            --admin-radius-xl: 28px;
            --admin-radius-lg: 22px;
            --admin-radius-md: 16px;
            --admin-radius-sm: 12px;
        }

        * {
            font-family: "Tajawal", sans-serif !important;
            font-style: normal !important;
            scrollbar-width: thin;
            scrollbar-color: var(--admin-primary) #edf2ee;
        }

        *::-webkit-scrollbar {
            width: 12px;
            height: 12px;
        }

        *::-webkit-scrollbar-track {
            background: #edf2ee;
            border-radius: 999px;
        }

        *::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, var(--admin-primary), var(--admin-primary-deep));
            border-radius: 999px;
            border: 3px solid #edf2ee;
        }

        body {
            min-height: 100vh;
            color: var(--admin-text);
            background:
                radial-gradient(circle at top left, rgba(13, 107, 58, 0.16), transparent 28%),
                radial-gradient(circle at top right, rgba(199, 167, 75, 0.12), transparent 22%),
                linear-gradient(180deg, #f8fbf7 0%, #eef4ef 100%);
        }

        .loader-bg {
            background: rgba(248, 251, 247, 0.84);
            backdrop-filter: blur(10px);
        }

        .pc-sidebar {
            background: transparent;
            box-shadow: none;
        }

        .pc-sidebar .navbar-wrapper {
            margin: 24px 16px 24px 24px;
            min-height: calc(100vh - 48px);
            background: linear-gradient(180deg, rgba(9, 73, 40, 0.96) 0%, rgba(9, 53, 30, 0.98) 100%);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 30px;
            box-shadow: 0 30px 60px rgba(4, 33, 18, 0.24);
            overflow: hidden;
            position: relative;
        }

        .pc-sidebar .navbar-wrapper::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top right, rgba(199, 167, 75, 0.18), transparent 28%),
                radial-gradient(circle at bottom left, rgba(255, 255, 255, 0.08), transparent 22%);
            pointer-events: none;
        }

        .pc-sidebar .m-header {
            padding: 28px 24px 20px;
            position: relative;
            z-index: 1;
        }

        .admin-brand {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
            color: #fff;
            background: rgba(255, 255, 255, 0.07);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 22px;
            padding: 14px 16px;
            backdrop-filter: blur(12px);
        }

        .admin-brand img {
            width: 58px;
            height: 58px;
            object-fit: contain;
            flex-shrink: 0;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.92);
            padding: 8px;
        }

        .admin-brand small {
            display: block;
            color: rgba(255, 255, 255, 0.68);
            font-size: 12px;
            margin-bottom: 4px;
        }

        .admin-brand strong {
            display: block;
            color: #fff;
            font-size: 18px;
            line-height: 1.4;
        }

        .navbar-content {
            padding: 0 14px 16px;
            position: relative;
            z-index: 1;
        }

        .pc-navbar {
            padding: 0;
        }

        .pc-navbar > .pc-item {
            list-style: none;
            margin-bottom: 8px;
        }

        .pc-navbar .pc-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 16px;
            color: rgba(255, 255, 255, 0.84);
            border: 1px solid transparent;
            border-radius: 18px;
            transition: 0.25s ease;
        }

        .pc-navbar .pc-link:hover,
        .pc-navbar .pc-item.active .pc-link {
            color: #fff;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.14), rgba(255, 255, 255, 0.06));
            border-color: rgba(255, 255, 255, 0.08);
            transform: translateX(-4px);
        }

        .pc-navbar .pc-micon {
            width: 42px;
            height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.08);
            color: #fff;
            font-size: 20px;
            flex-shrink: 0;
        }

        .pc-navbar .pc-mtext {
            font-size: 15px;
            font-weight: 600;
        }

        .nav-section-label {
            color: rgba(255, 255, 255, 0.52);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            margin: 22px 14px 10px;
        }

        .sidebar-footer-card {
            margin: 18px 14px 8px;
            padding: 18px;
            border-radius: 22px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.14), rgba(255, 255, 255, 0.04));
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #fff;
        }

        .sidebar-footer-card .badge {
            background: rgba(199, 167, 75, 0.16);
            color: #f6db8d;
            border: 1px solid rgba(246, 219, 141, 0.24);
            border-radius: 999px;
            font-weight: 600;
            padding: 8px 12px;
        }

        .sidebar-footer-card p {
            margin: 12px 0 0;
            color: rgba(255, 255, 255, 0.72);
            line-height: 1.7;
            font-size: 13px;
        }

        .pc-header {
            position: relative !important;
            inset: auto !important;
            top: auto !important;
            right: auto !important;
            left: auto !important;
            width: auto !important;
            margin-right: 260px;
            margin-left: 0;
            z-index: 10;
            background: transparent;
            box-shadow: none;
            border: 0;
        }

        .pc-header .header-wrapper {
            margin: 18px 24px 0 16px;
            padding: 0 0 18px;
            background: transparent;
            border: 0;
            box-shadow: none;
            backdrop-filter: none;
            border-radius: 0;
            display: flex;
            align-items: center;
            justify-content: end;
            gap: 20px;
            border-bottom: 1px solid rgba(13, 68, 40, 0.12);
        }

        .admin-header-start,
        .admin-header-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .pc-head-link {
            width: 46px;
            height: 46px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.86);
            border: 1px solid rgba(13, 68, 40, 0.1);
            border-radius: 14px;
            color: var(--admin-text);
            box-shadow: 0 10px 24px rgba(14, 67, 41, 0.06);
            transition: 0.2s ease;
        }

        .pc-head-link:hover {
            background: var(--admin-primary);
            color: #fff;
            border-color: var(--admin-primary);
        }

        .header-title-block small {
            display: block;
            font-size: 12px;
            color: var(--admin-text-soft);
            margin-bottom: 4px;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        .header-title-block h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 800;
            color: var(--admin-text);
        }

        .header-title-block p {
            margin: 6px 0 0;
            color: var(--admin-text-soft);
            font-size: 14px;
        }

        .admin-user-chip {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 8px 10px;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.72);
            border: 1px solid rgba(13, 68, 40, 0.1);
            color: var(--admin-text);
        }

        .admin-user-chip .avatar {
            width: 42px;
            height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--admin-primary), #13824a);
            color: #fff;
            font-size: 18px;
            box-shadow: 0 12px 24px rgba(11, 107, 58, 0.24);
        }

        .admin-user-chip strong {
            display: block;
            font-size: 14px;
            line-height: 1.2;
        }

        .admin-user-chip span {
            font-size: 12px;
            color: var(--admin-text-soft);
        }

        .head__link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 15px !important;
            border-radius: 14px;
            border: 1px solid rgba(13, 68, 40, 0.1);
            background: rgba(255, 255, 255, 0.78);
            color: var(--admin-text) !important;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 10px 24px rgba(11, 107, 58, 0.05);
            transition: 0.2s ease;
            margin-right: 0 !important;
        }

        .head__link.secondary {
            background: rgba(11, 107, 58, 0.08);
            color: var(--admin-primary) !important;
            border-color: rgba(11, 107, 58, 0.08);
        }

        .head__link.primary-action {
            background: linear-gradient(135deg, var(--admin-primary), var(--admin-primary-deep));
            color: #fff !important;
            border-color: transparent;
            box-shadow: 0 14px 28px rgba(11, 107, 58, 0.16);
        }

        .head__link:hover {
            transform: translateY(-2px);
        }

        .head__link i {
            font-size: 17px;
            line-height: 1;
        }

        .pc-container {
            top: 0;
            padding-top: 0;
        }

        .pc-content {
            padding: 24px;
        }

        .admin-shell-card,
        .card {
            background: var(--admin-surface);
            border: 1px solid rgba(255, 255, 255, 0.72);
            border-radius: var(--admin-radius-lg);
            box-shadow: var(--admin-shadow);
            backdrop-filter: blur(18px);
        }

        .card-header {
            border-bottom: 1px solid rgba(13, 68, 40, 0.08);
            background: transparent;
        }

        .form-control,
        .form-select {
            min-height: 46px;
            border-radius: 14px;
            border: 1px solid rgba(13, 68, 40, 0.12);
            background: rgba(255, 255, 255, 0.92);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: rgba(11, 107, 58, 0.42);
            box-shadow: 0 0 0 0.22rem rgba(11, 107, 58, 0.12);
        }

        .btn {
            border-radius: 14px;
            font-weight: 600;
        }

        .btn-primary,
        .btn-success {
            background: linear-gradient(135deg, var(--admin-primary), var(--admin-primary-deep));
            border-color: transparent;
        }

        .btn-light {
            background: rgba(255, 255, 255, 0.82);
            border-color: rgba(13, 68, 40, 0.1);
        }

        .table {
            --bs-table-bg: transparent;
            color: var(--admin-text);
        }

        .table > :not(caption) > * > * {
            padding: 16px 14px;
            vertical-align: middle;
            border-bottom-color: rgba(13, 68, 40, 0.08);
        }

        .table thead th {
            color: var(--admin-text-soft);
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
        }

        #simpletable_wrapper {
            direction: rtl;
        }

        #simpletable_filter label,
        #simpletable_length label {
            width: 100%;
            color: var(--admin-text-soft);
            font-weight: 600;
        }

        #simpletable_filter input,
        #simpletable_length select {
            margin-top: 8px;
            border-radius: 14px;
            border: 1px solid rgba(13, 68, 40, 0.12);
            min-height: 44px;
            background: rgba(255, 255, 255, 0.88);
        }

        #simpletable_wrapper .row {
            --bs-gutter-y: 16px;
            padding-bottom: 18px;
        }

        .page-link {
            color: var(--admin-primary);
            border-radius: 12px !important;
            margin: 0 3px;
            border-color: rgba(13, 68, 40, 0.1);
        }

        .page-item.active .page-link {
            background: var(--admin-primary);
            border-color: var(--admin-primary);
        }

        .text-right {
            text-align: right;
        }

        .dz-message {
            display: none;
        }

        @media (max-width: 1199.98px) {
            .pc-sidebar .navbar-wrapper {
                margin: 16px;
                min-height: calc(100vh - 32px);
            }

            .pc-header {
                margin-right: 0;
            }

            .pc-header .header-wrapper {
                margin: 16px;
                padding-bottom: 16px;
            }

            .pc-container {
                margin-right: 0;
            }
        }

        @media (max-width: 991.98px) {
            .pc-header .header-wrapper {
                flex-direction: column;
                align-items: stretch;
            }

            .admin-header-actions {
                justify-content: space-between;
            }

            .head__link {
                flex: 1 1 180px;
            }
        }

        @media (max-width: 767.98px) {
            .pc-content {
                padding: 16px;
            }

            .pc-sidebar .navbar-wrapper {
                border-radius: 24px;
            }

            .admin-brand {
                align-items: flex-start;
            }

            .admin-header-start,
            .admin-header-actions {
                width: 100%;
            }

            .header-title-block h1 {
                font-size: 22px;
            }

            .admin-user-chip {
                width: 100%;
                justify-content: space-between;
            }
        }
    </style>
    {!! ToastMagic::styles() !!}
</head>

<body data-pc-preset="preset-1" data-pc-direction="rtl" data-pc-theme="light">
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="{{ route('admin.dashboard') }}" class="admin-brand">
                    <img src="{{ asset('assets/images/main-logo.png') }}" alt="Aljouf">
                    <div>
                        <small>Admin Workspace</small>
                        <strong>بوابة الجوف الإدارية</strong>
                    </div>
                </a>
            </div>

            <div class="navbar-content">
                <div class="nav-section-label">الرئيسية</div>
                <ul class="pc-navbar">
                    <li class="pc-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                            <span class="pc-mtext">لوحة الإدارة</span>
                        </a>
                    </li>
                </ul>

                <div class="nav-section-label">المحتوى والخدمات</div>
                <ul class="pc-navbar">
                    <li class="pc-item {{ request()->routeIs('admin.map.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.map.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-map"></i></span>
                            <span class="pc-mtext">الخريطة التفاعلية</span>
                        </a>
                    </li>
                    <li class="pc-item {{ request()->routeIs('admin.departments.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.departments.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-building-community"></i></span>
                            <span class="pc-mtext">إدارة الإدارات</span>
                        </a>
                    </li>
                    <li class="pc-item {{ request()->routeIs('admin.videos.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.videos.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-video"></i></span>
                            <span class="pc-mtext">الفيديوهات التعليمية</span>
                        </a>
                    </li>
                    <li class="pc-item {{ request()->routeIs('admin.policies.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.policies.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-shield-check"></i></span>
                            <span class="pc-mtext">السياسات والإرشادات</span>
                        </a>
                    </li>
                    <li class="pc-item {{ request()->routeIs('admin.home-video.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.home-video.edit') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-player-play"></i></span>
                            <span class="pc-mtext">الفيديو التوضيحي</span>
                        </a>
                    </li>
                    <li class="pc-item {{ request()->routeIs('admin.templates.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.templates.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-files"></i></span>
                            <span class="pc-mtext">القوالب السريعة</span>
                        </a>
                    </li>
                    <li class="pc-item {{ request()->routeIs('admin.service-contacts.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.service-contacts.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-phone"></i></span>
                            <span class="pc-mtext">جهات تواصل الخدمات</span>
                        </a>
                    </li>
                </ul>

                <div class="nav-section-label">إدارة المستخدمين</div>
                <ul class="pc-navbar">
                    <li class="pc-item {{ request()->routeIs('admin.employees.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.employees.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-users"></i></span>
                            <span class="pc-mtext">الموظفون المرشدون</span>
                        </a>
                    </li>
                    <li class="pc-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-user-check"></i></span>
                            <span class="pc-mtext">مستخدمو المنصة</span>
                        </a>
                    </li>
                    <li class="pc-item {{ request()->routeIs('admin.bot.*') || request()->routeIs('admin.bot-settings.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.bot.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-brand-hipchat"></i></span>
                            <span class="pc-mtext">البوت التفاعلي</span>
                        </a>
                    </li>
                    <li class="pc-item {{ request()->routeIs('admin.password.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.password.update') }}" class="pc-link">
                            <span class="pc-micon"><i class="ti ti-lock"></i></span>
                            <span class="pc-mtext">تغيير كلمة المرور</span>
                        </a>
                    </li>
                </ul>

                <div class="sidebar-footer-card">
                    <span class="badge">واجهة إدارية جديدة</span>
                    <p>تصميم أوضح، تنقل أسرع، ومساحات أكثر راحة للعمل اليومي بدون تغيير أي من وظائف النظام.</p>
                </div>
            </div>
        </div>
    </nav>

    <header class="pc-header">
        <div class="header-wrapper">
            <div class="admin-header-actions">
                <a class="head__link secondary" href="{{ route('permit.program') }}" target="_blank">
                    <i class="ti ti-ticket"></i>
                    برنامج التصاريح
                </a>
                <a class="head__link secondary" href="{{ route('welcome.program') }}" target="_blank">
                    <i class="ti ti-external-link"></i>
                    البرنامج الترحيبي
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a class="head__link primary-action" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="ti ti-logout"></i>
                    تسجيل الخروج
                </a>
            </div>
        </div>
    </header>

    @yield('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('admin/assets/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/dashboard-default.js') }}"></script>
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

</html>
