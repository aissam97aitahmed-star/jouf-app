@extends('admin.layout')

@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">

            <!-- جدول قوالب الرسائل -->
            <div class="col-sm-12 mt-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>قوالب الرسائل</h5>
                        <a class="btn btn-outline-info d-inline-flex" data-bs-toggle="modal"
                            data-bs-target="#addTemplateModal"><i class="ti ti-circle-plus mrl"></i>إضافة قالب جديد
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>العنوان</th>
                                        <th>المحتوى</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($templates as $template)
                                        <tr>
                                            <td>{{ $template->id }}</td>
                                            <td>{{ $template->title }}</td>
                                            <td>{{ Str::limit($template->content, 50) }}</td>
                                            <td>
                                                <div class="d-flex gap-1">
                                                    <button type="button" class="btn btn-icon btn-light-success btn-edit"
                                                        data-id="{{ $template->id }}"
                                                        data-title="{{ $template->title }}"
                                                        data-content="{{ $template->content }}"
                                                        data-bs-toggle="modal" data-bs-target="#editTemplateModal">
                                                        <i class="ti ti-edit"></i>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-icon btn-light-danger btn-delete"
                                                        data-id="{{ $template->id }}">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Pagination -->
                            <div class="mt-3">
                                {{ $templates->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Modal لإضافة قالب جديد -->
<div class="modal fade" id="addTemplateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('admin.templates.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">إضافة قالب جديد</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">العنوان</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">المحتوى</label>
                        <textarea name="content" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">حفظ القالب</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal لتحديث القالب -->
<div class="modal fade" id="editTemplateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editTemplateForm" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تحديث القالب</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-template-id">
                    <div class="mb-3">
                        <label class="form-label">العنوان</label>
                        <input type="text" name="title" id="edit-template-title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">المحتوى</label>
                        <textarea name="content" id="edit-template-content" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">تحديث القالب</button>
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

    document.addEventListener('DOMContentLoaded', function() {
        // زر التعديل
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                const title = this.dataset.title;
                const content = this.dataset.content;

                document.getElementById('edit-template-id').value = id;
                document.getElementById('edit-template-title').value = title;
                document.getElementById('edit-template-content').value = content;

                document.getElementById('editTemplateForm').action = `/admin/templates/${id}`;
            });
        });

        // زر الحذف
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
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
                        fetch(`/admin/templates/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            }
                        }).then(res => res.json())
                        .then(data => {
                            if(data.success){
                                Swal.fire('تم الحذف!', data.message, 'success')
                                .then(() => { button.closest('tr').remove(); });
                            }
                        }).catch(err => Swal.fire('حدث خطأ', 'لم يتم الحذف', 'error'));
                    }
                });
            });
        });
    });
</script>
@endpush
