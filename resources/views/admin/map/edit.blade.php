@extends('admin.layout')

@push('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .br-6 {
            border-radius: 6px;
        }

        #simpletable_filter label {
            width: 100%
        }

        #simpletable_wrapper .row {
            padding-bottom: 20px
        }
    </style>
@endpush

@section('content')
    <section class="pc-container">
        <div class="pc-content">

            <div class="row">
                <div class="col-sm-12">

                    <form method="POST" action="{{ route('admin.map.update', $location) }}">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>تعديل الموقع</h5>
                                <a href="{{ route('admin.map.index') }}" class="btn btn-outline-primary d-inline-flex">العودة
                                    <i class="ti ti-arrow-back icon_mr"></i>
                                </a>

                            </div>

                            <div class="card-body">
                                <div class="row">

                                    {{-- Name --}}
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">اسم الموقع </label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name', $location->name) }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Category --}}
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">الفئة</label>
                                            <input type="text" name="category" class="form-control"
                                                value="{{ old('category', $location->category) }}">
                                        </div>
                                    </div>

                                    {{-- Phone --}}
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">الهاتف</label>
                                            <input type="text" name="phone" class="form-control"
                                                value="{{ old('phone', $location->phone) }}">
                                        </div>
                                    </div>

                                    {{-- Working Hours --}}
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">ساعات العمل</label>
                                            <input type="text" name="working_hours" class="form-control"
                                                placeholder="6:00 AM - 6:00 PM"
                                                value="{{ old('working_hours', $location->working_hours) }}">
                                        </div>
                                    </div>

                                    {{-- Facilities --}}
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">المرافق المتاحة</label>
                                            <select name="facilities[]" multiple class="form-select" style="height: 149px;">
                                                @foreach ($facilities as $facility)
                                                    <option value="{{ $facility->id }}"
                                                        {{ in_array($facility->id, old('facilities', $location->facilities->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                        {{ $facility->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <small>اضغط باستمرار على مفتاح CTRL أو Shift لتحديد عدة عناصر</small>
                                        </div>
                                    </div>

                                    {{-- Access Info --}}
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">معلومات الوصول</label>
                                            <textarea name="access_info" rows="6" class="form-control">{{ old('access_info', $location->access_info) }}</textarea>
                                        </div>
                                    </div>

                                    {{-- Map --}}
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">موقع الموقع على الخريطة</label>

                                            {{-- Hidden inputs --}}
                                            <input type="hidden" name="lat" id="lat"
                                                value="{{ old('lat', $location->lat) }}">
                                            <input type="hidden" name="lng" id="lng"
                                                value="{{ old('lng', $location->lng) }}">

                                            {{-- Map --}}
                                            <div id="map" class="border rounded" style="height: 300px;"></div>

                                            <small class="text-muted">
                                                اضغط على الخريطة لتحديد موقع الموقع
                                            </small>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-outline-success d-inline-flex"><i
                                        class="ti ti-circle-check icon_mr"></i>تحديث الموقع</button>
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
        const map = L.map('map').setView([{{ old('lat', $location->lat ?? 31.63) }},
            {{ old('lng', $location->lng ?? -8.0) }}
        ], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);

        let marker;
        @if ($location->lat && $location->lng)
            marker = L.marker([{{ $location->lat }}, {{ $location->lng }}]).addTo(map);
        @endif

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
@endpush
