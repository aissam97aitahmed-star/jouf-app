<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aljouf Portal</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>

<body>

<header class="order__header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between or__cols">
            <div class="d-flex align-items-center text-white">
                <i class="bi bi-person-add"></i>
                <div>
                    <h3 class="tajawal-bold fs-20 m-0">طلب تصريح لزائر</h3>
                    <p class="tajawal-regular fs-14">نتيجة الطلب</p>
                </div>
            </div>

            <div>
                <img src="{{ asset('assets/images/main-logo.png') }}" width="161" height="116">
            </div>

            <div class="d-flex align-items-center">
                <a href="{{ route('index') }}" class="btn btn-primary tajawal-regular fs-16">
                    <i class="bi bi-arrow-right"></i> العودة
                </a>
            </div>
        </div>
    </div>
</header>


<section class="order__application">
    <div class="container">
        <div class="submit__success text-center">

            @php
                $isApproved = str_contains($message, 'قبول');
            @endphp

            {{-- Icon --}}
            <i class="bi {{ $isApproved ? 'bi-check-circle text-success' : 'bi-x-circle text-danger' }} mb-4"
               style="font-size:60px;"></i>

            {{-- Title --}}
            <h4 class="tajawal-bold fs-24 mb-4" style="color:#111827;">
                {{ $message }}
            </h4>

            {{-- Description --}}
            @if($isApproved)
                <p class="tajawal-regular fs-16 mb-4" style="color:#4B5563;">
                    تم اعتماد الطلب بنجاح، سيتم إرسال رمز الدخول QR للزائر عبر البريد الإلكتروني.
                </p>
            @else
                <p class="tajawal-regular fs-16 mb-4" style="color:#4B5563;">
                    تم رفض الطلب، يمكنك التواصل مع الإدارة لمزيد من التفاصيل.
                </p>
            @endif

            {{-- Order number --}}
            @isset($order)
                <div class="order__number mb-4">
                    <h6 class="tajawal-medium fs-16 text-success">
                        رقم الطلب: {{ $order->order_number }}
                    </h6>
                </div>
            @endisset

            <a href="{{ route('index') }}"
               class="btn btn-primary tajawal-regular fs-18 go__home w-100 mb-3">
                العودة للصفحة الرئيسية
            </a>

        </div>
    </div>
</section>


<footer>
    <img src="{{ asset('assets/images/footer.jpg') }}" width="100%" height="88">
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
