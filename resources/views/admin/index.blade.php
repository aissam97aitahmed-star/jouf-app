@extends('admin.layout')

@section('page_title', 'لوحة الإدارة الذكية')
@section('page_subtitle', 'نظرة سريعة على مؤشرات المنصة والطلبات النشطة بتجربة أكثر وضوحًا وسرعة')

@section('content')
    @php
        $pendingCount = $orders->where('status', 'pending')->count();
        $hostApprovedCount = $orders->where('status', 'host_approved')->count();
        $approvedCount = $orders->filter(fn($order) => in_array($order->status, ['approved', 'in_progress', 'completed']))->count();
        $inProgressCount = $orders->where('status', 'in_progress')->count();
        $completedCount = $orders->where('status', 'completed')->count();
    @endphp

    <div class="pc-container">
        <div class="pc-content">
            <div class="admin-dashboard">
                <section class="dashboard-hero">
                    <div class="hero-content">
                        <span class="hero-badge">شركة الجوف للتنمية الزراعية</span>
                        <h2 class="text-white">مساحة إدارية أوضح لاتخاذ القرار ومتابعة العمل اليومي</h2>
                        <p>
                            تم ترتيب أهم المؤشرات والطلبات في واجهة أبسط وأكثر راحة بصريًا حتى يصل المدير إلى المعلومات
                            الأساسية بسرعة ومن دون تشتيت.
                        </p>

                        <div class="hero-highlights">
                            <div class="hero-pill">
                                <i class="ti ti-hourglass"></i>
                                <span>{{ $pendingCount }} طلب بانتظار موافقة المستضيف</span>
                            </div>
                            <div class="hero-pill">
                                <i class="ti ti-user-check"></i>
                                <span>{{ $hostApprovedCount }} طلب وافق عليه المستضيف</span>
                            </div>
                            <div class="hero-pill">
                                <i class="ti ti-circle-check"></i>
                                <span>{{ $approvedCount }} طلب اعتمده مدير الأمن</span>
                            </div>
                        </div>
                    </div>

                    <div class="hero-panel">
                        <div class="hero-panel-top">
                            <span>ملخص الحالة</span>
                            <strong>جاهزية تشغيل عالية</strong>
                        </div>

                        <div class="hero-metric">
                            <div>
                                <small>إجمالي الطلبات</small>
                                <strong>{{ $orders_count }}</strong>
                            </div>
                            <span class="metric-trend positive">
                                <i class="ti ti-trending-up"></i>
                                مباشر
                            </span>
                        </div>

                        <div class="hero-mini-stats">
                            <div>
                                <strong>{{ $approvedCount }}</strong>
                                <span>اعتماد نهائي</span>
                            </div>
                            <div>
                                <strong>{{ $hostApprovedCount }}</strong>
                                <span>موافقة المستضيف</span>
                            </div>
                            <div>
                                <strong>{{ $pendingCount }}</strong>
                                <span>بانتظار الرد</span>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="stats-grid row g-4">
                    <div class="col-md-6 col-xl-3">
                        <article class="metric-card">
                            <div class="metric-icon success">
                                <i class="ti ti-ticket"></i>
                            </div>
                            <div class="metric-meta">
                                <span>مجموع الطلبات</span>
                                <h3>{{ $orders_count }}</h3>
                                <p>{{ $approvedCount }} طلب وصل إلى الاعتماد النهائي</p>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <article class="metric-card">
                            <div class="metric-icon ocean">
                                <i class="ti ti-user-plus"></i>
                            </div>
                            <div class="metric-meta">
                                <span>عدد الموظفين الجدد</span>
                                <h3>{{ $employyes_count }}</h3>
                                <p>إدارة أسرع لبيانات فريق العمل</p>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <article class="metric-card">
                            <div class="metric-icon gold">
                                <i class="ti ti-video"></i>
                            </div>
                            <div class="metric-meta">
                                <span>الفيديوهات التعليمية</span>
                                <h3>{{ $videos_count }}</h3>
                                <p>محتوى توعوي جاهز للوصول السريع</p>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <article class="metric-card">
                            <div class="metric-icon rose">
                                <i class="ti ti-shield-check"></i>
                            </div>
                            <div class="metric-meta">
                                <span>السياسات والإرشادات</span>
                                <h3>{{ $policies_count }}</h3>
                                <p>مستندات مؤسسية محدثة للرجوع الفوري</p>
                            </div>
                        </article>
                    </div>
                </section>

                <section class="orders-section">
                    <div class="section-heading">
                        <div>
                            <span class="section-kicker">Order Center</span>
                            <h5>إدارة الطلبات</h5>
                            <p>مراجعة الطلبات وتتبع مراحل الموافقة من انتظار المستضيف حتى اعتماد مدير الأمن.</p>
                        </div>

                        <div class="section-chips">
                            <span class="section-chip">قيد الانتظار: {{ $pendingCount }}</span>
                            <span class="section-chip">موافقة المستضيف: {{ $hostApprovedCount }}</span>
                            <span class="section-chip">اعتماد مدير الأمن: {{ $approvedCount }}</span>
                        </div>
                    </div>

                    <div class="approval-overview-grid">
                        <article class="approval-stage-card pending">
                            <span class="approval-stage-label">المرحلة 1</span>
                            <strong>{{ $pendingCount }}</strong>
                            <p>طلبات جديدة لم يوافق عليها المستضيف بعد</p>
                        </article>
                        <article class="approval-stage-card host">
                            <span class="approval-stage-label">المرحلة 2</span>
                            <strong>{{ $hostApprovedCount }}</strong>
                            <p>تمت موافقة المستضيف عليها وهي بانتظار اعتماد مدير الأمن</p>
                        </article>
                        <article class="approval-stage-card security">
                            <span class="approval-stage-label">المرحلة 3</span>
                            <strong>{{ $approvedCount }}</strong>
                            <p>تم اعتمادها نهائياً من مدير الأمن</p>
                        </article>
                    </div>

                    <div class="card orders-table-card tbl-card">
                        <div class="card-body">
                            <div class="dt-responsive table-responsive">
                                <table id="simpletable" class="table align-middle table-hover nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>الزائر</th>
                                            <th>التقدم</th>
                                            <th>الرمز</th>
                                            <th>تاريخ الإنشاء</th>
                                            <th>نوع الزيارة</th>
                                            <th>الموظف المستضيف</th>
                                            <th>تاريخ ووقت الزيارة</th>
                                            <th>الحالة</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $key => $order)
                                            @php
                                                $approvalStep = match ($order->status) {
                                                    'host_approved' => 2,
                                                    'approved', 'in_progress', 'completed' => 3,
                                                    default => 1,
                                                };
                                            @endphp
                                            <tr>
                                                <td>
                                                    <span class="row-index">{{ $key + 1 }}</span>
                                                </td>
                                                <td>
                                                    <div class="visitor-cell">
                                                        <div class="visitor-avatar">
                                                            {{ mb_substr($order->full_name ?? 'ز', 0, 1) }}
                                                        </div>
                                                        <div class="visitor-meta">
                                                            <strong>{{ $order->full_name }}</strong>
                                                            <span>{{ $order->job_title ?: 'بدون مسمى وظيفي' }}</span>
                                                            <span>{{ $order->company ?: 'بدون جهة عمل' }}</span>
                                                            <span>{{ $order->identity_number }}</span>
                                                            <span>{{ $order->phone }}</span>
                                                            <span>{{ $order->email }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                    <td>
                                                    <div class="approval-progress {{ $order->status === 'rejected' ? 'is-rejected' : '' }}">
                                                        <div class="approval-progress-track">
                                                            <span class="approval-step {{ $approvalStep >= 1 ? 'is-done' : '' }}">
                                                                <span class="approval-dot"></span>
                                                                <small>انتظار</small>
                                                            </span>
                                                            <span class="approval-step {{ $approvalStep >= 2 ? 'is-done' : '' }}">
                                                                <span class="approval-dot"></span>
                                                                <small>موافقة المستضيف</small>
                                                            </span>
                                                            <span class="approval-step {{ $approvalStep >= 3 ? 'is-done' : '' }}">
                                                                <span class="approval-dot"></span>
                                                                <small>اعتماد الأمن</small>
                                                            </span>
                                                        </div>
                                                        @if ($order->status === 'rejected')
                                                            <span class="approval-progress-note">تم إيقاف الطلب بسبب الرفض</span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    @if (in_array($order->status, ['approved', 'in_progress', 'completed']))
                                                        <div class="qr-box">
                                                            {!! QrCode::size(84)->style('square')->generate($order->order_number) !!}
                                                        </div>
                                                    @else
                                                        <span class="muted-chip">غير متاح</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="date-meta">
                                                        <strong>{{ $order->created_at->format('Y-m-d') }}</strong>
                                                        <span>{{ $order->created_at->locale('ar')->diffForHumans() }}</span>
                                                    </div>
                                                </td>
                                                <td>{{ $order->visit_purpose }}</td>
                                                <td>{{ $order->host_employee }}</td>
                                                <td>
                                                    <div class="date-meta">
                                                        <strong>{{ $order->visit_date }}</strong>
                                                        <span>{{ $order->visit_time }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($order->status === 'pending')
                                                        <span class="status-pill warning">
                                                            <i class="ti ti-hourglass-low"></i>
                                                            في الانتظار
                                                        </span>
                                                    @elseif ($order->status === 'host_approved')
                                                        <span class="status-pill primary-soft">
                                                            <i class="ti ti-user-check"></i>
                                                            وافق المستضيف
                                                        </span>
                                                    @elseif ($order->status === 'approved')
                                                        <span class="status-pill success">
                                                            <i class="ti ti-circle-check"></i>
                                                            اعتماد مدير الأمن
                                                        </span>
                                                    @elseif ($order->status === 'rejected')
                                                        <span class="status-pill danger">
                                                            <i class="ti ti-circle-x"></i>
                                                            تم الرفض
                                                        </span>
                                                    @elseif ($order->status === 'in_progress')
                                                        <span class="status-pill info">
                                                            <i class="ti ti-loader-2"></i>
                                                            جاري التنفيذ
                                                        </span>
                                                    @elseif ($order->status === 'completed')
                                                        <span class="status-pill success-soft">
                                                            <i class="ti ti-checkup-list"></i>
                                                            مكتمل
                                                        </span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <button data-id="{{ $order->id }}" type="button"
                                                        class="btn btn-delete-action btn-delete">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .admin-dashboard {
            display: grid;
            gap: 24px;
        }

        .dashboard-hero {
            display: grid;
            grid-template-columns: minmax(0, 1.6fr) minmax(320px, 0.9fr);
            gap: 20px;
            padding: 28px;
            border-radius: 30px;
            background:
                radial-gradient(circle at top right, rgba(199, 167, 75, 0.18), transparent 30%),
                linear-gradient(135deg, rgba(8, 77, 42, 0.96), rgba(15, 104, 58, 0.92));
            color: #fff;
            box-shadow: 0 28px 60px rgba(8, 67, 37, 0.24);
            position: relative;
            overflow: hidden;
        }

        .dashboard-hero::after {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.18), transparent 64%);
            top: -120px;
            left: -80px;
            pointer-events: none;
        }

        .hero-content,
        .hero-panel {
            position: relative;
            z-index: 1;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.14);
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .dashboard-hero h2 {
            font-size: clamp(28px, 4vw, 42px);
            line-height: 1.35;
            font-weight: 800;
            margin-bottom: 14px;
            max-width: 11ch;
        }

        .dashboard-hero p {
            max-width: 720px;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.9;
            margin-bottom: 22px;
            font-size: 15px;
        }

        .hero-highlights {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .hero-pill {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(10px);
            font-weight: 600;
        }

        .hero-panel {
            padding: 22px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(16px);
            align-self: stretch;
        }

        .hero-panel-top span,
        .hero-metric small,
        .hero-mini-stats span {
            color: rgba(255, 255, 255, 0.7);
        }

        .hero-panel-top strong {
            display: block;
            margin-top: 6px;
            font-size: 20px;
            font-weight: 800;
        }

        .hero-metric {
            margin: 22px 0;
            padding: 18px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
        }

        .hero-metric strong {
            display: block;
            font-size: 40px;
            line-height: 1;
            margin-top: 6px;
        }

        .metric-trend {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 12px;
            border-radius: 14px;
            font-weight: 700;
            background: rgba(255, 255, 255, 0.12);
        }

        .hero-mini-stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
        }

        .hero-mini-stats div {
            padding: 14px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.08);
            text-align: center;
        }

        .hero-mini-stats strong {
            display: block;
            font-size: 24px;
            margin-bottom: 4px;
        }

        .metric-card {
            height: 100%;
            padding: 22px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.78);
            border: 1px solid rgba(255, 255, 255, 0.72);
            box-shadow: 0 20px 44px rgba(12, 54, 33, 0.08);
            display: flex;
            align-items: flex-start;
            gap: 16px;
        }

        .metric-icon {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            flex-shrink: 0;
        }

        .metric-icon.success {
            background: rgba(11, 107, 58, 0.12);
            color: #0b6b3a;
        }

        .metric-icon.ocean {
            background: rgba(34, 119, 182, 0.12);
            color: #2277b6;
        }

        .metric-icon.gold {
            background: rgba(199, 167, 75, 0.16);
            color: #a37c10;
        }

        .metric-icon.rose {
            background: rgba(173, 74, 92, 0.12);
            color: #ad4a5c;
        }

        .metric-meta span {
            display: block;
            color: #607468;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .metric-meta h3 {
            margin: 0 0 8px;
            font-size: 34px;
            color: #123524;
            font-weight: 800;
        }

        .metric-meta p {
            margin: 0;
            color: #708274;
            line-height: 1.7;
        }

        .orders-section {
            display: grid;
            gap: 16px;
        }

        .approval-overview-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        .approval-stage-card {
            padding: 18px 20px;
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.82);
            border: 1px solid rgba(13, 68, 40, 0.08);
            box-shadow: 0 18px 36px rgba(12, 54, 33, 0.06);
        }

        .approval-stage-card strong {
            display: block;
            margin: 10px 0 6px;
            font-size: 34px;
            line-height: 1;
            color: #123524;
        }

        .approval-stage-card p {
            margin: 0;
            color: #6d7f73;
            line-height: 1.7;
        }

        .approval-stage-label {
            display: inline-flex;
            align-items: center;
            padding: 8px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
        }

        .approval-stage-card.pending .approval-stage-label {
            background: rgba(255, 194, 31, 0.18);
            color: #946200;
        }

        .approval-stage-card.host .approval-stage-label {
            background: rgba(23, 92, 211, 0.12);
            color: #175cd3;
        }

        .approval-stage-card.security .approval-stage-label {
            background: rgba(11, 107, 58, 0.14);
            color: #0b6b3a;
        }

        .section-heading {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .section-kicker {
            display: inline-block;
            margin-bottom: 8px;
            color: #7d8e83;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .section-heading h5 {
            margin: 0;
            font-size: 28px;
            font-weight: 800;
            color: #123524;
        }

        .section-heading p {
            margin: 8px 0 0;
            color: #6d7f73;
        }

        .section-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .section-chip {
            display: inline-flex;
            align-items: center;
            padding: 10px 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.72);
            border: 1px solid rgba(13, 68, 40, 0.08);
            color: #45604f;
            font-weight: 700;
        }

        .orders-table-card {
            border-radius: 28px;
            overflow: hidden;
        }

        .row-index {
            width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: rgba(11, 107, 58, 0.08);
            color: #0b6b3a;
            font-weight: 800;
        }

        .visitor-cell {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            min-width: 240px;
        }

        .visitor-avatar {
            width: 48px;
            height: 48px;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0b6b3a, #1a8f54);
            color: #fff;
            font-size: 20px;
            font-weight: 800;
            flex-shrink: 0;
        }

        .visitor-meta {
            display: grid;
            gap: 4px;
        }

        .visitor-meta strong {
            font-size: 15px;
            color: #123524;
        }

        .visitor-meta span {
            color: #6b7d70;
            line-height: 1.5;
            font-size: 13px;
        }

        .qr-box {
            width: fit-content;
            padding: 10px;
            border-radius: 18px;
            background: #fff;
            border: 1px solid rgba(13, 68, 40, 0.08);
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.8);
        }

        .muted-chip {
            display: inline-flex;
            align-items: center;
            padding: 10px 12px;
            border-radius: 12px;
            background: rgba(112, 130, 116, 0.1);
            color: #708274;
            font-weight: 700;
        }

        .date-meta {
            display: grid;
            gap: 4px;
        }

        .date-meta strong {
            color: #123524;
        }

        .date-meta span {
            color: #75867b;
            font-size: 13px;
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 12px;
            border-radius: 999px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-pill.warning {
            color: #946200;
            background: rgba(255, 194, 31, 0.18);
        }

        .status-pill.success {
            color: #0b6b3a;
            background: rgba(11, 107, 58, 0.14);
        }

        .status-pill.primary-soft {
            color: #175cd3;
            background: rgba(23, 92, 211, 0.12);
        }

        .status-pill.success-soft {
            color: #166246;
            background: rgba(22, 98, 70, 0.12);
        }

        .status-pill.danger {
            color: #b42318;
            background: rgba(244, 67, 54, 0.12);
        }

        .status-pill.info {
            color: #175cd3;
            background: rgba(23, 92, 211, 0.12);
        }

        .approval-progress {
            min-width: 230px;
        }

        .approval-progress-track {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 8px;
            position: relative;
        }

        .approval-progress-track::before {
            content: "";
            position: absolute;
            top: 7px;
            right: 14px;
            left: 14px;
            height: 2px;
            background: linear-gradient(90deg, #d8e2da 0%, #e7efe8 100%);
            z-index: 0;
        }

        .approval-step {
            position: relative;
            z-index: 1;
            display: grid;
            justify-items: center;
            gap: 8px;
            color: #8a9a90;
            text-align: center;
            flex: 1;
        }

        .approval-step small {
            font-size: 11px;
            line-height: 1.45;
            font-weight: 700;
        }

        .approval-dot {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #d8e2da;
            border: 3px solid #f8fbf8;
            box-shadow: 0 0 0 2px rgba(216, 226, 218, 0.9);
        }

        .approval-step.is-done {
            color: #123524;
        }

        .approval-step.is-done .approval-dot {
            background: linear-gradient(135deg, #0b6b3a, #24a35d);
            box-shadow: 0 0 0 2px rgba(36, 163, 93, 0.18);
        }

        .approval-progress-note {
            display: inline-flex;
            margin-top: 10px;
            color: #c2410c;
            font-size: 12px;
            font-weight: 700;
        }

        .approval-progress.is-rejected .approval-dot {
            background: #f4d7d7;
            box-shadow: 0 0 0 2px rgba(244, 215, 215, 0.8);
        }

        .btn-delete-action {
            width: 46px;
            height: 46px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 0;
            border-radius: 16px;
            background: rgba(180, 35, 24, 0.1);
            color: #b42318;
            transition: 0.2s ease;
        }

        .btn-delete-action:hover {
            background: #b42318;
            color: #fff;
            transform: translateY(-1px);
        }

        @media (max-width: 1199.98px) {
            .dashboard-hero {
                grid-template-columns: 1fr;
            }

            .approval-overview-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 767.98px) {
            .dashboard-hero,
            .metric-card {
                padding: 20px;
            }

            .hero-mini-stats {
                grid-template-columns: 1fr;
            }

            .section-heading h5 {
                font-size: 22px;
            }

            .visitor-cell {
                min-width: 200px;
            }
        }
    </style>
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            $('#simpletable').DataTable({
                language: {
                    lengthMenu: "عرض _MENU_ مدخلات",
                    search: "بحث:",
                    info: "عرض _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    infoEmpty: "لا توجد بيانات للعرض",
                    infoFiltered: "(تمت التصفية من _MAX_ مدخل)",
                    zeroRecords: "لم يتم العثور على نتائج",
                    paginate: {
                        first: "الأول",
                        last: "الأخير",
                        next: "التالي",
                        previous: "السابق"
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-delete');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    Swal.fire({
                        title: 'هل أنت متأكد؟',
                        text: "لن تتمكن من التراجع عن الحذف!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#b42318',
                        cancelButtonColor: '#0b6b3a',
                        confirmButtonText: 'نعم، احذف!',
                        cancelButtonText: 'إلغاء'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(`{{ url('admin/dashboard/destry/order') }}/${id}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Accept': 'application/json'
                                    }
                                }).then(res => res.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire('تم الحذف!', data.message, 'success')
                                            .then(() => {
                                                this.closest('tr').remove();
                                            });
                                    }
                                }).catch(() => Swal.fire('حدث خطأ', 'لم يتم حذف الطلب', 'error'));
                        }
                    });
                });
            });
        });
    </script>
@endpush
