@extends('admin.layout')

@push('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
@endpush

@section('content')
    <section class="pc-container">
        <div class="pc-content">

            <div class="row">

                @if ($locations->count())
                    <!-- Location list جدول المواقع -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>قائمة المواقع</h5>
                                <a href="#add_loaction" class="btn btn-outline-primary d-inline-flex">إنشاء موقع جديد
                                    <i class="ti ti-circle-plus icon_mr"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="dt-responsive table-responsive">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>اسم الموقع</th>
                                                <th>التصنيف</th>
                                                <th>الهاتف</th>
                                                <th>تاريخ الإنشاء</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($locations as $location)
                                                <tr>
                                                    <td>{{ $location->id }}</td>
                                                    <td>{{ $location->name }}</td>
                                                    <td>{{ $location->category ?? '—' }}</td>
                                                    <td>{{ $location->phone ?? '—' }}</td>
                                                    <td>{{ $location->created_at->format('Y-m-d') }}</td>
                                                    <td>
                                                        <div class="d-flex gap-1">

                                                              <a href="{{ route('admin.map.show', $location) }}"
                                                                class="btn btn-icon btn-light-primary"><i
                                                                    class="ti ti-eye"></i></a>


                                                            <a href="{{ route('admin.map.edit', $location) }}"
                                                                class="btn btn-icon btn-light-success"><i
                                                                    class="ti ti-edit"></i></a>

                                                            <button type="button"
                                                                class="btn btn-icon btn-light-danger btn-delete"
                                                                data-id="{{ $location->id }}"><i
                                                                    class="ti ti-trash"></i></button>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center text-muted">لا توجد مواقع حالياً
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Form إنشاء الموقع -->
                <div class="col-sm-12">
                    <form method="POST" action="{{ route('admin.map.store') }}">
                        @csrf
                        <div class="card" id="add_loaction">
                            <div class="card-header">
                                <h5>إنشاء الموقع</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">اسم الموقع</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">الفئة</label>
                                            <input type="text" name="category" class="form-control"
                                                value="{{ old('category') }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">الهاتف</label>
                                            <input type="text" name="phone" class="form-control"
                                                value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">ساعات العمل</label>
                                            <input type="text" name="working_hours" class="form-control"
                                                placeholder="6:00 AM - 6:00 PM" value="{{ old('working_hours') }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">المرافق المتاحة</label>
                                            <select name="facilities[]" multiple class="form-select" style="height: 149px;">
                                                @foreach ($facilities as $facility)
                                                    <option value="{{ $facility->id }}">{{ $facility->name }}</option>
                                                @endforeach
                                            </select>
                                            <small>اضغط باستمرار على مفتاح CTRL أو Shift لتحديد عدة عناصر</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">معلومات الوصول</label>
                                            <textarea name="access_info" rows="6" class="form-control">{{ old('access_info') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">موقع الموقع على الخريطة</label>
                                            <input type="hidden" name="lat" id="lat"
                                                value="{{ old('lat') }}">
                                            <input type="hidden" name="lng" id="lng"
                                                value="{{ old('lng') }}">
                                            <div id="map" class="border rounded" style="height: 300px;"></div>
                                            <small class="text-muted">اضغط على الخريطة لتحديد موقع الموقع</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-outline-success d-inline-flex"><i
                                        class="ti ti-circle-check icon_mr"></i>إنشاء الموقع</button>
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
        // Leaflet Map
        const map = L.map('map').setView([31.63, -8.00], 6);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);
        let marker;
        map.on('click', function(e) {
            const {
                lat,
                lng
            } = e.latlng;
            document.getElementById('lat').value = lat;
            document.getElementById('lng').value = lng;
            if (marker) {
                marker.setLatLng(e.latlng);
            } else {
                marker = L.marker(e.latlng).addTo(map);
            }
        });
    </script>



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
                            fetch(`{{ url('admin/map/destroy') }}/${id}`, {
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
