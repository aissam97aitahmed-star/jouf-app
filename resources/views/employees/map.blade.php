@extends('employees.layout')
@push('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
@endpush
@section('content')

    <section class="map">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-5">
                <h4 class="tajawal-bold">الخريطة التفاعلية للمواقع</h4>
                <span class="badge rounded-pill text-bg-success tajawal-medium fs-14">5 موقع متاح</span>
            </div>
            <div class="row pb-5 mb-5">
                <div class="col-md-6 col-xs-12 mb-3">
                    <h5 class="tajawal-bold mb-3">خريطة المواقع</h5>
                    <div id="locationsMap" style="height: 400px; border-radius: 12px;"></div>
                </div>
                <div class="col-md-6 col-xs-12">
                    @forelse ($locations as $location)
                        <div class="box mb-5">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-geo-alt location__icon"></i>
                                <div>
                                    <a href="https://www.google.com/maps?q={{ $location->lat }},{{ $location->lng }}" target="_blank" class="text-dark"><h6 class="tajawal-bold fs-18 m-0">{{ $location->name }}</h6></a>
                                    <p class="tajawal-regular fs-14" style="color: #4B5563;">{{ $location->category }}</p>
                                </div>
                            </div>
                            <p class="tajawal-bold fs-14 mb-2" style="color: #374151;">المرافق المتاحة:</p>
                            <div class="mb-4">
                                @foreach ($location->facilities as $facility)
                                    <span
                                        class="badge rounded-pill text-bg-success disp tajawal-regular fs-12">{{ $facility->name }}
                                        الملابس</span>
                                @endforeach

                            </div>
                            <div class="info">
                                <div class="d-flex justify-content-between mb-2">
                                    <p class="tajawal-regular fs-14"><i class="bi bi-info-circle"></i> &nbsp; معلومات الوصول
                                    </p>
                                    <p class="tajawal-regular fs-14"><i class="bi bi-telephone"></i> &nbsp;
                                        {{ $location->phone }}
                                    </p>
                                </div>
                                <p class="tajawal-regular fs-14">ساعات العمل: {{ $location->working_hours }}،
                                    {{ $location->access_info }}</p>
                            </div>
                        </div>
                    @empty
                    @endforelse



                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const locations = @json($locations);
    </script>
    <script>
        // إنشاء الخريطة (مركز افتراضي: المغرب)
        const map = L.map('locationsMap').setView([31.7917, -7.0926], 6);

        // طبقة الخريطة
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);

        // حدود لتكبير الخريطة تلقائياً
        const bounds = [];

        locations.forEach(location => {
            if (location.lat && location.lng) {
                const marker = L.marker([location.lat, location.lng]).addTo(map);

                marker.bindPopup(`
                <strong>${location.name}</strong><br>
                ${location.category ?? ''}
            `);

                bounds.push([location.lat, location.lng]);
            }
        });

        // تكبير تلقائي ليشمل كل المواقع
        if (bounds.length) {
            map.fitBounds(bounds, {
                padding: [50, 50]
            });
        }
    </script>
@endpush
