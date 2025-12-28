@extends('admin.layout')

@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">

                @if ($users->count())
                    <!-- جدول المستخدمين -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>قائمة المستخدمين</h5>
                                <div>
                                    <a href="#add_user" class="btn btn-outline-primary d-inline-flex"> <i
                                            class="ti ti-circle-plus ms-2"></i> إضافة مستخدم جديد</a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#importModal"
                                        class="btn btn-outline-primary d-inline-flex"> <i
                                            class="ti ti-download ms-2"></i>استيراد موظفيين جدد</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="dt-responsive table-responsive">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>الاسم</th>
                                                <th>نوع المستخدم</th>
                                                <th>البريد الإلكتروني</th>
                                                <th>تاريخ الإنشاء</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>
                                                        @if ($user->role == 'security_manager')
                                                            مدير الأمن
                                                        @elseif ($user->role == 'security_officer')
                                                            موظف الأمن
                                                        @elseif ($user->role == 'admin')
                                                            <span style="text-decoration: underline">مدير المنصة</span>
                                                        @else
                                                            موظف جديد
                                                        @endif
                                                    </td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                                    <td>
                                                        <div class="d-flex gap-1">
                                                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                                                class="btn btn-icon btn-light-success btn-edit"><i
                                                                    class="ti ti-edit"></i></a>
                                                            <button type="button"
                                                                class="btn btn-icon btn-light-danger btn-delete"
                                                                data-id="{{ $user->id }}"><i
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

                <!-- نموذج إضافة مستخدم -->
                <div class="col-sm-12">
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf

                        <div class="card" id="add_user">
                            <div class="card-header">
                                <h5>إضافة مستخدم جديد</h5>
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
                                        <label class="form-label">اسم المستخدم أو الرقم الوضيفي</label>
                                        <input type="text" name="username"
                                            class="form-control @error('username') is-invalid @enderror"
                                            value="{{ old('username') }}">
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label class="form-label">نوع المستخدم </label>
                                        <select name="role" class="form-select">
                                            <option value="" selected>— اختر الدور —</option>
                                            <option value="admin">مدير المنصة</option>
                                            <option value="security_manager">مدير الأمن</option>
                                            <option value="security_officer">موظف الأمن</option>
                                            <option value="employee">موظف جديد</option>
                                        </select>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label class="form-label">البريد الإلكتروني</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label class="form-label">كلمة المرور</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label class="form-label">تأكيد كلمة المرور</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-outline-success d-inline-flex">
                                    <i class="ti ti-circle-check icon_mr"></i> إضافة المستخدم
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
            <form action="{{ route('admin.users.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">استيراد موظفين جدد من Excel</h5>
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
                                <li><strong>username</strong> - إسم المستخدم أو الرقم الوظيفي</li>
                                <li><strong>name</strong> - الإسم</li>
                                <li><strong>email</strong> - البريد الإلكتروني</li>
                                <li><strong>password</strong> - كلمة المرور</li>
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
                            fetch(`{{ url('admin/users') }}/${id}`, {
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
