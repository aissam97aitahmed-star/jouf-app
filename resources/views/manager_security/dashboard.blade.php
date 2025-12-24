@extends('manager_security.layout')

@section('content')
    <section class="list__sec__manager" style="padding-bottom: 40px;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center search__oredr">
                <form action="">
                    <i class="bi bi-search"></i>
                    <input type="text" id="searchInput" placeholder="البحث بالاسم، الشركة، أو رقم الهوية...">
                </form>
                <div class="actions resp__act">
                    <a href="{{ route('security_manager.dashboard') }}"
                        class="btn btn-primary tajawal-medium fs-14 {{ request()->query('status') == null ? 'active' : '' }}">
                        الكل ({{ $totalCount }})
                    </a>
                    <a href="{{ route('security_manager.dashboard', ['status' => 'pending']) }}"
                        class="btn btn-primary tajawal-medium fs-14 {{ request()->query('status') == 'pending' ? 'active' : '' }}">
                        قيد المراجعة ({{ $pendingCount }})
                    </a>
                    <a href="{{ route('security_manager.dashboard', ['status' => 'completed']) }}"
                        class="btn btn-primary tajawal-medium fs-14 {{ request()->query('status') == 'completed' ? 'active' : '' }}">
                        مكتمل ({{ $completedCount }})
                    </a>
                    <a href="{{ route('security_manager.dashboard', ['status' => 'in_progress']) }}"
                        class="btn btn-primary tajawal-medium fs-14 {{ request()->query('status') == 'in_progress' ? 'active' : '' }}">
                        جاري ({{ $inProgressCount }})
                    </a>
                </div>

            </div>
            <hr style="margin: 30px 0px; color: #80808094;">
            <div class="all__orders" id="ordersContainer">
                @foreach ($orders as $order)
                    <div class="order__single mb-3">
                        <div class="d-flex align-items-center mb-4 head__respons">
                            <h3 class="tajawal-bold fs-20 m-0" style="color: #111827;"> {{ $order->full_name }}</h3>
                            <span class="tajawal-medium fs-12 mr-12 status">
                                @switch($order->status)
                                    @case('pending')
                                        قيد المراجعة
                                    @break

                                    @case('in_progress')
                                        جاري
                                    @break

                                    @case('completed')
                                        مكتمل
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

                        <div class="btns d-flex justify-content-end footer__respons">

                            {!! QrCode::size(150)->style('square')->generate($order->order_number) !!}
                        </div>

                    </div>
                @endforeach
            </div>

            <div class="mt-3 pagination_or">
                {{ $orders->links() }}
            </div>
        </div>
    </section>
@endsection
