@extends('admin.layout')

@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">

                <div class="col-sm-12">
                    <form method="POST"
                          action="{{ route('admin.policies.update', $policy) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>تعديل السياسة</h5>
                                 <a href="{{ route('admin.policies.index') }}" class="btn btn-outline-primary d-inline-flex">العودة
                                    <i class="ti ti-arrow-back icon_mr"></i>
                                </a>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    {{-- عنوان السياسة --}}
                                    <div class="col-6 mb-3">
                                        <label class="form-label">عنوان السياسة</label>
                                        <input type="text"
                                               name="title"
                                               class="form-control @error('title') is-invalid @enderror"
                                               value="{{ old('title', $policy->title) }}">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- فئة السياسة --}}
                                    <div class="col-6 mb-3">
                                        <label class="form-label">فئة السياسة</label>
                                        <select name="policy_category_id"
                                                class="form-select @error('policy_category_id') is-invalid @enderror">
                                            <option value="">— اختر الفئة —</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('policy_category_id', $policy->policy_category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('policy_category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- الأولوية --}}
                                    <div class="col-6 mb-3">
                                        <label class="form-label">الأولوية</label>
                                        <select name="priority" class="form-select">
                                            @foreach ($priorities as $priority)
                                                <option value="{{ $priority->value }}"
                                                    {{ old('priority', $policy->priority) == $priority->value ? 'selected' : '' }}>
                                                    {{ $priority->value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- ملف PDF --}}
                                    <div class="col-6 mb-3">
                                        <label class="form-label">ملف PDF</label>
                                        <input type="file" name="pdf" class="form-control">
                                        @if ($policy->pdf_path)
                                            <small class="text-muted d-block mt-1">
                                                الملف الحالي:
                                                <a href="{{ asset('storage/' . $policy->pdf_path) }}"
                                                   target="_blank">عرض الملف</a>
                                            </small>
                                        @endif
                                    </div>

                                    {{-- الوصف --}}
                                    <div class="col-12 mb-3">
                                        <label class="form-label">وصف السياسة</label>
                                        <textarea name="description"
                                                  rows="4"
                                                  class="form-control">{{ old('description', $policy->description) }}</textarea>
                                    </div>

                                    {{-- الحالة --}}
                                    <div class="col-6 mb-3 d-flex align-items-center">
                                        <div class="form-check mt-4">
                                            <input type="hidden" name="is_active" value="0">

                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   name="is_active"
                                                   value="1"
                                                   {{ old('is_active', $policy->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label">
                                                سياسة نشطة
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end gap-2">
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="ti ti-circle-check icon_mr"></i>
                                    حفظ التعديلات
                                </button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
