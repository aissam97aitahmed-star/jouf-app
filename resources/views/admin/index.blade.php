@extends('admin.layout')

@section('content')
    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-2 f-w-400 text-muted">مجموع الطلبات</h6>
                            <h4 class="mb-3"><span class="badge bg-light-success border border-success"> {{ $orders_count }}
                                    طلبات</span> </h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-2 f-w-400 text-muted">عدد الموظفين الجدد</h6>
                            <h4 class="mb-3"><span class="badge bg-light-success border border-success">
                                    {{ $employyes_count }}
                                    موظف</span> </h4>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-2 f-w-400 text-muted">عدد الفيديوهات التعليمية</h6>
                            <h4 class="mb-3"><span class="badge bg-light-success border border-success">
                                    {{ $videos_count }}
                                    فيديو</span> </h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-2 f-w-400 text-muted">عدد السياسات والإرشادات</h6>
                            <h4 class="mb-3"><span class="badge bg-light-success border border-success">
                                    {{ $policies_count }}
                                    سياسة</span> </h4>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 col-xl-12">
                    <h5 class="mb-3">إدارة الطلبات</h5>
                    <div class="card tbl-card">
                        <div class="card-body">
                            <div class="dt-responsive table-responsive">
                                <table id="simpletable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>الزائر</th>
                                            <th>الرمز</th>
                                            <th>تاريخ الإنشاء</th>
                                            <th>نوع الزيارة</th>
                                            <th>الموظف المستضيف</th>
                                            <th>تاريخ ووقت الزيارة</th>
                                            <th>الحالة</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $key => $order)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    {{ $order->full_name }} <br> {{ $order->job_title }} <br>
                                                    {{ $order->company }} <br>
                                                    {{ $order->identity_number }} <br> {{ $order->phone }} <br>
                                                    {{ $order->email }}
                                                </td>
                                                <td> {!! QrCode::size(90)->style('square')->generate($order->order_number) !!}</td>
                                                <td> {{ $order->created_at->locale('ar')->diffForHumans() }}</td>

                                                <td>{{ $order->visit_purpose }}</td>
                                                <td>{{ $order->host_employee }}</td>
                                                <td>{{ $order->visit_date }} - {{ $order->visit_time }}</td>
                                                <td>
                                                    @if ($order->status == 'pending')
                                                        <button type="button" style="width: max-content;"
                                                            class="btn btn-sm btn-outline-warning d-inline-flex"><i
                                                                class="ti ti-info-circle ms-1"></i>في الانتظار</button>
                                                    @endif
                                                    @if ($order->status == 'in_progress')
                                                        <button type="button" style="width: max-content;"
                                                            class="btn btn-sm btn-outline-primary d-inline-flex"><i
                                                                class="ti ti-edit-circle ms-1"></i>جاري</button>
                                                    @endif

                                                    @if ($order->status == 'completed')
                                                        <button type="button" style="width: max-content;"
                                                            class="btn btn-sm btn-outline-success d-inline-flex"><i
                                                                class="ti ti-circle-check ms-1"></i> مكتمل</button>
                                                    @endif

                                                </td>
                                                <td>
                                                    <button data-id="{{ $order->id }}" type="button" class="btn btn-icon btn-light-danger btn-delete"><i
                                                            class="ti ti-trash"></i></button>
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
                            fetch(`{{ url('admin/dashboard/destry/order') }}/${id}`, {
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
