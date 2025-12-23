@extends('admin.layout')

@push('css')
    <style>
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .br-6 {
            border-radius: 6px;
        }
    </style>
@endpush

@section('content')
    <section class="pc-container">
        <div class="pc-content">

            <div class="row">
                <div class="col-sm-12">

                    <form method="POST" action="{{ route('admin.videos.update', $video) }}" enctype="multipart/form-data"
                        class="dropzone" id="video-dropzone">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>تعديل الفيديو</h5>
                                <a href="{{ route('admin.videos.index') }}" class="btn btn-outline-primary d-inline-flex">
                                    العودة
                                    <i class="ti ti-arrow-back icon_mr"></i>
                                </a>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    {{-- Title --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label w-100 text-right">عنوان الفيديو</label>
                                            <input type="text" name="title"
                                                class="form-control @error('title') is-invalid @enderror"
                                                value="{{ old('title', $video->title) }}">
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Category --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label w-100 text-right">الفئة</label>
                                            <select name="category" class="form-select">
                                                <option value="عام" @if ($video->category == 'عام') selected @endif>عام
                                                </option>
                                                <option value="عامل" @if ($video->category == 'عامل') selected @endif>
                                                    عامل</option>
                                                <option value="إداري" @if ($video->category == 'إداري') selected @endif>
                                                    إداري</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Target Group --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label w-100 text-right">الفئة المستهدفة</label>
                                            <select name="target_group" class="form-select">
                                                <option value="عمال" @if ($video->target_group == 'عمال') selected @endif>
                                                    عمال</option>
                                                <option value="إداريين" @if ($video->target_group == 'إداريين') selected @endif>
                                                    إداريين</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Duration --}}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label w-100 text-right">مدة الفيديو (دقائق)</label>
                                            <input type="number" name="duration" class="form-control"
                                                value="{{ old('duration', $video->duration) }}">
                                        </div>
                                    </div>

                                    {{-- Required --}}
                                    <div class="col-md-3 d-flex align-items-center">
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" name="is_required"
                                                value="1"
                                                {{ old('is_required', $video->is_required) ? 'checked' : '' }}>
                                            <label class="form-check-label">فيديو إجباري</label>
                                        </div>
                                    </div>

                                    {{-- Description --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label w-100 text-right">وصف الفيديو</label>
                                            <textarea name="description" rows="3" class="form-control">{{ old('description', $video->description) }}</textarea>
                                        </div>
                                    </div>

                                    {{-- What you will learn --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label w-100 text-right">ما ستتعلمه</label>
                                            <textarea name="what_you_will_learn" rows="3" class="form-control">{{ old('what_you_will_learn', $video->what_you_will_learn) }}</textarea>
                                        </div>
                                    </div>

                                    {{-- Key Points --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label w-100 text-right">النقاط الرئيسية (كل نقطة في سطر)</label>
                                            <textarea name="key_points" rows="4" class="form-control"
                                                placeholder="مثال:
التعرف على أهداف الفيديو
فهم النقاط الأساسية
تطبيق ما تم تعلمه">{{ old('key_points', $video->key_points ? implode("\n", $video->key_points) : '') }}</textarea>

                                            <small class="text-muted">
                                                سيتم حفظ كل سطر كنقطة مستقلة
                                            </small>
                                        </div>
                                    </div>


                                    {{-- Current Video --}}
                                    @if ($video->video_path)
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label w-100 text-right d-block">الفيديو الحالي</label>
                                            <video controls style="width: 100%; max-height: 300px;">
                                                <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                                            </video>
                                        </div>
                                    @endif

                                    {{-- Replace Video --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label w-100 text-right">استبدال ملف الفيديو (اختياري)</label>
                                            <input type="file" name="video_path" class="form-control">
                                        </div>
                                    </div>

                                    {{-- Thumbnail --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">صورة الغلاف</label>
                                            <input type="file" name="thumbnail" class="form-control">
                                        </div>
                                    </div>

                                    {{-- Current Thumbnail --}}
                                    @if ($video->thumbnail)
                                        <div class="col-md-12 mt-3">
                                            <label class="form-label d-block">صورة الغلاف الحالية</label>
                                            <img src="{{ asset('storage/' . $video->thumbnail) }}"
                                                style="max-height: 200px; border-radius: 8px;">
                                        </div>
                                    @endif

                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-outline-success d-inline-flex">
                                    <i class="ti ti-circle-check icon_mr"></i>
                                    تحديث الفيديو
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
