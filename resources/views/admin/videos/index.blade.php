@extends('admin.layout')

@push('css')
@endpush

@section('content')
    <section class="pc-container">
        <div class="pc-content">

            <div class="row">

                {{-- جدول الفيديوهات --}}
                @if ($videos->count())
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>قائمة الفيديوهات</h5>
                                <a href="#add_video" class="btn btn-outline-primary d-inline-flex">
                                    إضافة فيديو جديد
                                    <i class="ti ti-circle-plus icon_mr"></i>
                                </a>
                            </div>

                            <div class="card-body">
                                <div class="dt-responsive table-responsive">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>العنوان</th>
                                                <th>الفئة</th>
                                                <th>المدة</th>
                                                <th>المشاهدات</th>
                                                <th>إجباري</th>
                                                <th>تاريخ الإنشاء</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($videos as $video)
                                                <tr>
                                                    <td>{{ $video->id }}</td>
                                                    <td>{{ $video->title }}</td>
                                                    <td>{{ $video->category ?? '—' }}</td>
                                                    <td>{{ $video->duration ? $video->duration . ' دقيقة' : '—' }}</td>
                                                    <td>{{ $video->views }}</td>
                                                    <td>
                                                        @if ($video->is_required)
                                                            <span class="badge bg-danger">إجباري</span>
                                                        @else
                                                            <span class="badge bg-secondary">اختياري</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $video->created_at->format('Y-m-d') }}</td>
                                                    <td>
                                                        <div class="d-flex gap-1">

                                                            <a href="{{ route('admin.videos.edit', $video) }}"
                                                                class="btn btn-icon btn-light-success"><i
                                                                    class="ti ti-edit"></i></a>


                                                            <button type="button"
                                                                class="btn btn-icon btn-light-danger btn-delete"
                                                                data-id="{{ $video->id }}"><i
                                                                    class="ti ti-trash"></i></button>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- فورم إنشاء فيديو --}}
                <div class="col-sm-12">
                    <form method="POST" action="{{ route('admin.videos.store') }}" enctype="multipart/form-data"
                        class="dropzone" id="video-dropzone">
                        @csrf

                        <div class="card" id="add_video">
                            <div class="card-header">
                                <h5>إضافة فيديو جديد</h5>
                            </div>

                            <div class="card-body">

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label w-100 text-right">عنوان الفيديو</label>
                                            <input type="text" name="title" class="form-control"
                                                value="{{ old('title') }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label w-100 text-right">الفئة</label>
                                            <select name="category" class="form-select">
                                                <option value="عام">عام</option>
                                                <option value="عامل">عامل</option>
                                                <option value="إداري">إداري</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label w-100 text-right">الفئة المستهدفة</label>
                                            <select name="target_group" class="form-select">
                                                <option value="عمال">عمال</option>
                                                <option value="إداريين">إداريين</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label w-100 text-right">المدة (بالدقائق)</label>
                                            <input type="number" name="duration" class="form-control"
                                                value="{{ old('duration') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-3 d-flex align-items-center">
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" name="is_required"
                                                value="1">
                                            <label class="form-check-label">فيديو إجباري</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label w-100 text-right">وصف الفيديو</label>
                                            <textarea name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label w-100 text-right">ما ستتعلمه</label>
                                            <textarea name="what_you_will_learn" rows="3" class="form-control">{{ old('what_you_will_learn') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label w-100 text-right">النقاط الرئيسية (كل نقطة في سطر)</label>
                                            <textarea name="key_points" rows="4" class="form-control"
                                                placeholder="مثال:
فهم رسالة الشركة
التعرف على القيم الأساسية
معرفة الهيكل التنظيمي">{{ old('key_points') }}</textarea>
                                            <small class="text-muted w-100 text-right">سيتم حفظ كل سطر كنقطة مستقلة</small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label w-100 text-right">ملف الفيديو</label>
                                            <input type="file" name="video_path" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label w-100 text-right">صورة الغلاف</label>
                                            <input type="file" name="thumbnail" class="form-control">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-outline-success d-inline-flex">
                                    <i class="ti ti-circle-check icon_mr"></i>
                                    حفظ الفيديو
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section>
@endsection

@push('js')
    <script>
        $(function() {
            $('#simpletable').DataTable({
                language: {
                    search: "بحث:",
                    lengthMenu: "عرض _MENU_",
                    info: "عرض _START_ إلى _END_ من _TOTAL_",
                    zeroRecords: "لا توجد نتائج"
                }
            });

            $('.btn-delete').on('click', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'هل أنت متأكد؟',
                    text: 'لن يمكنك التراجع!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'نعم، احذف',
                    cancelButtonText: 'إلغاء'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/admin/videos/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            }
                        }).then(() => location.reload());
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5/dist/min/dropzone.min.js"></script>

    <script>
        Dropzone.options.videoDropzone = {
            paramName: "video_path",
            maxFilesize: 2048, // ميغابايت
            acceptedFiles: ".mp4,.mov,.avi",
            chunking: true,
            forceChunking: true,
            chunkSize: 1024 * 1024, // 1 ميغابايت
            retryChunks: true,
        };
    </script>
@endpush
