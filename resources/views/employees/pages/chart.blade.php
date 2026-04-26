<div id="v-pills-chart" class="tab-pane fade ">
    <div class="container">
        <style>
            .org-structure-section {
                --org-bg: linear-gradient(135deg, #f8f6ed 0%, #eef4ea 55%, #fdfcf8 100%);
                --org-surface: rgba(255, 255, 255, 0.9);
                --org-line: #98aa8f;
                --org-primary: #244b2f;
                --org-accent: #c7a76a;
                --org-shadow: 0 20px 50px rgba(36, 75, 47, 0.12);
                direction: rtl;
                padding: 2.5rem 1.25rem;
                border-radius: 32px;
                background: var(--org-bg);
                border: 1px solid rgba(36, 75, 47, 0.08);
                box-shadow: var(--org-shadow);
                overflow: hidden;
                position: relative;
            }

            .org-structure-section::before,
            .org-structure-section::after {
                content: "";
                position: absolute;
                border-radius: 50%;
                filter: blur(10px);
                opacity: 0.45;
                pointer-events: none;
            }

            .org-structure-section::before {
                width: 220px;
                height: 220px;
                background: rgba(199, 167, 106, 0.16);
                top: -80px;
                inset-inline-start: -70px;
            }

            .org-structure-section::after {
                width: 260px;
                height: 260px;
                background: rgba(68, 122, 76, 0.12);
                bottom: -120px;
                inset-inline-end: -80px;
            }

            .org-section-header {
                position: relative;
                z-index: 1;
                text-align: center;
                max-width: 760px;
                margin: 0 auto 2.5rem;
            }

            .org-section-badge {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.5rem 1rem;
                background: rgba(36, 75, 47, 0.08);
                color: var(--org-primary);
                border-radius: 999px;
                font-size: 0.92rem;
                margin-bottom: 1rem;
            }

            .org-section-title {
                color: var(--org-primary);
                font-size: clamp(1.8rem, 2.2vw, 2.8rem);
                margin-bottom: 0.85rem;
            }

            .org-section-text {
                color: #5d695f;
                font-size: 1rem;
                line-height: 1.9;
                margin: 0;
            }

            .org-tree {
                position: relative;
                z-index: 1;
            }

            .org-level {
                display: flex;
                justify-content: center;
                gap: 1.4rem;
                flex-wrap: wrap;
                position: relative;
                margin-bottom: 1.75rem;
            }

            .org-card {
                position: relative;
                width: min(100%, 220px);
                min-height: 130px;
                padding: 1.2rem 1rem 1rem;
                border-radius: 28px 28px 22px 22px;
                background: linear-gradient(180deg, rgba(255, 255, 255, 0.98) 0%, rgba(244, 247, 241, 0.92) 100%);
                border: 1px solid rgba(36, 75, 47, 0.12);
                box-shadow: 0 16px 30px rgba(57, 74, 58, 0.14);
                text-align: center;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                overflow: hidden;
            }

            .org-card:hover {
                transform: translateY(-6px);
                box-shadow: 0 22px 40px rgba(57, 74, 58, 0.18);
            }

            .org-card::before {
                content: "";
                position: absolute;
                top: 0;
                inset-inline: 0;
                height: 14px;
                background: linear-gradient(90deg, rgba(36, 75, 47, 0.1), rgba(199, 167, 106, 0.3), rgba(36, 75, 47, 0.1));
            }

            .org-dots {
                display: flex;
                justify-content: center;
                gap: 0.35rem;
                margin-bottom: 0.85rem;
            }

            .org-dots span {
                width: 7px;
                height: 7px;
                border-radius: 50%;
                background: var(--org-primary);
                opacity: 0.95;
            }

            .org-card-title {
                color: #1f2c22;
                font-size: 12px;
                line-height: 1.8;
                margin-bottom: 0.35rem;
            }

            .org-card-name {
                color: var(--org-primary);
                font-size: 1.02rem;
                line-height: 1.8;
                margin-bottom: 0.2rem;
            }

            .org-card-code {
                display: inline-block;
                padding: 0.22rem 0.7rem;
                border-radius: 999px;
                background: rgba(36, 75, 47, 0.08);
                color: #537159;
                font-size: 0.85rem;
                letter-spacing: 0.08em;
            }

            .org-card-highlight {
                background: linear-gradient(180deg, rgba(244, 249, 242, 0.98) 0%, rgba(229, 238, 230, 0.92) 100%);
                border-color: rgba(36, 75, 47, 0.18);
            }

            .org-card-lead {
                width: min(100%, 240px);
                min-height: 145px;
            }

            .org-connector {
                position: relative;
                width: 2px;
                height: 34px;
                background: linear-gradient(180deg, rgba(152, 170, 143, 0.1), var(--org-line), rgba(152, 170, 143, 0.1));
                margin: -0.35rem auto 1.15rem;
            }

            .org-connector-wide {
                position: relative;
                max-width: 980px;
                height: 44px;
                margin: -0.7rem auto 1.25rem;
            }

            .org-connector-wide::before,
            .org-connector-wide::after {
                content: "";
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
            }

            .org-connector-wide::before {
                top: 0;
                width: 2px;
                height: 22px;
                background: var(--org-line);
            }

            .org-connector-wide::after {
                top: 22px;
                width: calc(100% - 120px);
                height: 2px;
                background: var(--org-line);
                border-radius: 999px;
            }

            .org-grid {
                display: grid;
                grid-template-columns: repeat(7, minmax(0, 1fr));
                gap: 1.15rem;
                margin-bottom: 1.75rem;
                position: relative;
            }

            .org-grid .org-card {
                width: 100%;
            }

            .org-sub-grid {
                display: grid;
                grid-template-columns: repeat(6, minmax(0, 1fr));
                gap: 1.15rem;
                position: relative;
            }

            .org-sub-grid .org-card {
                width: 100%;
            }

            .org-bottom-link {
                position: relative;
                max-width: 820px;
                height: 42px;
                margin: -0.4rem auto 1.2rem;
            }

            .org-bottom-link::before,
            .org-bottom-link::after {
                content: "";
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
            }

            .org-bottom-link::before {
                top: 0;
                width: 2px;
                height: 18px;
                background: var(--org-line);
            }

            .org-bottom-link::after {
                top: 18px;
                width: calc(100% - 90px);
                height: 2px;
                background: var(--org-line);
                border-radius: 999px;
            }

            @media (max-width: 1199.98px) {
                .org-grid {
                    grid-template-columns: repeat(3, minmax(0, 1fr));
                }

                .org-sub-grid {
                    grid-template-columns: repeat(3, minmax(0, 1fr));
                }
            }

            @media (max-width: 767.98px) {
                .org-structure-section {
                    padding: 2rem 1rem;
                    border-radius: 24px;
                }

                .org-level,
                .org-grid,
                .org-sub-grid {
                    display: grid;
                    grid-template-columns: 1fr;
                    gap: 1rem;
                }

                .org-card,
                .org-card-lead {
                    width: 100%;
                }

                .org-connector-wide,
                .org-bottom-link {
                    display: none;
                }

                .org-connector {
                    height: 26px;
                    margin-bottom: 1rem;
                }
            }
        </style>
{{--
        <div class="header-box" style="margin-bottom: 30px">
            <h2 class="display-5 fw-bold text-dark tajawal-bold">الهيكل التنظيمي</h2>
            <p class="text-muted fs-5 tajawal-regular ">
                يعرض هذا القسم البنية الإدارية للمؤسسة ويوضح توزيع الإدارات والمسؤوليات بين الأقسام المختلفة، بما يضمن
                وضوح الأدوار وسلاسة سير العمل وتحقيق التكامل بين جميع الفرق.
            </p>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <img src="{{ asset('assets/images/chart.png') }}" alt="" style="width: -webkit-fill-available;">
            </div>

        </div>  --}}

        <section class="org-structure-section">
            <div class="org-section-header">
                <span class="org-section-badge tajawal-bold">الهيكل الإداري الحديث</span>
                <h3 class="org-section-title tajawal-bold">استعراض بصري لهيكل الشركة</h3>
                <p class="org-section-text tajawal-regular">
                    تم تصميم هذا القسم بطريقة حديثة لعرض التسلسل الإداري بشكل واضح وسلس، مع إبراز الجهات القيادية
                    والتنفيذية وربط الإدارات الرئيسية بالإدارات المساندة ضمن تجربة قراءة مريحة على جميع الأجهزة.
                </p>
            </div>

            <div class="org-tree">
                <div class="org-level">
                    <article class="org-card org-card-lead">
                        <div class="org-dots"><span></span><span></span><span></span><span></span></div>
                        <h4 class="org-card-title tajawal-bold">مجلس الإدارة</h4>
                    </article>
                </div>

                <div class="org-connector"></div>

                <div class="org-level">
                    <article class="org-card">
                        <div class="org-dots"><span></span><span></span><span></span><span></span></div>
                        <h4 class="org-card-title tajawal-bold">أمانة سر مجلس الإدارة</h4>
                    </article>

                    <article class="org-card">
                        <div class="org-dots"><span></span><span></span><span></span><span></span></div>
                        <h4 class="org-card-title tajawal-bold">لجنة المراجعة</h4>
                    </article>
                </div>

                <div class="org-connector"></div>

                <div class="org-level">
                     <article class="org-card org-card-highlight org-card-lead">
                        <div class="org-dots"><span></span><span></span><span></span><span></span></div>
                        <div class="org-card-name tajawal-bold">مازن باداوود</div>
                        <p class="org-card-title tajawal-regular">الرئيس التنفيذي</p>
                    </article>

                    <article class="org-card">
                        <div class="org-dots"><span></span><span></span><span></span><span></span></div>
                        <div class="org-card-name tajawal-bold">إياد المقطري</div>
                        <p class="org-card-title tajawal-regular">مدير إدارة المراجعة الداخلية</p>
                        <span class="org-card-code tajawal-bold">ML-C</span>
                    </article>


                </div>

                <div class="org-connector-wide"></div>

                <div class="org-grid">
                    <article class="org-card">
                        <div class="org-dots"><span></span><span></span><span></span><span></span></div>
                        <div class="org-card-name tajawal-bold">حمزة الخميس  </div>
                        <p class="org-card-title tajawal-regular">المدير التنفيذي للقطاع التجاري</p>
                        <span class="org-card-code tajawal-bold">EL-A</span>
                    </article>

                    <article class="org-card">
                        <div class="org-dots"><span></span><span></span><span></span><span></span></div>
                        <div class="org-card-name tajawal-bold">زياد الجعافرة </div>
                        <p class="org-card-title tajawal-regular">المدير التنفيذي للإدارة المالية</p>
                        <span class="org-card-code tajawal-bold">EL-A</span>
                    </article>

                    <article class="org-card">
                        <div class="org-dots"><span></span><span></span><span></span><span></span></div>
                        <div class="org-card-name tajawal-bold"> شاغر </div>

                        <p class="org-card-title tajawal-regular">مدير إدارة التطوير والمشاريع</p>
                        <span class="org-card-code tajawal-bold">ML-C</span>
                    </article>

                    <article class="org-card org-card-highlight">
                        <div class="org-dots"><span></span><span></span><span></span><span></span></div>
                        <div class="org-card-name tajawal-bold">يحي مباركي </div>
                        <p class="org-card-title tajawal-regular">المدير العام للمزرعة</p>
                        <span class="org-card-code tajawal-bold">EL-B</span>
                    </article>

                    <article class="org-card">
                        <div class="org-dots"><span></span><span></span><span></span><span></span></div>
                        <div class="org-card-name tajawal-bold">أحمد الصلوي</div>
                        <p class="org-card-title tajawal-regular">المدير التنفيذي لإدارة الموارد البشرية والشؤون العامة</p>
                        <span class="org-card-code tajawal-bold">EL-A</span>
                    </article>

                    <article class="org-card">
                        <div class="org-dots"><span></span><span></span><span></span><span></span></div>
                        <div class="org-card-name tajawal-bold">محمود تركستاني</div>
                        <p class="org-card-title tajawal-regular">مدير أول إدارة تقنية المعلومات</p>
                        <span class="org-card-code tajawal-bold">ML-D</span>
                    </article>

                    <article class="org-card">
                        <div class="org-dots"><span></span><span></span><span></span><span></span></div>
                        <div class="org-card-name tajawal-bold">أحمد راضي  </div>
                        <p class="org-card-title tajawal-regular">مدير إدارة المشتريات  </p>
                        <span class="org-card-code tajawal-bold">ML-C</span>
                    </article>
                </div>

                <div class="org-bottom-link"></div>

                <div class="org-sub-grid">
                    <article class="org-card">
                        <div class="org-dots"><span></span><span></span><span></span><span></span></div>
                        <div class="org-card-name tajawal-bold">فهد عياش</div>
                        <p class="org-card-title tajawal-regular">مدير أول تخطيط المبيعات والعمليات</p>
                        <span class="org-card-code tajawal-bold">ML-B</span>
                    </article>

                    <article class="org-card">
                        <div class="org-dots"><span></span><span></span><span></span><span></span></div>
                        <div class="org-card-name tajawal-bold">سرحان السبيعي</div>
                        <p class="org-card-title tajawal-regular">المدير التنفيذي للقطاع الزراعي</p>
                        <span class="org-card-code tajawal-bold">EL-A</span>
                    </article>

                    <article class="org-card">
                        <div class="org-dots"><span></span><span></span><span></span><span></span></div>
                        <div class="org-card-name tajawal-bold">عبدالمحسن الجار الله</div>
                        <p class="org-card-title tajawal-regular">المدير التنفيذي للقطاع الصناعي</p>
                        <span class="org-card-code tajawal-bold">EL-A</span>
                    </article>

                    <article class="org-card">
                        <div class="org-dots"><span></span><span></span><span></span><span></span></div>
                        <div class="org-card-name tajawal-bold">أحمد سليمان</div>
                        <p class="org-card-title tajawal-regular">مدير إدارة الجودة الشاملة</p>
                        <span class="org-card-code tajawal-bold">ML-D</span>
                    </article>

                    <article class="org-card">
                        <div class="org-dots"><span></span><span></span><span></span><span></span></div>
                        <div class="org-card-name tajawal-bold"> رائد البستنجي </div>
                        <p class="org-card-title tajawal-regular">مدير إدارة الصيانة الشاملة</p>
                        <span class="org-card-code tajawal-bold">ML-D</span>
                    </article>

                    <article class="org-card">
                        <div class="org-dots"><span></span><span></span><span></span><span></span></div>
                        <div class="org-card-name tajawal-bold">شاغر</div>
                        <p class="org-card-title tajawal-regular">مدير إدارة الإمداد الشاملة</p>
                        <span class="org-card-code tajawal-bold">ML-C</span>
                    </article>
                </div>
            </div>
        </section>
    </div>
</div>
