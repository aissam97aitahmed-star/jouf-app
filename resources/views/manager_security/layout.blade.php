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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        header.security .actions a i {
            vertical-align: -webkit-baseline-middle;
            font-size: 20px;
            margin-left: 0 !important;
            color: white;
        }

        .pagination_or p {
            display: none
        }

        .page-link {
            color: #00471F
        }

        .active>.page-link,
        .page-link.active {
            z-index: 3;
            color: white;
            background-color: #00471F;
            border-color: #00471F;
        }

        div:where(.swal2-container) h2:where(.swal2-title),
        div:where(.swal2-container) div:where(.swal2-html-container),
        [type=button]:not(:disabled),
        [type=reset]:not(:disabled),
        [type=submit]:not(:disabled),
        button:not(:disabled) {
            font-family: "Tajawal", sans-serif !important;
            font-style: normal !important;

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
                    <a href="{{ route('security_manager.dashboard') }}" class="btn btn-primary position-relative">
                        <i class="bi bi-house"></i>
                    </a>
                    <a href="{{ route('security_manager.notifications') }}" class="btn btn-primary position-relative">
                        <i class="bi bi-bell"></i>
                        <span class="notification-badge" id="notificationCount">{{ $notificationCount ?? 0 }}</span>
                    </a>

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
                <div class="col-6 col-sm-6 col-md-3">
                    <div class="item">
                        <i class="bi bi-card-list"></i>
                        <strong style="color: #111827;"
                            class="tajawal-bold fs-24">{{ DB::table('orders')->where('status', 'pending')->count() }}</strong>
                        <p class="tajawal-regular fs-12" style="color: #4B5563;">إجمالي الطلبات</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-3">
                    <div class="item">
                        <i class="bi bi-clock"
                            style="background: linear-gradient(90deg, #EAB308 0%, #F97316 100%);"></i>
                        <strong style="color: #111827;"
                            class="tajawal-bold fs-24">{{ DB::table('orders')->where('status', 'pending')->count() }}</strong>
                        <p class="tajawal-regular fs-12" style="color: #4B5563;">في الانتظار</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-3">
                    <div class="item">
                        <i class="bi bi-check-circle"
                            style="background: linear-gradient(90deg, #22C55E 0%, #059669 100%);"></i>
                        <strong style="color: #111827;"
                            class="tajawal-bold fs-24">{{ DB::table('orders')->where('status', 'approved')->count() }}</strong>
                        <p class="tajawal-regular fs-12" style="color: #4B5563;">مُوافق عليه</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-3">
                    <div class="item">
                        <i class="bi bi-x-circle"
                            style="background: linear-gradient(90deg, #EF4444 0%, #E11D48 100%);"></i>
                        <strong style="color: #111827;"
                            class="tajawal-bold fs-24">{{ DB::table('orders')->where('status', 'rejected')->count() }}</strong></strong>
                        <p class="tajawal-regular fs-12" style="color: #4B5563;">مرفوض</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @yield('content')

    <footer>
        <img src="{{ asset('assets/images/footer.jpg') }}" width="100%" height="88px" alt="">
    </footer>


    <!-- End Reject Order Modal -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const searchInput = document.getElementById('searchInput');
        const ordersContainer = document.getElementById('ordersContainer');
        const orders = ordersContainer.querySelectorAll('.order__single');

        searchInput.addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();

            orders.forEach(order => {
                const name = order.querySelector('h3').textContent.toLowerCase();
                const company = order.querySelector('.item__respons:nth-child(1) p:nth-child(4)')
                    .textContent.toLowerCase();
                const identity = order.querySelector('.item__respons:nth-child(1) p:nth-child(3)')
                    .textContent.toLowerCase();

                if (name.includes(filter) || company.includes(filter) || identity.includes(filter)) {
                    order.style.display = '';
                } else {
                    order.style.display = 'none';
                }
            });
        });
    </script>

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
            window.Echo.channel('order').listen('NewVisitorOrderCreated', (e) => {
                // alert(e);
                notificationCount++;
                document.getElementById('notificationCount').innerText = notificationCount;
                // alert('test');
                notyf.success('تنبيه جديد');



            });
        })
    </script>





</body>

</html>
