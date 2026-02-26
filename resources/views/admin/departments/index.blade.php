@extends('admin.layout')

@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">

            <!-- جدول الأقسام -->
            <div class="col-sm-12 mt-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>إدارة الأقسام</h5>
                        <a class="btn btn-outline-info d-inline-flex" data-bs-toggle="modal"
                           data-bs-target="#addDepartmentModal">
                            <i class="ti ti-circle-plus mrl"></i>إضافة قسم جديد
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم القسم</th>
                                        <th>المسؤول</th>
                                        <th>البريد الإلكتروني</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $dept)
                                        <tr>
                                            <td>{{ $dept->id }}</td>
                                            <td>{{ $dept->name }}</td>
                                            <td>{{ $dept->responsible_employee ?? '-' }}</td>
                                            <td>{{ $dept->email ?? '-' }}</td>
                                            <td>
                                                <div class="d-flex gap-1">

                                                    <!-- Edit -->
                                                    <button type="button"
                                                        class="btn btn-icon btn-light-success btn-edit"
                                                        data-id="{{ $dept->id }}"
                                                        data-name="{{ $dept->name }}"
                                                        data-employee="{{ $dept->responsible_employee }}"
                                                        data-email="{{ $dept->email }}"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editDepartmentModal">
                                                        <i class="ti ti-edit"></i>
                                                    </button>

                                                    <!-- Delete -->
                                                    <button type="button"
                                                        class="btn btn-icon btn-light-danger btn-delete"
                                                        data-id="{{ $dept->id }}">
                                                        <i class="ti ti-trash"></i>
                                                    </button>

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

        </div>
    </div>
</section>


<!-- ✅ Modal إضافة قسم -->
<div class="modal fade" id="addDepartmentModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('admin.departments.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">إضافة قسم</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> --}}
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">اسم القسم</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">الموظف المسؤول</label>
                        <input type="text" name="responsible_employee" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">البريد الإلكتروني</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- ✅ Modal تعديل قسم -->
<div class="modal fade" id="editDepartmentModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="editDepartmentForm" method="POST">
            @csrf
            @method('PUT')

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تعديل القسم</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input type="hidden" id="edit-id">

                    <div class="mb-3">
                        <label class="form-label">اسم القسم</label>
                        <input type="text" name="name" id="edit-name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">الموظف المسؤول</label>
                        <input type="text" name="responsible_employee" id="edit-employee" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">البريد الإلكتروني</label>
                        <input type="email" name="email" id="edit-email" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">تحديث</button>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection


@push('js')
<script>

$(document).ready(function () {
    $('#simpletable').DataTable({
        language: {
            lengthMenu: "عرض _MENU_ مدخلات",
            search: "بحث:",
            info: "عرض _START_ إلى _END_ من أصل _TOTAL_ مدخل",
            infoEmpty: "لا توجد بيانات",
            zeroRecords: "لا نتائج",
            paginate: {
                first: "الأول",
                last: "الأخير",
                next: "التالي",
                previous: "السابق"
            }
        }
    });
});


document.addEventListener('DOMContentLoaded', function () {

    // تعبئة بيانات التعديل
    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', function () {

            const id = this.dataset.id;
            const name = this.dataset.name;
            const employee = this.dataset.employee;
            const email = this.dataset.email;

            document.getElementById('edit-name').value = name;
            document.getElementById('edit-employee').value = employee ?? '';
            document.getElementById('edit-email').value = email ?? '';

            document.getElementById('editDepartmentForm').action =
                `/admin/departments/${id}`;
        });
    });


    // حذف القسم
    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function () {

            const id = this.dataset.id;

            Swal.fire({
                title: 'هل أنت متأكد؟',
                text: "لن تتمكن من التراجع عن الحذف!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'نعم احذف',
                cancelButtonText: 'إلغاء'
            }).then((result) => {

                if (result.isConfirmed) {

                    fetch(`/admin/departments/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('تم الحذف', data.message, 'success')
                            .then(() => btn.closest('tr').remove());
                        }
                    })
                    .catch(() => Swal.fire('خطأ', 'فشل الحذف', 'error'));

                }
            });

        });
    });

});
</script>
@endpush
