<section id="v-pills-services" class="tab-pane fade">
    @php
        $serviceCards = [
            [
                'key' => 'hr_operations',
                'title' => 'عمليات الموارد البشرية',
                'subtitle' => 'HR Operations & Personnel',
                'description' => 'الإجازات، الرواتب، السلف، الحوافز، الدوام الإضافي، التأمين الطبي.',
            ],
            [
                'key' => 'talent_acquisition',
                'title' => 'التوظيف والتطوير والتدريب',
                'subtitle' => 'Talent Acquisition and OD',
                'description' => 'طباعة كروت العمل الشخصية, توثيق / تجديد العقود , تقييم الموظف',
            ],
            [
                'key' => 'corporate_services',
                'title' => 'الخدمات الإدارية',
                'subtitle' => 'Corporate Services',
                'description' => 'تذاكر السفر , السكن والصيانة , القرطاسية , تصديقات الغرفة التجارية',
            ],
            [
                'key' => 'it_services',
                'title' => 'الخدمات التقنية',
                'subtitle' => 'IT Services',
                'description' => 'الدورات التدريبية, التوجيه والإرشاد, خطط التطوير الشخصية والمستقبلية',
            ],
        ];
    @endphp

    <div class="container">
        <div class="header-box" style="margin-bottom: 0px">
            <h2 class="display-5 fw-bold text-dark tajawal-bold">
                دليل الخدمات والتواصل المباشر</h2>
            <p class="text-muted fs-5 tajawal-regular ">
                يوفر هذا القسم عرضًا مبسطًا وواضحًا لجميع الخدمات المتاحة، مع شرح مختصر لكيفية الاستفادة منها والشروط
                المتعلقة بكل خدمة. كما يتيح وسيلة تواصل مباشرة عبر بيانات التواصل المعتمدة ليتم الرد على الاستفسارات في
                أقرب وقت ممكن بكل احترافية واهتمام.
            </p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xl-12 mt-4">
                <div class="row g-4">
                    @foreach ($serviceCards as $service)
                        @php
                            $contacts = $serviceContacts[$service['key']] ?? collect();
                        @endphp

                        <div class="col-md-6 col-lg-6 mb-4">
                            <div class="service-card h-100 shadow-sm border-0">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="icon-circle bg-soft-primary ms-3">
                                            <i class="bi bi-wallet2 text-primary"></i>
                                        </div>
                                        <div>
                                            <h6 class="tajawal-bold mb-0">{{ $service['title'] }}</h6>
                                            <small class="text-muted">{{ $service['subtitle'] }}</small>
                                        </div>
                                    </div>

                                    <p class="tajawal-regular fs-13 text-secondary mb-3">
                                        {{ $service['description'] }}
                                    </p>

                                    <hr class="opacity-10">

                                    <div class="contacts-list">
                                        @forelse ($contacts as $contact)
                                            <div class="contact-item d-flex justify-content-between align-items-center mb-2">
                                                <span class="tajawal-bold fs-13">{{ $contact->name }}</span>
                                                <div class="d-flex">
                                                    @if ($contact->phone)
                                                        <a href="tel:{{ $contact->phone }}" class="btn btn-icon-sm">
                                                            <i class="bi bi-phone"></i>
                                                        </a>
                                                    @endif
                                                    @if ($contact->email)
                                                        <a href="mailto:{{ $contact->email }}" class="btn btn-icon-sm">
                                                            <i class="bi bi-envelope"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        @empty
                                            <div class="contact-item d-flex justify-content-between align-items-center mb-2">
                                                <span class="tajawal-regular fs-13 text-muted">لا توجد بيانات تواصل متاحة حالياً</span>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
