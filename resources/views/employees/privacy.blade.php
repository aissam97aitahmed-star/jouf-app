@extends('employees.layout')

@push('css')
    <style>
        .policy-view-trigger {
            height: fit-content;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 10px 20px;
            border: 0;
            background: linear-gradient(135deg, #0d7a3b 0%, #00471f 100%);
            box-shadow: 0 12px 24px rgba(0, 71, 31, 0.18);
            transition: transform 0.25s ease, box-shadow 0.25s ease, opacity 0.25s ease;
            cursor: pointer;
        }

        .policy-view-trigger:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 30px rgba(0, 71, 31, 0.24);
            opacity: 0.96;
        }

        .policy-title-trigger {
            display: inline-block;
            color: inherit;
            text-decoration: none;
            cursor: pointer;
            transition: color 0.25s ease, opacity 0.25s ease;
        }

        .policy-title-trigger:hover {
            color: #0d7a3b;
            opacity: 0.95;
        }

        .policy-pdf-modal .modal-dialog {
            max-width: min(1180px, calc(100vw - 2rem));
        }

        .policy-pdf-modal .modal-content {
            border: 0;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 30px 80px rgba(10, 31, 18, 0.28);
            background: #f7faf7;
        }

        .policy-pdf-modal .modal-header {
            border: 0;
            padding: 1.25rem 1.5rem 0.75rem;
            background:
                radial-gradient(circle at top right, rgba(193, 166, 107, 0.25), transparent 28%),
                linear-gradient(135deg, #f8fbf8 0%, #eef5ef 100%);
        }

        .policy-pdf-modal .modal-title-wrap {
            min-width: 0;
        }

        .policy-pdf-modal .modal-title {
            color: #0d3d1f;
            margin-bottom: 0.2rem;
        }

        .policy-pdf-modal .modal-subtitle {
            color: #66756a;
            margin: 0;
        }

        .policy-pdf-modal .modal-body {
            padding: 0 1.25rem 1.25rem;
        }

        .policy-pdf-frame-wrap {
            position: relative;
            min-height: 72vh;
            border-radius: 22px;
            background: linear-gradient(180deg, #f1f6f1 0%, #e8efe8 100%);
            border: 1px solid rgba(0, 71, 31, 0.08);
            overflow: hidden;
        }

        .policy-pdf-frame {
            width: 100%;
            height: 72vh;
            border: 0;
            background: #fff;
        }

        .policy-pdf-loader {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 0.9rem;
            background: rgba(245, 249, 245, 0.92);
            color: #0d3d1f;
            transition: opacity 0.25s ease, visibility 0.25s ease;
            z-index: 2;
        }

        .policy-pdf-loader.is-hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        .policy-pdf-spinner {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            border: 4px solid rgba(0, 71, 31, 0.12);
            border-top-color: #0d7a3b;
            animation: policySpin 0.8s linear infinite;
        }

        .policy-pdf-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .policy-modal-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.65rem 1rem;
            border-radius: 999px;
            text-decoration: none;
        }

        .policy-progress-card {
            margin-top: 1rem;
            padding: 1rem 1rem 0.9rem;
            border-radius: 20px;
            background: linear-gradient(180deg, rgba(247, 251, 247, 0.98) 0%, rgba(238, 245, 239, 0.92) 100%);
            border: 1px solid rgba(0, 71, 31, 0.08);
        }

        .policy-progress-label {
            color: #335240;
            margin: 0;
        }

        .policy-progress-percent {
            color: #0d5e2b;
        }

        .policy-progress {
            height: 12px;
            padding: 2px;
            border-radius: 999px;
            background: linear-gradient(180deg, #dce8de 0%, #edf4ee 100%);
            box-shadow: inset 0 1px 4px rgba(12, 45, 24, 0.08);
            overflow: hidden;
        }

        .policy-progress-bar {
            position: relative;
            height: 100%;
            border-radius: inherit;
            background: linear-gradient(90deg, #0c6a34 0%, #1b964f 55%, #51c67b 100%);
            box-shadow: 0 8px 18px rgba(13, 122, 59, 0.28);
        }

        .policy-progress-bar::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.32), transparent 45%);
        }

        .policy-progress-legend {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
            margin-top: 0.7rem;
        }

        .policy-progress-legend-item {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            color: #647468;
        }

        .policy-progress-legend-swatch {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
        }

        .policy-progress-legend-swatch.is-viewed {
            background: linear-gradient(90deg, #0c6a34 0%, #1b964f 55%, #51c67b 100%);
            box-shadow: 0 4px 10px rgba(13, 122, 59, 0.22);
        }

        .policy-progress-legend-swatch.is-remaining {
            background: #dce8de;
        }

        .policy-progress-meta {
            color: #647468;
            margin: 0.65rem 0 0;
        }

        .policy-progress-meta strong {
            color: #0d3d1f;
        }

        .policy-confirm-modal .modal-content {
            border: 0;
            border-radius: 26px;
            overflow: hidden;
            box-shadow: 0 28px 70px rgba(10, 31, 18, 0.24);
        }

        .policy-confirm-modal .modal-header {
            border: 0;
            padding: 1.5rem 1.5rem 0.5rem;
        }

        .policy-confirm-modal .modal-body {
            padding: 0 1.5rem 1.25rem;
        }

        .policy-confirm-icon {
            width: 68px;
            height: 68px;
            border-radius: 22px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(13, 122, 59, 0.14) 0%, rgba(0, 71, 31, 0.08) 100%);
            color: #0d7a3b;
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .policy-confirm-text {
            color: #647468;
            line-height: 1.9;
            margin: 0;
        }

        .policy-confirm-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 0.75rem;
            padding: 0 1.5rem 1.5rem;
            flex-wrap: wrap;
        }

        @keyframes policySpin {
            to {
                transform: rotate(360deg);
            }
        }

        @media (max-width: 767.98px) {
            .policy-view-trigger {
                width: 100%;
                justify-content: center;
                margin-top: 1rem;
            }

            .policy__single {
                flex-direction: column;
            }

            .policy-pdf-modal .modal-header {
                padding: 1rem 1rem 0.5rem;
            }

            .policy-pdf-modal .modal-body {
                padding: 0 0.85rem 0.85rem;
            }

            .policy-pdf-frame-wrap,
            .policy-pdf-frame {
                min-height: 65vh;
                height: 65vh;
            }
        }
    </style>
@endpush

@section('content')
    <section class="policy">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-5">
                <h4 class="tajawal-bold">السياسات والإرشادات</h4>
                <span class="badge rounded-pill text-bg-success tajawal-medium fs-14 disp">{{ $policies->count() ?? 0 }}
                    سياسة متاحة</span>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-5">
                        <h5 class="tajawal-bold fs-18 mb-3"><i class="bi bi-archive" style="color: #00471F;;"></i>
                            &nbsp; فئات السياسات</h5>
                        <ul class="cats">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="#" class="tajawal-medium fs-14">
                                        {{ $category->name }}
                                    </a>
                                    <span>{{ $category->policies_count ?? 0 }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h5 class="tajawal-bold fs-18 mb-2"><i class="bi bi-filter-circle" style="color: #00471F;;"></i>
                            &nbsp; تصفية</h5>
                        <form action="">
                            <div>
                                <label for="" class="tajawal-medium fs-14 mb-2">حسب الإدارة</label>
                                <div class="select-wrapper position-relative">
                                    <select id="categoryFilter" class="form-select form-select-lg mb-3"
                                        aria-label="Large select example">
                                        <option value="all" class="tajawal-regular fs-14">جميع الإدارات</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->name }}" class="tajawal-regular fs-14">
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="bi bi-caret-down-fill select-icon"></i>
                                </div>
                            </div>
                            <div>
                                <label for="" class="tajawal-medium fs-14 mb-2">حسب التاريخ</label>
                                <div class="select-wrapper position-relative">
                                    <select id="dateFilter" class="form-select form-select-lg mb-3"
                                        aria-label="Large select example">
                                        <option value="all">كل التواريخ</option>
                                        <option value="today">اليوم</option>
                                        <option value="7">آخر 7 أيام</option>
                                        <option value="30">آخر 30 يوم</option>
                                    </select>
                                    <i class="bi bi-caret-down-fill select-icon"></i>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-md-8">
                    @foreach ($policies as $policy)
                        <div class="box mb-5 policy-item" data-category="{{ $policy->category->name }}"
                            data-date="{{ $policy->updated_at->format('Y-m-d') }}"
                            data-total-employees="{{ $employeesCount }}"
                            data-viewed="{{ $policy->viewers_count }}">
                            <div class="d-flex policy__single">
                                <span class="key tajawal-bold fs-18"><i class="bi bi-shield-check d-flex fs-20"></i></span>
                                <div style="flex: 1;">
                                    <h4 class="tajawal-bold fs-20 mb-2">
                                        <a href="#"
                                            class="policy-title-trigger js-policy-view"
                                            data-policy-url="{{ route('employee.policies.view', $policy) }}"
                                            data-policy-download-url="{{ route('employee.policies.download', $policy) }}"
                                            data-policy-ack-url="{{ route('employee.policies.acknowledge-view', $policy) }}"
                                            data-policy-viewed="{{ (int) $policy->viewed_by_user }}"
                                            data-policy-title="{{ $policy->title }}">
                                            {{ $policy->title }}
                                        </a>
                                    </h4>
                                    <p class="tajawal-regular fs-14 mb-2">{{ $policy->description }}</p>
                                    <ul class="d-flex details mb-2 p-0 cats">
                                        <li class="tajawal-regular fs-14"><i class="bi bi-folder"></i>&nbsp;
                                            {{ $policy->category->name }}
                                        </li>
                                        <li class="tajawal-regular fs-14"><i class="bi bi-calendar2-minus"></i>&nbsp; آخر
                                            تحديث:
                                            {{ \Carbon\Carbon::parse($policy->updated_at)->locale('ar')->diffForHumans() }}
                                        </li>
                                        {{-- <li class="tajawal-regular fs-14"><i class="bi bi-download"></i>&nbsp;
                                            {{ $policy->downloads }} تنزيل
                                        </li> --}}
                                    </ul>
                                </div>
                                <button type="button"
                                    class="badge rounded-pill text-bg-success tajawal-medium fs-12 disp policy-view-trigger js-policy-view"
                                    data-policy-url="{{ route('employee.policies.view', $policy) }}"
                                    data-policy-download-url="{{ route('employee.policies.download', $policy) }}"
                                    data-policy-ack-url="{{ route('employee.policies.acknowledge-view', $policy) }}"
                                    data-policy-viewed="{{ (int) $policy->viewed_by_user }}"
                                    data-policy-title="{{ $policy->title }}">
                                    <i class="bi bi-eye"></i>
                                    عرض
                                </button>
                            </div>
                            <div class="actions d-flex">
                                <div style="flex: 1;">
                                    {{-- <a href="{{ route('employee.policies.view', $policy) }}" target="_blank"
                                        class="btn btn-primary tajawal-regular fs-14" type="submit"><i
                                            class="bi bi-eye"></i>&nbsp; <span>عرض</span> </a> --}}
                                    {{-- <a href="{{ route('employee.policies.download', $policy) }}"
                                        class="btn btn-primary tajawal-regular fs-14" type="submit"><i
                                            class="bi bi-download"></i>&nbsp; تنزيل PDF </a>
                                    <a href="" class="btn btn-primary tajawal-regular fs-14" type="submit"><i
                                            class="bi bi-share"></i>&nbsp; مشاركة </a> --}}
                                </div>
                                {{-- <a href="" class="btn btn-primary tajawal-regular fs-14 last" type="submit"><i
                                        class="bi bi-pencil"></i>&nbsp; تعديل </a> --}}
                            </div>

                            @php
                                $totalEmployees = $employeesCount;
                                $viewed = $policy->viewers_count;
                                $rawPercent = $totalEmployees > 0 ? ($viewed / $totalEmployees) * 100 : 0;
                                $percent = round($rawPercent, 1);
                                $percentLabel =
                                    $viewed > 0 && $rawPercent < 1 ? number_format($rawPercent, 2) . '%' : $percent . '%';
                                $progressWidth = $viewed > 0 ? max($rawPercent, 1.2) : 0;
                            @endphp

                            <div class="progress__rate policy-progress-card">
                                <div class="d-flex justify-content-between">
                                    <p class="tajawal-medium fs-14 policy-progress-label">معدل الاطلاع</p>
                                    <strong class="percent tajawal-bold fs-14 policy-progress-percent">{{ $percentLabel }}</strong>
                                </div>
                                <div class="progress policy-progress" role="progressbar" aria-label="معدل الاطلاع على السياسة"
                                    aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar policy-progress-bar" style="width: {{ min($progressWidth, 100) }}%;">
                                    </div>
                                </div>
                                <div class="policy-progress-legend">
                                    <span class="policy-progress-legend-item tajawal-medium fs-12">
                                        <span class="policy-progress-legend-swatch is-viewed"></span>
                                        تمت القراءة
                                    </span>
                                    <span class="policy-progress-legend-item tajawal-medium fs-12">
                                        <span class="policy-progress-legend-swatch is-remaining"></span>
                                        لم يطّلعوا بعد
                                    </span>
                                </div>
                                <p class="tajawal-regular fs-12 policy-progress-meta">
                                    <strong>{{ $viewed }}</strong> من أصل <strong>{{ $totalEmployees }}</strong> موظف
                                    اطلع على هذه السياسة
                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <div class="modal fade policy-pdf-modal" id="policyPdfModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex justify-content-between align-items-start gap-3 w-100 flex-wrap">
                        <div class="modal-title-wrap">
                            <h5 class="modal-title tajawal-bold" id="policyPdfModalTitle">عرض السياسة</h5>
                            <p class="modal-subtitle tajawal-regular fs-14">يمكنك استعراض ملف PDF مباشرة داخل الصفحة.</p>
                        </div>
                        <div class="policy-pdf-actions">
                            <a href="#" target="_blank" class="btn btn-outline-success tajawal-medium policy-modal-btn"
                                id="policyPdfOpenNewTab">
                                <i class="bi bi-box-arrow-up-left"></i>
                                فتح في تبويب
                            </a>
                            <a href="#" class="btn btn-success tajawal-medium policy-modal-btn" id="policyPdfDownload">
                                <i class="bi bi-download"></i>
                                تنزيل
                            </a>
                            <button type="button" class="btn-close ms-0" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="policy-pdf-frame-wrap">
                        <div class="policy-pdf-loader" id="policyPdfLoader">
                            <div class="policy-pdf-spinner"></div>
                            <div class="text-center">
                                <div class="tajawal-bold fs-16">جاري تحميل الملف</div>
                                <div class="tajawal-regular fs-13 text-muted">يرجى الانتظار قليلاً</div>
                            </div>
                        </div>
                        <iframe id="policyPdfFrame" class="policy-pdf-frame" src="" title="عرض السياسة"
                            loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade policy-confirm-modal" id="policyConfirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="policy-confirm-icon">
                        <i class="bi bi-patch-check"></i>
                    </div>
                    <h5 class="tajawal-bold mb-3" id="policyConfirmTitle">تأكيد مشاهدة السياسة</h5>
                    <p class="tajawal-regular fs-14 policy-confirm-text">
                        هل توافق على تسجيل أنك اطلعت على هذه السياسة بعد إغلاق الملف؟ سيتم احتساب الاطلاع بعد الموافقة.
                    </p>
                </div>
                <div class="policy-confirm-actions">
                    <button type="button" class="btn btn-light tajawal-medium px-4" data-bs-dismiss="modal">
                        لاحقاً
                    </button>
                    <button type="button" class="btn btn-success tajawal-medium px-4" id="policyConfirmAccept">
                        نعم، أوافق
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryFilter = document.getElementById('categoryFilter');
            const dateFilter = document.getElementById('dateFilter');
            const policies = document.querySelectorAll('.policy-item');
            const policyViewButtons = document.querySelectorAll('.js-policy-view');
            const policyPdfModalElement = document.getElementById('policyPdfModal');
            const policyPdfFrame = document.getElementById('policyPdfFrame');
            const policyPdfLoader = document.getElementById('policyPdfLoader');
            const policyPdfModalTitle = document.getElementById('policyPdfModalTitle');
            const policyPdfOpenNewTab = document.getElementById('policyPdfOpenNewTab');
            const policyPdfDownload = document.getElementById('policyPdfDownload');
            const policyConfirmModalElement = document.getElementById('policyConfirmModal');
            const policyConfirmTitle = document.getElementById('policyConfirmTitle');
            const policyConfirmAccept = document.getElementById('policyConfirmAccept');
            const policyPdfModal = new bootstrap.Modal(policyPdfModalElement);
            const policyConfirmModal = new bootstrap.Modal(policyConfirmModalElement);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            let activePolicy = null;
            let shouldPromptForAcknowledgement = false;

            function filterPolicies() {
                const selectedCategory = categoryFilter.value;
                const selectedDate = dateFilter.value;

                const today = new Date();
                today.setHours(0, 0, 0, 0);

                policies.forEach(policy => {
                    const policyCategory = policy.dataset.category;
                    const policyDate = new Date(policy.dataset.date);

                    let categoryMatch =
                        selectedCategory === 'all' ||
                        policyCategory === selectedCategory;

                    let dateMatch = true;

                    if (selectedDate !== 'all') {
                        const diffTime = today - policyDate;
                        const diffDays = diffTime / (1000 * 60 * 60 * 24);

                        if (selectedDate === 'today') {
                            dateMatch = diffDays === 0;
                        } else {
                            dateMatch = diffDays <= parseInt(selectedDate);
                        }
                    }

                    if (categoryMatch && dateMatch) {
                        policy.style.display = 'block';
                    } else {
                        policy.style.display = 'none';
                    }
                });
            }

            categoryFilter.addEventListener('change', filterPolicies);
            dateFilter.addEventListener('change', filterPolicies);

            function showPdfLoader() {
                policyPdfLoader.classList.remove('is-hidden');
            }

            function hidePdfLoader() {
                policyPdfLoader.classList.add('is-hidden');
            }

            function updatePolicyCardAfterAcknowledge(triggerElement) {
                const policyItem = triggerElement.closest('.policy-item');

                if (!policyItem) {
                    return;
                }

                const viewedStrong = policyItem.querySelector('.policy-progress-meta strong');
                const percentElement = policyItem.querySelector('.policy-progress-percent');
                const progressElement = policyItem.querySelector('.policy-progress');
                const progressBar = policyItem.querySelector('.policy-progress-bar');
                const totalEmployees = Number((policyItem.dataset.totalEmployees || '0'));
                let viewed = Number((policyItem.dataset.viewed || '0'));

                if (triggerElement.dataset.policyViewed === '1') {
                    return;
                }

                viewed += 1;
                policyItem.dataset.viewed = viewed;
                triggerElement.dataset.policyViewed = '1';

                policyItem.querySelectorAll('.js-policy-view').forEach(element => {
                    element.dataset.policyViewed = '1';
                });

                const rawPercent = totalEmployees > 0 ? (viewed / totalEmployees) * 100 : 0;
                const roundedPercent = Math.round(rawPercent * 10) / 10;
                const percentLabel = viewed > 0 && rawPercent < 1 ? `${rawPercent.toFixed(2)}%` : `${roundedPercent}%`;
                const progressWidth = viewed > 0 ? Math.max(rawPercent, 1.2) : 0;

                if (percentElement) {
                    percentElement.textContent = percentLabel;
                }

                if (progressElement) {
                    progressElement.setAttribute('aria-valuenow', roundedPercent);
                }

                if (progressBar) {
                    progressBar.style.width = `${Math.min(progressWidth, 100)}%`;
                }

                const metaText = policyItem.querySelector('.policy-progress-meta');
                if (metaText) {
                    metaText.innerHTML =
                        `<strong>${viewed}</strong> من أصل <strong>${totalEmployees}</strong> موظف اطلع على هذه السياسة`;
                }
            }

            policyViewButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    if (this.tagName.toLowerCase() === 'a') {
                        event.preventDefault();
                    }

                    const pdfUrl = this.dataset.policyUrl;
                    const pdfDownloadUrl = this.dataset.policyDownloadUrl;
                    const policyTitle = this.dataset.policyTitle || 'عرض السياسة';
                    const policyViewed = this.dataset.policyViewed === '1';

                    activePolicy = this;
                    shouldPromptForAcknowledgement = !policyViewed;
                    policyPdfModalTitle.textContent = policyTitle;
                    policyPdfOpenNewTab.href = pdfUrl;
                    policyPdfDownload.href = pdfDownloadUrl;

                    showPdfLoader();
                    policyPdfFrame.src = pdfUrl;
                    policyPdfModal.show();
                });
            });

            policyPdfFrame.addEventListener('load', function() {
                hidePdfLoader();
            });

            policyPdfModalElement.addEventListener('hidden.bs.modal', function() {
                policyPdfFrame.src = '';
                showPdfLoader();

                if (activePolicy && shouldPromptForAcknowledgement) {
                    policyConfirmTitle.textContent = `تأكيد مشاهدة: ${activePolicy.dataset.policyTitle}`;
                    policyConfirmModal.show();
                }
            });

            policyConfirmAccept.addEventListener('click', async function() {
                if (!activePolicy) {
                    return;
                }

                this.disabled = true;

                try {
                    const response = await fetch(activePolicy.dataset.policyAckUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({})
                    });

                    if (!response.ok) {
                        throw new Error('Failed to acknowledge policy view');
                    }

                    updatePolicyCardAfterAcknowledge(activePolicy);
                    policyConfirmModal.hide();
                } catch (error) {
                    console.error(error);
                    if (typeof notyf !== 'undefined') {
                        notyf.error('تعذر تسجيل الاطلاع حالياً، يرجى المحاولة مرة أخرى.');
                    }
                } finally {
                    this.disabled = false;
                    shouldPromptForAcknowledgement = false;
                    activePolicy = null;
                }
            });

            policyConfirmModalElement.addEventListener('hidden.bs.modal', function() {
                shouldPromptForAcknowledgement = false;
                activePolicy = null;
                policyConfirmTitle.textContent = 'تأكيد مشاهدة السياسة';
            });
        });
    </script>
@endpush
