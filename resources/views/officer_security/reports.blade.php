@extends('officer_security.layout')

@section('content')
    <section class="reports__security">
        <div class="container">
            <div class="div">
                <div class="d-flex justify-content-between align-items-center report__head">
                    <h3 class="tajawal-bold fs-24 m-0" style="color: #111827; flex: 1;">التقارير والإحصائيات</h3>
                    <a href="" class="btn btn-primary tajawal-regular fs-16 download__reports"> <i
                            class="bi bi-download"></i>
                        تصدير التقرير</a>

                </div>
                <div class="reports__security_details">
                    <div class="row mb-5">
                        <div class="report__single col">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="tajawal-bold fs-18" style="color: #111827;">التقرير اليومي</h4>
                                <i class="bi bi-calendar"></i>
                            </div>
                            <ul class="p-0">
                                <li class="d-flex justify-content-between align-items-center mb-2">
                                    <p class="tajawal-regular fs-16" style="color: #4B5563;">إجمالي الزوار:</p>
                                    <strong style="color: #111827;">{{ $todayTotal }}</strong>
                                </li>
                                <li class="d-flex justify-content-between align-items-center mb-2">
                                    <p class="tajawal-regular fs-16" style="color: #4B5563;">تم الدخول :</p>
                                    <strong style="color: #16A34A;">{{ $todayEntry }}</strong>
                                </li>
                                <li class="d-flex justify-content-between align-items-center mb-2">
                                    <p class="tajawal-regular fs-16" style="color: #4B5563;"> تم الخروج:</p>
                                    <strong style="color: #CA8A04;">{{ $todayExit }}</strong>
                                </li>
                            </ul>
                        </div>

                        <div class="report__single col">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="tajawal-bold fs-18" style="color: #111827;">التقرير الأسبوعي</h4>
                                <i class="bi bi-graph-up-arrow"
                                    style="background: linear-gradient(90deg, #22C55E 0%, #059669 100%);"></i>
                            </div>
                            <ul class="p-0">
                                <li class="d-flex justify-content-between align-items-center mb-2">
                                    <p class="tajawal-regular fs-16" style="color: #4B5563;">متوسط يومي:</p>
                                    <strong class="tajawal-bold fs-16" style="color: #111827;">{{ $weekAvg }}
                                        زائر</strong>
                                </li>
                                <li class="d-flex justify-content-between align-items-center mb-2">
                                    <p class="tajawal-regular fs-16" style="color: #4B5563;">أعلى يوم:</p>
                                    <strong class="tajawal-bold fs-16" style="color: #16A34A;">{{ $weekMaxDay }}
                                        ({{ $weekMax }})</strong>
                                </li>
                                <li class="d-flex justify-content-between align-items-center mb-2">
                                    <p class="tajawal-regular fs-16" style="color: #4B5563;">أقل يوم: </p>
                                    <strong class="tajawal-bold fs-16" style="color: #2563EB;">{{ $weekMinDay }}
                                        ({{ $weekMin }})</strong>
                                </li>
                            </ul>
                        </div>

                        <div class="report__single col">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="tajawal-bold fs-18" style="color: #111827;">تقرير الأمان</h4>
                                <i class="bi bi-shield-check"
                                    style="background: linear-gradient(90deg, #EF4444 0%, #E11D48 100%);"></i>
                            </div>
                            <ul class="p-0">
                                <li class="d-flex justify-content-between align-items-center mb-2">
                                    <p class="tajawal-regular fs-16" style="color: #4B5563;"> تنبيهات عاجلة:</p> <strong
                                        class="tajawal-bold fs-16" style="color: #DC2626;">2</strong>
                                </li>
                                <li class="d-flex justify-content-between align-items-center mb-2">
                                    <p class="tajawal-regular fs-16" style="color: #4B5563;"> تم الحل: </p> <strong
                                        class="tajawal-bold fs-16" style="color: #16A34A;"> 2</strong>
                                </li>
                                <li class="d-flex justify-content-between align-items-center mb-2">
                                    <p class="tajawal-regular fs-16" style="color: #4B5563;"> معدل الأمان: </p> <strong
                                        class="tajawal-bold fs-16" style="color: #16A34A;"> 98.5%</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <h4 class="tajawal-bold fs-18" style="color: #111827;">إحصائيات الزوار الأسبوعية</h4>
                        <div class="weekly__chart mt-4">
                            <canvas id="weeklyVisitorsChart" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('weeklyVisitorsChart').getContext('2d');

    const weeklyVisitorsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($weekLabels), // أسماء الأيام بالعربية
            datasets: [{
                label: 'عدد الزوار',
                data: @json($weekData),
                backgroundColor: 'rgba(34, 197, 94, 0.6)', // لون الأعمدة
                borderColor: 'rgba(5, 150, 105, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                    labels: {
                        font: {
                            family: 'Tajawal, sans-serif',
                            size: 14,
                            weight: 'bold'
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.raw + ' زائر';
                        }
                    },
                    bodyFont: {
                        family: 'Tajawal, sans-serif',
                        size: 14,
                        weight: 'bold'
                    },
                    titleFont: {
                        family: 'Tajawal, sans-serif',
                        size: 14,
                        weight: 'bold'
                    }
                },
                title: {
                    display: true,
                    text: 'إحصائيات الزوار الأسبوعية',
                    font: {
                        family: 'Tajawal, sans-serif',
                        size: 18,
                        weight: 'bold'
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        font: {
                            family: 'Tajawal, sans-serif',
                            size: 14,
                            weight: 'bold'
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: {
                            family: 'Tajawal, sans-serif',
                            size: 14,
                            weight: 'bold'
                        }
                    }
                }
            }
        }
    });
</script>
@endpush


