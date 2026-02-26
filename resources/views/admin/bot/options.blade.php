@extends('admin.layout')

@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">

                <!-- نموذج إضافة خيار -->
                <div class="col-sm-12">
                    <form method="POST" action="{{ route('admin.bot_options.store') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h5>إضافة خيار جديد للبوت</h5>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">رقم الخيار</label>
                                        <input type="number" name="option_number"
                                            class="form-control" min="1" max="9" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">نص الخيار</label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">رد البوت</label>
                                        <textarea name="content" class="form-control" rows="2"></textarea>
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label class="form-label">الحالة</label>
                                        <select name="is_active" class="form-select">
                                            <option value="1">مفعل</option>
                                            <option value="0">معطل</option>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <button class="btn btn-outline-success">
                                    <i class="ti ti-circle-check icon_mr"></i> حفظ الخيار
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- جدول الخيارات -->
                <div class="col-sm-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>خيارات البوت</h5>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="simpletable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>رقم الخيار</th>
                                            <th>النص</th>
                                            <th>الرد</th>
                                            <th>الحالة</th>
                                            <th>إجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($options as $option)
                                            <tr>
                                                <td>{{ $option->id }}</td>
                                                <td>{{ $option->option_number }}</td>
                                                <td>{{ $option->title }}</td>
                                                <td>{{ Str::limit($option->content, 40) }}</td>
                                                <td>
                                                    <span
                                                        class="badge {{ $option->is_active ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $option->is_active ? 'مفعل' : 'معطل' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-1">
                                                        <button data-id="{{ $option->id }}"
                                                            data-number="{{ $option->option_number }}"
                                                            data-title="{{ $option->title }}"
                                                            data-content="{{ $option->content }}"
                                                            data-active="{{ $option->is_active }}"
                                                            class="btn btn-icon btn-light-success btn-edit">
                                                            <i class="ti ti-edit"></i>
                                                        </button>

                                                        <button class="btn btn-icon btn-light-danger btn-delete"
                                                            data-id="{{ $option->id }}">
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

    <!-- Modal تعديل خيار البوت -->
    <div class="modal fade" id="editOptionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="editOptionForm" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">تعديل خيار البوت</h5>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" id="edit-id">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">رقم الخيار</label>
                                <input type="number" name="option_number" id="edit-number" class="form-control"
                                    min="1" max="9" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">نص الخيار</label>
                                <input type="text" name="title" id="edit-title" class="form-control" required>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">رد البوت</label>
                                <textarea name="content" id="edit-content" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">الحالة</label>
                                <select name="is_active" id="edit-active" class="form-select">
                                    <option value="1">مفعل</option>
                                    <option value="0">معطل</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            إلغاء
                        </button>
                        <button type="submit" class="btn btn-primary">
                            حفظ التعديلات
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
                            fetch(`{{ url('admin/bot_options') }}/${id}`, {
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.btn-edit');
            const modal = new bootstrap.Modal(document.getElementById('editOptionModal'));
            const form = document.getElementById('editOptionForm');

            editButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;

                    document.getElementById('edit-id').value = id;
                    document.getElementById('edit-number').value = this.dataset.number;
                    document.getElementById('edit-title').value = this.dataset.title;
                    document.getElementById('edit-content').value = this.dataset.content;
                    document.getElementById('edit-active').value = this.dataset.active;

                    // route update
                    form.action = `{{ url('admin/bot_options') }}/${id}`;

                    modal.show();
                });
            });
        });
    </script>
@endpush
