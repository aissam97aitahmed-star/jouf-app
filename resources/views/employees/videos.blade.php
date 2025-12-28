@extends('employees.layout')

@section('content')
    <section class="vedios__learning">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-5 v__header">
                <h4 class="tajawal-bold">الفيديوهات التعليمية</h4>
                <div class="d-flex align-items-center gap-3 actions">
                    {{-- <button class="btn btn-primary tajawal-medium active" type="submit">
                        <i class="bi bi-list-check"></i> &nbsp; الكل
                    </button>
                    <button class="btn btn-primary tajawal-medium " type="submit">
                       <i class="bi bi-person-lines-fill"></i>&nbsp; إداريين
                    </button>
                    <button class="btn btn-primary tajawal-medium " type="submit">
                        <i class="bi bi-person-lines-fill"></i> &nbsp; عمال
                    </button> --}}
                    <div class="">
                        <select class="form-select form-select-lg" aria-label="Large select example" id="categories">
                            <option value="value1" class="tajawal-regular fs-14">جميع الفيديوهات</option>
                            <option value="عام">عام</option>
                            <option value="عن الشركة">عن الشركة</option>
                            <option value="الشوون الادارية">الشوون الادارية</option>
                            <option value="الشؤون الادارية القانونية ">الشؤون الادارية القانونية </option>
                            <option value="تقنية المعلومات والبرامج ">تقنية المعلومات والبرامج </option>
                            <option value="الجودة">الجودة</option>
                            <option value="الامن والسلامة">الامن والسلامة</option>
                            <option value="المجمع الصناعي ">المجمع الصناعي </option>
                            <option value="الإدارة المالية">الإدارة المالية</option>
                        </select>
                    </div>

                    <button class="btn btn-primary tajawal-regular fs-14 count" type="submit">
                        {{ $videos->count() }} فيديو
                    </button>
                </div>
            </div>
            <div class="vedios__content">
                <div class="row pb-5">
                    @forelse ($videos as $video)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                @if ($video->is_required)
                                    <span class="badge-live tajawal-medium">إجباري</span>
                                @else
                                    <span class="badge-live tajawal-medium">اختياري</span>
                                @endif

                                <a href="javascript:void(0)" class="card-overlay-link"
                                    style="display:block; position:relative;" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-id="{{ $video->id }}"
                                    data-title="{{ $video->title }}" data-description="{{ $video->description }}"
                                    data-category="{{ $video->category }}" data-target-group="{{ $video->target_group }}"
                                    data-duration="{{ $video->duration }}" data-views="{{ $video->views }}"
                                    data-is-required="{{ $video->is_required ? 'إجباري' : 'اختياري' }}"
                                    data-video="{{ asset('storage/' . $video->video_path) }}"
                                    data-thumbnail="{{ asset('storage/' . $video->thumbnail) }}"
                                    data-key-points="{{ implode('|', $video->key_points ?? []) }}">

                                    <img src="{{ asset('storage/' . $video->thumbnail) }}"
                                        class="card-img-top img-fluid card-img-fixed" alt="...">
                                    <div class="card-overlay">
                                        <i class="bi bi-play-fill play-icon"></i>
                                    </div>
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title tajawal-bold fs-18 mb-2">{{ $video->title }}</h5>
                                    <p class="card-text tajawal-regular fs-14 mb-2" style="color: #8590A6;">
                                        {{ $video->description }}</p>
                                    <div class="actions d-flex justify-content-between align-items-center">
                                        <span class="tajawal-regular fs-12 pdg">{{ $video->category }}</span>
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="bi bi-play-circle"></i>
                                            <span class="tajawal-regular fs-16">مشاهدة</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- المودال -->
    <div class="modal fade vedios__modal" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-play-circle"></i>
                            <div>
                                <h4 class="tajawal-bold m-0" id="modalTitle"></h4>
                                <div>
                                    <span class="category tajawal-medium fs-14" id="modalCategory">إداري</span>
                                    <span class="tajawal-regular fs-14" style="color: #4B5563;" id="modalDuration"><i
                                            class="bi bi-clock"></i>&nbsp; 10 دقائق</span>
                                    <span class="tajawal-bold fs-12 required" id="modalType">إجباري</span>
                                </div>
                            </div>
                        </div>
                        <i class="fa fa-times close" data-bs-dismiss="modal" aria-label="Close"></i>
                    </div>
                </div>
                <div class="modal-body p-0">
                    <div class="position-relative">
                        <!-- الصورة الخلفية -->
                        <img src="{{ asset('assets/images/home_bg.jpeg') }}" alt="Background"
                            class="img-fluid w-100 vd__bg" style="height: 648px; object-fit: cover;">
                        <!-- Overlay سوداء نصف شفافة -->
                        <div class="position-absolute top-0 start-0 w-100 h-100 " style="background: #404141; opacity: .8;">
                        </div>

                        <!-- المحتوى داخل الصورة -->
                        <div id="contentBox"
                            class="position-absolute top-50 start-50 translate-middle text-center text-white">

                            <div class="mb-4 play" id="playIcon" style="cursor:pointer;">
                                <i class="fa fa-play fs-4"></i>
                            </div>
                            <h3 class="mb-3 tajawal-bold fs-30" id="modalVideoTitle">مقدمة عن الشركة</h3>
                            <p class="mb-4 tajawal-regular fs-20" id="modalVideoDescription">تعرف على تاريخ الشركة...</p>

                            <div class="d-flex justify-content-center gap-2 mb-5 acts">
                                <button class="btn btn-primary tajawal-bold fs-18 start__play">
                                    <i class="fa fa-play fs-4"></i> بدء التشغيل
                                </button>
                                <button class="btn btn-primary tajawal-bold fs-18 start__download">
                                    <i class="fa fa-download fs-4"></i> تحميل الفيديو
                                </button>
                            </div>

                            <div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="tajawal-regular fs-14" style="color: #D1D5DB;">التقدم</span>
                                    <span class="tajawal-regular fs-14" style="color: #D1D5DB;" id="modalViews">245
                                        مشاهدة</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" style="width: 25%;"></div>
                                </div>
                            </div>
                        </div>

                        <!-- الفيديو (مخفي في البداية) -->
                        <video id="modalVideoPlayer" class="position-absolute top-0 start-0 w-100 h-100 d-none" controls>
                            <source src="" type="video/mp4">
                        </video>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="tajawal-bold fs-20 mb-3"> <i class="bi bi-info-circle"></i>تفاصيل الفيديو</h5>
                                <div class="details">
                                    <div class="d-flex item">
                                        <i class="fa fa-clock"></i>
                                        <div class="d-flex flex-column">
                                            <span class="tajawal-bold fs-14" style="color: #111827;">مدة الفيديو</span>
                                            <span class="tajawal-bold fs-18" style="color: #2563EB;"
                                                id="modalDetailDuration">15 دقيقة </span>
                                        </div>
                                    </div>
                                    <div class="d-flex item">
                                        <i class="fa fa-eye views"></i>
                                        <div class="d-flex flex-column">
                                            <span class="tajawal-bold fs-14" style="color: #111827;">عدد المشاهدات</span>
                                            <span class="tajawal-bold fs-18" style="color: #16A34A;"
                                                id="modalDetailViews">245 مشاهدة</span>
                                        </div>
                                    </div>
                                    <div class="d-flex item">
                                        <i class="fa fa-user category"></i>
                                        <div class="d-flex flex-column">
                                            <span class="tajawal-bold fs-14" style="color: #111827;">الفئة
                                                المستهدفة</span>
                                            <span class="tajawal-bold fs-18" style="color: #9333EA;"
                                                id="modalDetailTargetGroup">إداري</span>
                                        </div>
                                    </div>
                                    <div class="d-flex item">
                                        <i class="fa fa-star type"></i>
                                        <div class="d-flex flex-column">
                                            <span class="tajawal-bold fs-14" style="color: #111827;">نوع الدورة</span>
                                            <span class="tajawal-bold fs-18" style="color: #DC2626;"
                                                id="modalDetailType">دورة إجبارية</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 how__learn">
                                <h5 class="tajawal-bold fs-20 mb-3"> <i class="bi bi-lightbulb"></i>ما ستتعلمه</h5>
                                <div class="learn mb-3">
                                    <p class="tajawal-regular fs-16 mb-4" style="color: #374151;"
                                        id="modalDetailDescription">تعرف على تاريخ الشركة...</p>
                                    <h6 class="tajawal-bold fs-18 mb-3" style="color: #111827;">النقاط الرئيسية:</h6>
                                    <ul id="modalKeyPoints">
                                    </ul>
                                    <div class="adv">
                                        <h6><i class="bi bi-trophy"></i><span class="tajawal-bold fs-14"
                                                style="color: #9A3412;">نصيحة للنجاح</span></h6>
                                        <p class="tajawal-regular fs-14 " style="color: #C2410C;">احرص على تدوين الملاحظات
                                            المهمة أثناء المشاهدة وطبق ما تعلمته في عملك اليومي</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        var exampleModal = document.getElementById('exampleModal');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;

            // data-attributes
            var videoId = button.getAttribute('data-id');
            var title = button.getAttribute('data-title');
            var description = button.getAttribute('data-description');
            var category = button.getAttribute('data-category');
            var targetGroup = button.getAttribute('data-target-group');
            var duration = button.getAttribute('data-duration');
            var views = button.getAttribute('data-views');
            var type = button.getAttribute('data-is-required');
            var videoSrc = button.getAttribute('data-video');
            var keyPoints = button.getAttribute('data-key-points').split('|');

            // fill modal
            document.getElementById('modalTitle').textContent = title;
            document.getElementById('modalCategory').textContent = category;
            document.getElementById('modalDuration').textContent = duration + ' دقيقة';
            document.getElementById('modalType').textContent = type;
            document.getElementById('modalVideoTitle').textContent = title;
            document.getElementById('modalVideoDescription').textContent = description;
            document.getElementById('modalDetailDuration').textContent = duration + ' دقيقة';
            document.getElementById('modalDetailViews').textContent = views + ' مشاهدة';
            document.getElementById('modalDetailTargetGroup').textContent = targetGroup;
            document.getElementById('modalDetailType').textContent = type;
            document.getElementById('modalDetailDescription').textContent = description;

            // Video
            var videoPlayer = document.getElementById('modalVideoPlayer');
            videoPlayer.querySelector('source').src = videoSrc;
            videoPlayer.load();

            // Key points
            var keyPointsList = document.getElementById('modalKeyPoints');
            keyPointsList.innerHTML = '';
            keyPoints.forEach(function(point) {
                if (point.trim() !== '') {
                    var li = document.createElement('li');
                    li.classList.add('d-flex', 'align-items-center', 'tajawal-medium', 'fs-16', 'mb-2');
                    li.innerHTML = '<i class="fa fa-check"></i> <p>' + point + '</p>';
                    keyPointsList.appendChild(li);
                }
            });
            // تعيين data-video-id لزر start__play داخل المودال
            var playButton = exampleModal.querySelector('.start__play');
            playButton.setAttribute('data-video-id', videoId);
        });

        // تشغيل الفيديو عند الضغط على زر start__play
        document.querySelectorAll('.start__play').forEach(function(button) {
            button.addEventListener('click', function() {
                var modal = button.closest('.modal');
                var videoPlayer = modal.querySelector('#modalVideoPlayer');
                var contentBox = modal.querySelector('#contentBox');

                // إخفاء المحتوى overlay
                contentBox.classList.add('d-none');

                // إظهار الفيديو وتشغيله
                videoPlayer.classList.remove('d-none');
                videoPlayer.play();

                // الحصول على id الفيديو من data-attribute (تأكد أنك أضفته)
                var videoId = button.getAttribute('data-video-id');
                // طلب AJAX لزيادة عدد المشاهدات
                fetch('/employee/videos/' + videoId + '/increment-views', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        // console.log('تم زيادة عدد المشاهدات:', data.views);
                    })
                // .catch(error => console.error('خطأ في زيادة المشاهدات:', error));
            });
        });

        // تحميل الفيديو عند الضغط على زر start__download
        document.querySelectorAll('.start__download').forEach(function(button) {
            button.addEventListener('click', function() {
                var modal = button.closest('.modal');
                var videoPlayer = modal.querySelector('#modalVideoPlayer');
                var videoSrc = videoPlayer.querySelector('source').src;

                // إنشاء رابط مؤقت للتحميل
                var a = document.createElement('a');
                a.href = videoSrc;
                a.download = videoSrc.split('/').pop(); // اسم الفيديو
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
            });
        });
    </script>

    <script>
     // تصفية الفيديوهات حسب الفئة مع التعامل مع الفراغات
document.getElementById('categories').addEventListener('change', function() {
    var selectedCategory = this.value.trim(); // إزالة الفراغات الزائدة
    var videos = document.querySelectorAll('.vedios__content .row .col-md-4');

    videos.forEach(function(video) {
        var videoCategory = video.querySelector('.actions span').textContent.trim();

        if (selectedCategory === 'value1' || selectedCategory === 'جميع الفيديوهات') {
            video.style.display = 'block';
        } else if (videoCategory === selectedCategory) {
            video.style.display = 'block';
        } else {
            video.style.display = 'none';
        }
    });

    // تحديث عداد الفيديوهات
    var visibleCount = Array.from(videos).filter(v => v.style.display !== 'none').length;
    document.querySelector('.count').textContent = visibleCount + ' فيديو';
});

    </script>
@endpush
