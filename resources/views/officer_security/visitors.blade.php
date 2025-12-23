@extends('officer_security.layout')

@section('content')
    <section class="visitors__security">
        <div class="container">
            <div class="div">
                <div class="d-flex justify-content-between search__form">
                    <h3 class="tajawal-bold fs-24 mb-3" style="color: #111827; flex: 1;">قائمة زوار اليوم</h3>
                    <form action="">
                        <input type="text" id="visitorSearchInput"
                            placeholder="البحث في الزوار...">
                        <button class="btn btn-primary tajawal-regular fs-16"> <i class="bi bi-search"></i> بحث</button>
                    </form>
                </div>
                <div class="data__vistors">
                    <table class="table" id="visitorsTable">
                        <thead>
                            <tr>
                                <th scope="col">الزائر</th>
                                <th scope="col">نوع الزيارة</th>
                                <th scope="col">الموظف المستضيف</th>
                                <th scope="col">الوقت</th>
                                <th scope="col">الحالة</th>
                                <th scope="col">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todayOrders as $order)
                                <tr>
                                    <td data-label="الزائر">
                                        <div class="visitor__info d-flex">
                                            <i class="bi bi-person"></i>
                                            <div>
                                                <h6 class="tajawal-medium fs-14 m-0" style="color: #111827;">
                                                    {{ $order->full_name }}
                                                </h6>
                                                <p class="tajawal-regular fs-14" style="color: #6B7280;">
                                                    {{ $order->company }} </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="نوع الزيارة">
                                        <p class="tajawal-regular fs-14"> <i class="bi bi-briefcase"></i>
                                            {{ $order->visit_purpose }}</p>
                                    </td>
                                    <td data-label="الموظف المستضيف">
                                        <div>
                                            <h6 class="tajawal-medium fs-14 m-0" style="color: #111827;">
                                                {{ $order->host_employee }}
                                            </h6>
                                            <p class="tajawal-regular fs-14" style="color: #6B7280;">
                                                {{ $order->department }}</p>
                                        </div>
                                    </td>
                                    <td data-label="الوقت">
                                        <div>
                                            <h6 class="tajawal-medium fs-14 m-0" style="color: #111827;">
                                                {{ $order->visit_time }}
                                            </h6>
                                            <p class="tajawal-regular fs-14" style="color: #6B7280;">
                                                {{ $order->visit_duration }}</p>
                                        </div>
                                    </td>
                                    <td data-label="الحالة">
                                        <span class="status tajawal-medium fs-12">مُوافق عليه</span>
                                    </td>
                                    <td data-label="الإجراءات">
                                        <div class="actions">
                                            <a href="javascript:;" data-id="{{ $order->id }}" class="fs-18 viewOrderBtn"
                                                style="color: #4F46E5;"><i class="bi bi-eye"></i></a>
                                            @if (is_null($order->entry_time))
                                                <a href="{{ route('officer_security.visitor.entry', $order) }}"
                                                    class="fs-18" style="color: #16A34A;"><i
                                                        class="bi bi-box-arrow-in-right"></i></a>
                                            @endif
                                            @if (is_null($order->exit_time))
                                                <a href="{{ route('officer_security.visitor.exit', $order) }}"
                                                    class="fs-18" style="color: #DC2626;"><i
                                                        class="bi bi-box-arrow-left"></i></a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade employees__call modal__security" id="oderDetailsModal" tabindex="-1"
        aria-labelledby="oderDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex flex-column justify-content-center align-items-center w-100">
                        <span class="tajawal-bold fs-30 mb-3"> <i class="bi bi-briefcase d-flex"></i></span>
                        <h5 class="tajawal-bold fs-24" style="color: #FFFFFF;">تأكيد بيانات الزائر</h5>
                        <p class="tajawal-regular fs-16" style="color: #E0E7FF;" id="modalFullName">_</p>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row global__info mb-4">
                        <div class="col visit__data" style="margin-left: 10px;">
                            <h5 class="tajawal-bold fs-18" style="color: #111827;">بيانات الزائر</h5>
                            <ul class="p-0">
                                <li><span class="tajawal-regular fs-16" style="color: #4B5563;">الاسم:</span><strong
                                        class="tajawal-medium fs-16" id="modalName">_</strong></li>
                                <li><span class="tajawal-regular fs-16" style="color: #4B5563;">الهاتف:</span><strong
                                        class="tajawal-medium fs-16" id="modalPhone">_</strong></li>
                                <li><span class="tajawal-regular fs-16" style="color: #4B5563;">الهوية:</span><strong
                                        class="tajawal-medium fs-16" id="modalIdentity">_</strong></li>
                                <li><span class="tajawal-regular fs-16" style="color: #4B5563;">الشركة:</span><strong
                                        class="tajawal-medium fs-16" id="modalCompany">_</strong></li>
                            </ul>
                        </div>
                        <div class="col visit__data">
                            <h5 class="tajawal-bold fs-18" style="color: #111827;">بيانات الزيارة</h5>
                            <ul class="p-0">
                                <li><span class="tajawal-regular fs-16" style="color: #4B5563;">نوع
                                        الزيارة:</span><strong class="tajawal-medium fs-16"
                                        id="modalVisitPurpose">_</strong></li>
                                <li><span class="tajawal-regular fs-16" style="color: #4B5563;">الموظف
                                        المستضيف:</span><strong class="tajawal-medium fs-16" id="modalHost">_</strong>
                                </li>
                                <li><span class="tajawal-regular fs-16" style="color: #4B5563;">القسم:</span><strong
                                        class="tajawal-medium fs-16" id="modalDepartment">_</strong></li>
                                <li><span class="tajawal-regular fs-16" style="color: #4B5563;">المدة
                                        المتوقعة:</span><strong class="tajawal-medium fs-16" id="modalDuration">_</strong>
                                </li>

                            </ul>
                        </div>
                    </div>




                    <div class="add mb-4" style="background: #EFF6FF;">
                        <h6 class="tajawal-bold fs-14" style="color: #111827;"> <span>الغرض من الزيارة</span></h6>
                        <p class="tajawal-regular fs-14" style="color: #374151;" id="modalSpecialRequests">_</p>
                    </div>



                    <div class="add mb-4" style="background: #F9FAFB;">
                        <h6 class="tajawal-bold fs-14 d-flex justify-content-between m-0" style="color: #111827;"> <span>
                                الحالة الحالية: </span> <span class="visit___status tajawal-medium fs-14">_</span> </h6>
                        <p class="tajawal-regular fs-14" style="color: #4B5563;">وقت الدخول: <span
                                id="modalEntryTime"></span></p>
                        <p class="tajawal-regular fs-14" style="color: #4B5563;">وقت الدخول: <span
                                id="modalExitTime"></span></p>
                    </div>



                    <div class="row">
                        <div class="col">
                            <a class="btn btn-primary w-100 action" data-bs-dismiss="modal" aria-label="Close"
                                style="background: #F3F4F6; color: #374151;" type="submit"><i class="bi bi-x"></i><span
                                    class="tajawal-bold fs-16">إغلاق
                                </span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script>
        document.querySelectorAll('.viewOrderBtn').forEach(button => {
            button.addEventListener('click', function() {
                const orderId = this.dataset.id;

                fetch(`/officer_security/visitors/order/${orderId}`)
                    .then(res => res.json())
                    .then(data => {
                        if (!data.success) {
                            alert('حدث خطأ');
                            return;
                        }

                        const order = data.order;

                        document.getElementById('modalFullName').textContent = order.full_name;
                        document.getElementById('modalName').textContent = order.full_name;
                        document.getElementById('modalPhone').textContent = order.phone;
                        document.getElementById('modalIdentity').textContent = order.identity_number;
                        document.getElementById('modalCompany').textContent = order.company ?? '—';

                        document.getElementById('modalVisitPurpose').textContent = order.visit_purpose;
                        document.getElementById('modalHost').textContent = order.host_employee;
                        document.getElementById('modalDepartment').textContent = order.department ??
                            '—';
                        document.getElementById('modalDuration').textContent = order.visit_duration ??
                            '—';

                        document.getElementById('modalSpecialRequests').textContent = order
                            .special_requests ?? 'لا توجد ملاحظات';
                        document.getElementById('modalEntryTime').textContent = order.entry_time ?? '—';
                        document.getElementById('modalExitTime').textContent = order.exit_time ?? '—';

                        // فتح المودال
                        const modal = new bootstrap.Modal(document.getElementById('oderDetailsModal'));
                        modal.show();
                    })
                    .catch(err => console.error(err));
            });
        });
    </script>

    <script>
        const searchInput = document.getElementById('visitorSearchInput');
        const table = document.getElementById('visitorsTable');
        const rows = table.querySelectorAll('tbody tr');

        searchInput.addEventListener('input', function() {
            const filter = this.value.toLowerCase();

            rows.forEach(row => {
                // تحقق من أي عمود تريد البحث فيه، مثلاً الاسم والشركة
                const fullName = row.querySelector('td[data-label="الزائر"] h6')?.textContent
                .toLowerCase() ?? '';
                const company = row.querySelector('td[data-label="الزائر"] p')?.textContent.toLowerCase() ??
                    '';
                const visitPurpose = row.querySelector('td[data-label="نوع الزيارة"] p')?.textContent
                    .toLowerCase() ?? '';

                if (fullName.includes(filter) || company.includes(filter) || visitPurpose.includes(
                    filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
@endpush
