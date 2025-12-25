<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>

<body>


    <section class="visitor__login">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-6 p-0">
                    <img src="{{ asset('assets/images/login_logo.png') }}" alt="" width="100%">
                    <div class="d-flex justify-content-center pb-5">

                        <form method="POST" action="{{ route('login') }}">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            @csrf
                            <h2 class="tajawal-bold fs-30 text-center" style="color: #1E293B;">منصة إصدار تصاريح الزوار
                            </h2>
                            <p class="tajawal-regular fs-16 text-center mb-4" style="color: #4B5563;">تسجيل الدخول
                                للمنصة
                            </p>
                            <div class="mb-3">
                                <label for="" class="tajawal-medium fs-14 mb-2" style="color: #374151;">نوع
                                    المستخدم</label>
                                <div class="type d-grid gap-3"
                                    style="grid-template-columns: repeat(3, 1fr); width: 100%;">
                                    <a href="{{ route('manager.login') }}" class="btn btn-primary tajawal-medium fs-14 w-100 active">مدير
                                        الامن</a>
                                    <a href="{{ route('officer_security.login') }}" class="btn btn-primary tajawal-medium fs-14 w-100 ">موظف الامن</a>
                                    <a href="{{ route('visitor.login') }}" class="btn btn-primary tajawal-medium fs-14 w-100 ">زائر</a>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="tajawal-medium fs-14 mb-2" style="color: #374151;">الرقم
                                    الوظيفي</label><br>
                                <div class="input-container">
                                    <span class="input-icon"><i class="bi bi-person"></i></span>
                                    <input type="text" placeholder="ادخل الرقم الوظيفي" name="username"
                                        required autofocus autocomplete="username" class="visitor-input tajawal-medium fs-14">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="" class="tajawal-medium fs-14 mb-2" style="color: #374151;">كلمة
                                    المرور
                                </label><br>
                                <div class="input-container">
                                    <input type="password" placeholder="********" name="password" required
                                        class="visitor-input tajawal-medium fs-14" id="passwordInput">
                                    <span class="input-icon"><i class="bi bi-eye" id="togglePassword"></i></span>
                                </div>
                            </div>
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <div>

                                    <input type="checkbox" class="form-check-input">
                                    <span class="tajawal-regular fs-16" style="color: #374151;">تذكرني
                                    </span>
                                </div>
                                <a href="" class="tajawal-regular fs-14" style="color: #00471F;">نسيت كلمة
                                    المرور؟</a>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary tajawal-medium fs-16 w-100 submit">تسجيل
                                    الدخول</button>
                            </div>
                            <div class="mb-3 text-center">
                                <p class="tajawal-regular fs-14" style="color: #64748B;">ليس لديك حساب؟<a href=""
                                        style="color: #00471F;"> تواصل
                                        مع الدعم</a></p>
                            </div>

                        </form>
                    </div>
                    <div>
                        <img src="{{ asset('assets/images/footer.jpg') }}" width="100%" alt="" height="44px">
                    </div>
                </div>
                <div class="col-md-6 p-0">
                    <div class="bg-box h-100 d-flex align-items-center justify-content-center">
                        <div class="content">
                            <h1 class="tajawal-bold fs-36 mb-4">منصة إصدار تصاريح الزوار</h1>
                            <p class="tajawal-regular fs-20" style="color: #FFFFFFE5;">منصة متكاملة لإصدار التصاريح
                                الخاصة
                                بالزوار القادمين للشكة</p>
                            <p class="tajawal-regular fs-20 mb-4" style="color: #FFFFFFE5;">من خلال طلب تصريح من قبل
                                موظف او
                                إدارة في الشركة</p>
                            <div class="d-flex justify-content-evenly">
                                <div class="item d-flex flex-column w-auto align-items-center">
                                    <i class="bi bi-bar-chart"></i>
                                    <p class="tajawal-regular fs-14">تقارير شاملة</p>
                                </div>
                                <div class="item d-flex flex-column w-auto align-items-center">
                                    <i class="bi bi-check-square"></i>
                                    <p class="tajawal-regular fs-14">تتبع المهام</p>
                                </div>
                                <div class="item d-flex flex-column w-auto align-items-center">
                                    <i class="bi bi-person-add"></i>
                                    <p class="tajawal-regular fs-14">إضافة موظفين</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#passwordInput');

        togglePassword.addEventListener('click', function() {
            // تبديل نوع الحقل بين password و text
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // تبديل أيقونة العين
            this.classList.toggle('bi-eye'); // العين المفتوحة
            this.classList.toggle('bi-eye-slash'); // العين المغلقة
        });
    </script>
</body>

</html>
