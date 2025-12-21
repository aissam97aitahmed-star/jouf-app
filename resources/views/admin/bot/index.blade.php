@extends('admin.layout')

@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">

                <!-- نموذج إعدادات البوت -->
                <div class="col-sm-12">
                    @php
                        $settings = \App\Models\BotSetting::firstOrCreate([]);
                    @endphp
                    <form method="POST" action="{{ route('admin.bot-settings.update', $settings) }}">
                        @csrf
                        @method('PUT')
                        <div class="card" id="bot_settings_form">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>إعدادات البوت</h5>
                                <a href="#qeustions" class="btn btn-outline-info d-inline-flex"><i
                                        class="ti ti-info-circle mrl"></i>الأسئلة الأكثر تكراراً</a>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-6 mb-3">
                                        <label class="form-label">اسم البوت</label>
                                        <input type="text" name="bot_name"
                                            class="form-control @error('bot_name') is-invalid @enderror"
                                            value="{{ old('bot_name', $settings->bot_name) }}">
                                        @error('bot_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label class="form-label">رسالة الترحيب</label>
                                        <textarea name="welcome_message" class="form-control @error('welcome_message') is-invalid @enderror" rows="2">{{ old('welcome_message', $settings->welcome_message) }}</textarea>
                                        @error('welcome_message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label class="form-label">اللغة</label>
                                        <select name="language" class="form-select">
                                            <option value="arabic"
                                                {{ old('language', $settings->language) == 'arabic' ? 'selected' : '' }}>
                                                العربية
                                            </option>
                                            <option value="english"
                                                {{ old('language', $settings->language) == 'english' ? 'selected' : '' }}>
                                                English
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label class="form-label">مفعل</label>
                                        <select name="is_active" class="form-select">
                                            <option value="1"
                                                {{ old('is_active', $settings->is_active) == '1' ? 'selected' : '' }}>نعم
                                            </option>
                                            <option value="0"
                                                {{ old('is_active', $settings->is_active) == '0' ? 'selected' : '' }}>لا
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label class="form-label">زمن الرد (ثواني)</label>
                                        <input type="number" name="response_delay" class="form-control" step="0.1"
                                            value="{{ old('response_delay', $settings->response_delay) }}">
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label class="form-label">ردود ذكية</label>
                                        <select name="smart_reply" class="form-select">
                                            <option value="1"
                                                {{ old('smart_reply', $settings->smart_reply) == '1' ? 'selected' : '' }}>
                                                نعم
                                            </option>
                                            <option value="0"
                                                {{ old('smart_reply', $settings->smart_reply) == '0' ? 'selected' : '' }}>
                                                لا
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label class="form-label">حفظ المحادثات</label>
                                        <select name="save_conversations" class="form-select">
                                            <option value="1"
                                                {{ old('save_conversations', $settings->save_conversations) == '1' ? 'selected' : '' }}>
                                                نعم</option>
                                            <option value="0"
                                                {{ old('save_conversations', $settings->save_conversations) == '0' ? 'selected' : '' }}>
                                                لا</option>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-outline-success d-inline-flex">
                                    <i class="ti ti-circle-check icon_mr"></i>تحديث الإعدادات
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- جدول الأسئلة -->
                <div class="col-sm-12 mt-5">
                    <div class="card" id="qeustions">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>الأسئلة الأكثر تكراراً</h5>
                            <a class="btn btn-outline-info d-inline-flex" data-bs-toggle="modal"
                                data-bs-target="#addQuestionModal"><i class="ti ti-circle-plus mrl"></i>سؤال جديد
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="dt-responsive table-responsive">
                                <table id="simpletable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>السؤال</th>
                                            <th>التاريخ</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($faqs as $faq)
                                            <tr>
                                                <td>{{ $faq->id }}</td>
                                                <td>{{ $faq->question }}</td>
                                                <td>{{ $faq->created_at->format('Y-m-d H:i') }}</td>
                                                <td>
                                                    <div class="d-flex gap-1">
                                                        <a href="#" class="btn btn-icon btn-light-success btn-edit"
                                                            data-id="{{ $faq->id }}"
                                                            data-question="{{ $faq->question }}"
                                                            data-answer="{{ $faq->answer }}"
                                                            data-is_active="{{ $faq->is_active }}" data-bs-toggle="modal"
                                                            data-bs-target="#editQuestionModal"><i
                                                                class="ti ti-edit"></i></a>
                                                        <button type="button"
                                                            class="btn btn-icon btn-light-danger btn-delete"
                                                            data-id="{{ $faq->id }}"><i
                                                                class="ti ti-trash"></i></button>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Pagination -->
                                <div class="mt-3">
                                    {{ $faqs->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Modal لإضافة سؤال جديد -->
    <div class="modal fade" id="addQuestionModal" tabindex="-1" aria-labelledby="addQuestionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('admin.faqs.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addQuestionModalLabel">إضافة سؤال جديد</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">السؤال</label>
                            <input type="text" name="question" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الإجابة (اختياري)</label>
                            <textarea name="answer" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">مفعل</label>
                            <select name="is_active" class="form-select">
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">حفظ السؤال</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal لتحديث السؤال -->
    <div class="modal fade" id="editQuestionModal" tabindex="-1" aria-labelledby="editQuestionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form id="editQuestionForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editQuestionModalLabel">تحديث السؤال</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit-question-id">
                        <div class="mb-3">
                            <label class="form-label">السؤال</label>
                            <input type="text" name="question" id="edit-question-text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الإجابة (اختياري)</label>
                            <textarea name="answer" id="edit-question-answer" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">مفعل</label>
                            <select name="is_active" id="edit-question-active" class="form-select">
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">تحديث السؤال</button>
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
                            fetch(`{{ url('admin/bot/faqs') }}/${id}`, {
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
        // ملء بيانات الـ modal عند الضغط على زر التعديل
        const editButtons = document.querySelectorAll('.btn-edit');
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                const question = this.dataset.question;
                const answer = this.dataset.answer;
                const is_active = this.dataset.is_active;

                document.getElementById('edit-question-id').value = id;
                document.getElementById('edit-question-text').value = question;
                document.getElementById('edit-question-answer').value = answer;
                document.getElementById('edit-question-active').value = is_active;

                // تعيين action النموذج ديناميكياً
                document.getElementById('editQuestionForm').action = `/admin/bot/faqs/${id}`;
            });
        });
    });
</script>
@endpush
