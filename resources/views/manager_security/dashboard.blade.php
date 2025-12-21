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
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
                <div class="col-6 col-sm-6 col-md-3">
                    <div class="item">
                        <i class="bi bi-card-list"></i>
                        <strong style="color: #111827;" class="tajawal-bold fs-24">{{ $orders->count() }}</strong>
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

    <section class="list__sec__manager" style="padding-bottom: 40px;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center search__oredr">
                <form action="">
                    <i class="bi bi-search"></i>
                    <input type="text" placeholder="البحث بالاسم، الشركة، أو رقم الهوية...">
                </form>
                <div class="actions resp__act">
                    <a href="" class="btn btn-primary tajawal-medium fs-14">الكل (5)</a>
                    <a href="" class="btn btn-primary tajawal-medium fs-14 active">قيد المراجعة (3)</a>
                    <a href="" class="btn btn-primary tajawal-medium fs-14">موافق عليه (1)</a>
                    <a href="" class="btn btn-primary tajawal-medium fs-14">مرفوض (1)</a>
                </div>
            </div>
            <hr style="margin: 30px 0px; color: #80808094;">
            <div class="all__orders">
                @foreach ($orders as $order)
                    <div class="order__single mb-3">
                        <div class="d-flex align-items-center mb-4 head__respons">
                            <h3 class="tajawal-bold fs-20 m-0" style="color: #111827;"> {{ $order->full_name }}</h3>
                            <span class="tajawal-medium fs-12 mr-12 status"> @switch($order->status)
                                    @case('pending')
                                        قيد المراجعة
                                    @break

                                    @case('approved')
                                        مقبول
                                    @break

                                    @case('rejected')
                                        مرفوض
                                    @break
                                @endswitch
                            </span>
                            <span class="tajawal-regular fs-14 mr-12 id">#{{ $order->order_number }}</span>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4 item__respons">
                                <p class="tajawal-regular fs-14" style="color: #6B7280;">بيانات الزائر</p>
                                <h5 class="tajawal-bold fs-14 m-0" style="color: #111827;">{{ $order->full_name }}
                                </h5>
                                <p class="tajawal-regular fs-14" style="color: #4B5563;">هوية:
                                    {{ $order->identity_number }}</p>
                                <p class="tajawal-regular fs-14" style="color: #4B5563;">جوال: {{ $order->phone }}
                                </p>
                                <p class="tajawal-regular fs-14" style="color: #4B5563;">{{ $order->company }}</p>
                            </div>
                            <div class="col-md-4 item__respons">
                                <p class="tajawal-regular fs-14" style="color: #6B7280;"> الموظف المستضيف</p>
                                <h5 class="tajawal-bold fs-14 m-0" style="color: #111827;">
                                    {{ $order->host_employee }}</h5>
                                <p class="tajawal-regular fs-14" style="color: #4B5563;"> {{ $order->department }}
                                </p>
                            </div>
                            <div class="col-md-4 item__respons">
                                <p class="tajawal-regular fs-14" style="color: #6B7280;">تفاصيل الزيارة</p>
                                <h5 class="tajawal-bold fs-14 m-0" style="color: #111827;">
                                    {{ $order->visit_purpose }}</h5>
                                <p class="tajawal-regular fs-14" style="color: #4B5563;">{{ $order->visit_date }} -
                                    {{ $order->visit_time }}</p>
                                <p class="tajawal-regular fs-14" style="color: #4B5563;">المدة:
                                    {{ $order->visit_duration }}</p>
                            </div>
                        </div>
                        @if ($order->special_requests)
                            <div class="note mb-3">
                                <h6 class="tajawal-medium fs-14" style="color: #6B7280;">ملاحظات إضافية:</h6>
                                <p class="tajawal-regular  fs-14"> {{ $order->special_requests }}</p>
                            </div>
                        @endif
                        <p class="tajawal-regular  fs-14 mb-3" style="color: #6B7280;">تاريخ الطلب:
                            {{ $order->created_at->locale('ar')->diffForHumans() }}
                        </p>

                        <div class="btns d-flex justify-content-end footer__respons" data-bs-toggle="modal"
                            data-bs-target="#RejectOrderModal">

                            {!! QrCode::size(220)->style('square')->generate($order->order_number) !!}

                            {{-- <a href="javascript:void(0)" class="btn btn-primary tajawal-medium fs-16 mr-12"><i
                                    class="bi bi-x"></i>
                                رفض
                                الطلب</a>

                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#AcceptOrderModal"
                                class="btn btn-primary tajawal-medium fs-16 mr-12"><i class="bi bi-check"></i> موافقة
                                وإنشاء QR</a> --}}
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer>
        <img src="{{ asset('assets/images/footer.jpg') }}" width="100%" height="88px" alt="">
    </footer>



    <!-- Start Accept Order Modal -->
    <div class="modal fade employees__call modal__mng_accept" id="AcceptOrderModal" tabindex="-1"
        aria-labelledby="AcceptOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex flex-column justify-content-center align-items-center w-100">
                        <span class="tajawal-bold fs-30 mb-3"> <i class="bi bi-check d-flex"></i></span>
                        <h5 class="tajawal-bold fs-24" style="color: #FFFFFF;">موافقة على الطلب</h5>
                        <p class="tajawal-regular fs-16" style="color: #E0E7FF;">سيتم إنشاء رمز QR وإرساله للزائر</p>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row order__details mb-3">
                        <h4 class="tajawal-bold fs-18" style="color: #111827;">تفاصيل الطلب:</h4>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <p class="tajawal-regular fs-14" style="color: #6B7280;">الزائر:</p>
                                <h5 class="tajawal-bold fs-14">أحمد محمد العلي</h5>
                            </div>
                            <div class="col-md-6 mb-2">
                                <p class="tajawal-regular fs-14" style="color: #6B7280;">الشركة:</p>
                                <h5 class="tajawal-bold fs-14">شركة التقنية المتقدمة</h5>
                            </div>
                            <div class="col-md-6 mb-2">
                                <p class="tajawal-regular fs-14" style="color: #6B7280;">التاريخ:</p>
                                <h5 class="tajawal-bold fs-14">2024-01-16 - 10:00</h5>
                            </div>
                            <div class="col-md-6 mb-2">
                                <p class="tajawal-regular fs-14" style="color: #6B7280;">الغرض:</p>
                                <h5 class="tajawal-bold fs-14">اجتماع تقني</h5>
                            </div>
                            <div class="col-md-6">
                                <p class="tajawal-regular fs-14" style="color: #6B7280;">الموظف المستضيف:</p>
                                <h5 class="tajawal-bold fs-14">سارة أحمد خالد</h5>
                            </div>
                            <div class="col-md-6">
                                <p class="tajawal-regular fs-14" style="color: #6B7280;">القسم:</p>
                                <h5 class="tajawal-bold fs-14">قسم تقنية المعلومات</h5>
                            </div>
                        </div>
                    </div>
                    <div class="options d-flex flex-row gap-2 ftmd__end">
                        <a href="javascript:void(0)" class="btn btn-primary w-100 tajawal-medium fs-16"
                            data-bs-dismiss="modal" aria-label="Close">
                            إلغاء
                        </a>
                        <a href="#" class="btn btn-primary w-100 tajawal-medium fs-16">
                            موافقة وإنشاء QR
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Accept Order Modal -->


    <!-- Start Reject Order Modal -->
    <div class="modal fade employees__call modal__mng_accept" id="RejectOrderModal" tabindex="-1"
        aria-labelledby="RejectOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(90deg, #EF4444 0%, #E11D48 100%);">
                    <div class="d-flex flex-column justify-content-center align-items-center w-100">
                        <span class="tajawal-bold fs-30 mb-3"> <i class="bi bi-x d-flex"></i></span>
                        <h5 class="tajawal-bold fs-24" style="color: #FFFFFF;">رفض الطلب</h5>
                        <p class="tajawal-regular fs-16" style="color: #E0E7FF;">سيتم إشعار مقدم الطلب بالرفض</p>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row order__details mb-3">
                        <h4 class="tajawal-bold fs-18" style="color: #111827;">تفاصيل الطلب:</h4>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <p class="tajawal-regular fs-14" style="color: #6B7280;">الزائر:</p>
                                <h5 class="tajawal-bold fs-14">أحمد محمد العلي</h5>
                            </div>
                            <div class="col-md-6 mb-2">
                                <p class="tajawal-regular fs-14" style="color: #6B7280;">الشركة:</p>
                                <h5 class="tajawal-bold fs-14">شركة التقنية المتقدمة</h5>
                            </div>
                            <div class="col-md-6 mb-2">
                                <p class="tajawal-regular fs-14" style="color: #6B7280;">التاريخ:</p>
                                <h5 class="tajawal-bold fs-14">2024-01-16 - 10:00</h5>
                            </div>
                            <div class="col-md-6 mb-2">
                                <p class="tajawal-regular fs-14" style="color: #6B7280;">الغرض:</p>
                                <h5 class="tajawal-bold fs-14">اجتماع تقني</h5>
                            </div>
                            <div class="col-md-6">
                                <p class="tajawal-regular fs-14" style="color: #6B7280;">الموظف المستضيف:</p>
                                <h5 class="tajawal-bold fs-14">سارة أحمد خالد</h5>
                            </div>
                            <div class="col-md-6">
                                <p class="tajawal-regular fs-14" style="color: #6B7280;">القسم:</p>
                                <h5 class="tajawal-bold fs-14">قسم تقنية المعلومات</h5>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="tajawal-bold fs-14 w-100" style="color: #374151;">سبب الرفض ​
                            <span style="color: #EF4444;">*</span></label>
                        <textarea class="w-100" name="" id="" placeholder="اكتب سبب رفض الطلب..." rows="3"></textarea>
                        <span class="tajawal-regular fs-12" style="color: #6B7280;">0/300 حرف</span>
                    </div>
                    <div class="options d-flex flex-row gap-2 ftmd__end">
                        <a href="javascript:void(0)" class="btn btn-primary w-100 tajawal-medium fs-16"
                            data-bs-dismiss="modal" aria-label="Close">
                            إلغاء
                        </a>
                        <a href="#" class="btn btn-primary w-100 tajawal-medium fs-16 reject">
                            تأكيد الرفض
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Reject Order Modal -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
