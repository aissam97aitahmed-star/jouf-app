<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title> Aljouf Portal </title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {!! ToastMagic::styles() !!}



</head>

<body>

    <header class="order__header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between or__cols">
                <div class="d-flex align-items-center text-white">
                    <i class="bi bi-person-add"></i>
                    <div>
                        <h3 class="tajawal-bold fs-20 m-0">طلب تصريح لزائر</h3>
                        <p class="tajawal-regular fs-14">تقديم طلب تصريح جديد</p>
                    </div>
                </div>

                <div>
                    <img src="{{ asset('assets/images/main-logo.png') }}" alt="" width="161px" height="116px">
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
            <div class="submit__success">
                <i class="bi bi-check mb-4"></i>
                <h4 class="tajawal-bold fs-24 mb-4" style="color: #111827;">تم إرسال الطلب بنجاح!</h4>
                <p class="tajawal-regular fs-16 text-center mb-4" style="color: #4B5563;">سيتم مراجعة طلبك وإرسال إشعار
                    بالموافقة أو الرفض خلال 24 ساعة بالاضافة الى ارسال رمز QR للزائر</p>
                <div class="order__number mb-4">
                    <h6 class="tajawal-medium fs-16" style="color: #166534;">
                        رقم الطلب: {{ session('order_number') ?? 'غير محدد' }}
                    </h6>
                    <p class="tajawal-regular fs-14" style="color: #16A34A;">احتفظ بهذا الرقم للمتابعة</p>
                </div>
                <a href="{{ route('index') }}" class="btn btn-primary tajawal-regular fs-18 go__home w-100 mb-4">العودة للصفحة
                    الرئيسية</a>
                <a href="{{ route('visitor.apply') }}" class="tajawal-regular fs-18" style="color: #16A34A;">تقديم طلب جديد</a>
            </div>
        </div>
    </section>

    <footer>
        <img src="{{ asset('assets/images/footer.jpg') }}" width="100%" height="88px" alt="">
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    {!! ToastMagic::scripts() !!}

</body>

</html>
