@extends('admin.layout')

@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">

                @if ($policies->count())
                    <!-- جدول السياسات -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>قائمة السياسات</h5>
                                <a href="#add_policy" class="btn btn-outline-primary d-inline-flex">
                                    إنشاء سياسة جديدة
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
                                                <th>الأولوية</th>
                                                <th>الحالة</th>
                                                <th>التنزيلات</th>
                                                <th>المشاهدات</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($policies as $policy)
                                                <tr>
                                                    <td>{{ $policy->id }}</td>
                                                    <td>{{ $policy->title }}</td>
                                                    <td>{{ $policy->category->name }}</td>
                                                    <td>
                                                        <span class="badge bg-light-info">
                                                            {{ $policy->priority }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if ($policy->is_active)
                                                            <span class="badge bg-light-primary">نشطة</span>
                                                        @else
                                                            <span class="badge bg-light-primary">غير نشطة</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $policy->downloads }}</td>
                                                    <td>{{ $policy->views }}</td>
                                                    <td>
                                                        <div class="d-flex gap-1">
                                                            <a href="{{ route('admin.policies.edit', $policy) }}"
                                                                class="btn btn-icon btn-light-success"><i
                                                                    class="ti ti-edit"></i></a>
                                                            <button type="button"
                                                                class="btn btn-icon btn-light-danger btn-delete"
                                                                data-id="{{ $policy->id }}"><i
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

                <!-- نموذج إضافة سياسة -->
                <div class="col-sm-12">
                    <form method="POST" action="{{ route('admin.policies.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card" id="add_policy">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="card-header">
                                <h5>إنشاء سياسة جديدة</h5>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-6 mb-3">
                                        <label class="form-label">عنوان السياسة</label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title') }}">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label class="form-label">فئة السياسة</label>
                                        <select name="policy_category_id"
                                            class="form-select @error('policy_category_id') is-invalid @enderror">
                                            <option value="">— اختر الفئة —</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('policy_category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('policy_category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label class="form-label">الأولوية</label>
                                        <select name="priority" class="form-select">
                                            @foreach ($priorities as $priority)
                                                <option value="{{ $priority->value }}">
                                                    {{ $priority->value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label class="form-label">ملف PDF</label>
                                        <input type="file" name="pdf" class="form-control">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="form-label">وصف السياسة</label>
                                        <textarea name="description" rows="4" class="form-control">{{ old('description') }}</textarea>
                                    </div>


                                    <div class="col-6 mb-3 d-flex align-items-center">
                                        <div class="form-check mt-4">
                                            <input type="hidden" name="is_active" value="0">
                                            <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                                {{ old('is_active', $policy->is_active ?? true) ? 'checked' : '' }}>
                                            <label class="form-check-label">سياسة نشطة</label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="ti ti-circle-check icon_mr"></i>
                                    حفظ السياسة
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
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'نعم، احذف!',
                        cancelButtonText: 'إلغاء'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(`{{ url('admin/policies') }}/${id}`, {
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
                                }).catch(err => Swal.fire('حدث خطأ', 'لم يتم حذف الموقع',
                                    'error'));
                        }
                    });
                });
            });
        });
    </script>
@endpush
