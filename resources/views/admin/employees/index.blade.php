@extends('admin.layout')

@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">

                @if ($employees->count())
                    <!-- جدول الموظفين -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>قائمة الموظفين</h5>
                                <div>
                                    <a href="#add_employee" class="btn btn-outline-primary d-inline-flex"> <i
                                            class="ti ti-circle-plus ms-2"></i> إضافة موظف جديد</a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#importModal"
                                        class="btn btn-outline-primary d-inline-flex"> <i
                                            class="ti ti-download ms-2"></i>استيراد إكسيل</a>

                                    {{-- <a href="{{ route('admin.employees.export') }}"
                                        class="btn btn-outline-primary d-inline-flex">
                                        <i class="ti ti-download ms-2"></i>تصدير إكسيل
                                    </a> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="dt-responsive table-responsive">
                                    <table id="employees_table" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>الاسم</th>
                                                <th>الوظيفة</th>
                                                <th>الإدارة</th>
                                                <th>البريد الإلكتروني</th>
                                                <th>الهاتف</th>
                                                <th>المكتب</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($employees as $employee)
                                                <tr>
                                                    <td>{{ $employee->id }}</td>
                                                    <td>{{ $employee->name }}</td>
                                                    <td>{{ $employee->position }}</td>
                                                    <td>{{ $employee->department }}</td>
                                                    <td>{{ $employee->email }}</td>
                                                    <td>{{ $employee->phone }}</td>
                                                    <td>{{ $employee->office_location ?? '—' }}</td>
                                                    <td>
                                                        <div class="d-flex gap-1">

                                                             <a href="{{ route('admin.employees.edit', $employee) }}" class="btn btn-icon btn-light-success"><i
                                                                class="ti ti-edit"></i></a>


                                                            <button type="button"
                                                                class="btn btn-icon btn-light-danger btn-delete"
                                                                data-id="{{ $employee->id }}"><i
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

                <!-- نموذج إضافة الموظف -->
                <div class="col-sm-12">
                    <form method="POST" action="{{ route('admin.employees.store') }}">
                        @csrf
                        <div class="card" id="add_employee">
                            <div class="card-header">
                                <h5>إضافة موظف مرشد</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label">الاسم</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">الوظيفة</label>
                                        <input type="text" name="position" class="form-control"
                                            value="{{ old('position') }}">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">الإدارة</label>
                                            <select name="department"
                                                class="form-select @error('department') is-invalid @enderror">
                                                <option value="">— اختر الإدارة —</option>

                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->value }}"
                                                        {{ old('department') === $department->value ? 'selected' : '' }}>
                                                        {{ $department->value }}
                                                    </option>
                                                @endforeach

                                            </select>

                                            @error('department')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label class="form-label">البريد الإلكتروني</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email') }}">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">الهاتف</label>
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ old('phone') }}">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">المكتب</label>
                                        <input type="text" name="office_location" class="form-control"
                                            value="{{ old('office_location') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-outline-success d-inline-flex">
                                    <i class="ti ti-circle-check icon_mr"></i>إضافة الموظف
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- Modal الاستيراد -->
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.employees.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">استيراد موظفين من Excel</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">اختر ملف Excel</label>
                            <input type="file" name="file" class="form-control" required>
                            <small class="text-muted">صيغة الملف: XLSX أو XLS</small>
                        </div>
                        <div class="mb-3">
                            <p>مثال على الأعمدة المطلوبة في الملف:</p>
                            <ul>
                                <li><strong>name</strong> - الاسم</li>
                                <li><strong>position</strong> - الوظيفة</li>
                                <li><strong>department</strong> - الإدارة</li>
                                <li><strong>email</strong> - البريد الإلكتروني</li>
                                <li><strong>phone</strong> - الهاتف</li>
                                <li><strong>office_location</strong> - المكتب (اختياري)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">استيراد</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#employees_table').DataTable({
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

        // حذف الموظف
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
                            fetch(`{{ url('admin/employees') }}/${id}`, {
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
                                }).catch(err => Swal.fire('حدث خطأ', 'لم يتم حذف الموظف',
                                    'error'));
                        }
                    });
                });
            });
        });
    </script>
@endpush
