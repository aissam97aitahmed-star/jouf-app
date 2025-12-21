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

        video {
            border-radius: 6px;
            max-height: 220px;
        }
    </style>
@endpush

@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-sm-12">

                    <form method="POST"
                          action="{{ route('admin.home-video.update') }}"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>إدارة الفيديو التوضيحي</h5>

                                <a href="{{ route('admin.dashboard') }}"
                                   class="btn btn-outline-primary d-inline-flex">
                                    العودة
                                    <i class="ti ti-arrow-back icon_mr"></i>
                                </a>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    {{-- Upload Video --}}
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">رفع فيديو (MP4)</label>

                                            <input type="file"
                                                   name="video"
                                                   class="form-control @error('video') is-invalid @enderror"
                                                   accept="video/mp4,video/webm,video/ogg">

                                            @error('video')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                            <small class="text-muted">
                                                الصيغة المسموحة: mp4 – الحجم الأقصى: 50MB
                                            </small>
                                        </div>
                                    </div>

                                    {{-- Current Video --}}
                                    @if($video->video_path)
                                        <div class="col-12 mt-3">
                                            <label class="form-label">الفيديو الحالي</label>

                                            <video width="100%" controls>
                                                <source src="{{ asset('storage/'.$video->video_path) }}"
                                                        type="video/mp4">
                                                متصفحك لا يدعم تشغيل الفيديو
                                            </video>
                                        </div>
                                    @endif

                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit"
                                        class="btn btn-outline-success d-inline-flex">
                                    <i class="ti ti-circle-check icon_mr"></i>
                                    حفظ التغييرات
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
