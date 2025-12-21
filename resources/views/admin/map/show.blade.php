@extends('admin.layout')

@push('css')
    <style>
        .bg-success {
            background-color: #00471f !important;
            padding: 7px 16px;
            border-radius: 6px;
        }
    </style>
@endpush

@section('content')
    <section class="pc-container">
        <div class="pc-content">

            <div class="row">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>عرض الموقع: <span>{{ $location->name }}</span></h5>
                             <a href="{{ route('admin.map.index') }}" class="btn btn-outline-primary d-inline-flex">العودة
                                    <i class="ti ti-arrow-back icon_mr"></i>
                                </a>
                        </div>

                        <div class="card-body">

                            <p><strong>التصنيف:</strong> {{ $location->category ?? '—' }}</p>
                            <p><strong>الهاتف:</strong> {{ $location->phone ?? '—' }}</p>
                            <p><strong>ساعات العمل:</strong> {{ $location->working_hours ?? '—' }}</p>
                            <p><strong>المرافق:</strong>
                                @foreach ($location->facilities as $facility)
                                    <span class="badge bg-success">{{ $facility->name }}</span>
                                @endforeach
                            </p>
                            <p><strong>معلومات الوصول:</strong> {{ $location->access_info ?? '—' }}</p>

                            {{-- Map --}}
                            <div id="map" style="height: 400px; border-radius: 10px;"></div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    {{-- Leaflet --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        const map = L.map('map').setView([{{ $location->lat ?? 31.63 }}, {{ $location->lng ?? -8.0 }}], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);

        @if ($location->lat && $location->lng)
            L.marker([{{ $location->lat }}, {{ $location->lng }}])
                .addTo(map)
                .bindPopup('<b>{{ $location->name }}</b><br>{{ $location->category }}')
                .openPopup();
        @endif
    </script>
@endsection
