@extends('admin.layout')

@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-sm-12 mt-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1">إدارة جهات التواصل للخدمات</h5>
                                <small class="text-muted">البيانات هنا تظهر مباشرة داخل قسم دليل الخدمات والتواصل المباشر</small>
                            </div>
                            <button class="btn btn-outline-info d-inline-flex" data-bs-toggle="modal"
                                data-bs-target="#addServiceContactModal">
                                <i class="ti ti-circle-plus mrl"></i>إضافة جهة تواصل
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="dt-responsive table-responsive">
                                <table id="simpletable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>الخدمة</th>
                                            <th>الاسم</th>
                                            <th>الهاتف</th>
                                            <th>البريد الإلكتروني</th>
                                            <th>الترتيب</th>
                                            <th>الحالة</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <td>{{ $contact->id }}</td>
                                                <td>{{ $serviceOptions[$contact->service_key] ?? $contact->service_key }}</td>
                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->phone ?: '-' }}</td>
                                                <td>{{ $contact->email ?: '-' }}</td>
                                                <td>{{ $contact->sort_order }}</td>
                                                <td>
                                                    @if ($contact->is_active)
                                                        <span class="badge bg-light-success border border-success text-success">نشط</span>
                                                    @else
                                                        <span class="badge bg-light-secondary border">مخفي</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-1">
                                                        <button type="button" class="btn btn-icon btn-light-success btn-edit"
                                                            data-id="{{ $contact->id }}"
                                                            data-service_key="{{ $contact->service_key }}"
                                                            data-name="{{ $contact->name }}"
                                                            data-phone="{{ $contact->phone }}"
                                                            data-email="{{ $contact->email }}"
                                                            data-sort_order="{{ $contact->sort_order }}"
                                                            data-is_active="{{ $contact->is_active ? 1 : 0 }}"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editServiceContactModal">
                                                            <i class="ti ti-edit"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-icon btn-light-danger btn-delete"
                                                            data-id="{{ $contact->id }}">
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

    <div class="modal fade" id="addServiceContactModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('admin.service-contacts.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">إضافة جهة تواصل</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">الخدمة</label>
                            <select name="service_key" class="form-select" required>
                                @foreach ($serviceOptions as $key => $label)
                                    <option value="{{ $key }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الاسم</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الهاتف</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الترتيب</label>
                            <input type="number" name="sort_order" class="form-control" value="0" min="0">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" checked
                                id="add_is_active">
                            <label class="form-check-label" for="add_is_active">إظهار في صفحة الموظفين</label>
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

    <div class="modal fade" id="editServiceContactModal" tabindex="-1">
        <div class="modal-dialog">
            <form id="editServiceContactForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">تعديل جهة التواصل</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">الخدمة</label>
                            <select name="service_key" id="edit-service-key" class="form-select" required>
                                @foreach ($serviceOptions as $key => $label)
                                    <option value="{{ $key }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الاسم</label>
                            <input type="text" name="name" id="edit-name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الهاتف</label>
                            <input type="text" name="phone" id="edit-phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">البريد الإلكتروني</label>
                            <input type="email" name="email" id="edit-email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الترتيب</label>
                            <input type="number" name="sort_order" id="edit-sort-order" class="form-control"
                                min="0">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                id="edit-is-active">
                            <label class="form-check-label" for="edit-is-active">إظهار في صفحة الموظفين</label>
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
        $(document).ready(function() {
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

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-edit').forEach(btn => {
                btn.addEventListener('click', function() {
                    const form = document.getElementById('editServiceContactForm');
                    form.action = `/admin/service-contacts/${this.dataset.id}`;
                    document.getElementById('edit-service-key').value = this.dataset.service_key;
                    document.getElementById('edit-name').value = this.dataset.name;
                    document.getElementById('edit-phone').value = this.dataset.phone ?? '';
                    document.getElementById('edit-email').value = this.dataset.email ?? '';
                    document.getElementById('edit-sort-order').value = this.dataset.sort_order ?? 0;
                    document.getElementById('edit-is-active').checked = this.dataset.is_active === '1';
                });
            });

            document.querySelectorAll('.btn-delete').forEach(btn => {
                btn.addEventListener('click', function() {
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
                            fetch(`/admin/service-contacts/${id}`, {
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
