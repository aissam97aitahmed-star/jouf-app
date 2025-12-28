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
</head>

<body>


    <section class="visitor__login">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-6 p-0">
                    <img src="assets/images/login_logo.png" alt="" width="100%">
                    <div class="d-flex justify-content-center pb-5">
                        <form action="">
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
                                    <a href="{{ route('manager.login') }}"
                                        class="btn btn-primary tajawal-medium fs-14 w-100">مدير الامن</a>
                                    <a href="{{ route('officer_security.login') }}"
                                        class="btn btn-primary tajawal-medium fs-14 w-100">موظف الامن</a>
                                    <a href="{{ route('visitor.login') }}"
                                        class="btn btn-primary tajawal-medium fs-14 w-100 active">زائر</a>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="tajawal-medium fs-14 mb-2" style="color: #374151;">رقم
                                    الزائر / رقم
                                    الهوية</label><br>
                                <div class="input-container">
                                    <span class="input-icon"><i class="bi bi-person"></i></span>
                                    <input type="text" placeholder="أدخل رقم الزائر أو رقم الهوية"
                                        class="visitor-input tajawal-medium fs-14">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="" class="tajawal-medium fs-14 mb-2" style="color: #374151;">رقم
                                    الهاتف
                                </label><br>
                                <div class="input-container">
                                    <span class="input-icon"><i class="bi bi-telephone"></i></span>
                                    <input type="text" placeholder="05xxxxxxxx"
                                        class="visitor-input tajawal-medium fs-14">
                                </div>
                            </div>
                            <div class="mb-3 d-flex">
                                <input type="checkbox" class="remember__me">
                                <label for="" class="tajawal-regular fs-14 mb-2" style="color: #374151;"> تذكرني
                                </label>
                            </div>
                            <div class="mb-5">
                                <button type="submit" class="btn btn-primary tajawal-medium fs-16 w-100 submit">دخول
                                    كزائر</button>
                            </div>
                            <div class="mb-3">
                                <div class="form__footer d-grid gap-2" style="grid-template-columns: repeat(2, 1fr);">
                                    <a href="{{ route('visitor.apply') }}" target="_blank" class="btn btn-primary tajawal-regular fs-14"><i
                                            class="bi bi-plus-circle"></i> طلب زيارة جديد</a>
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary tajawal-regular fs-14"><i
                                            class="bi bi-qr-code"></i>
                                        مسح QR</a>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div>
                        <img src="assets/images/footer.jpg" width="100%" alt="" height="44px">
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

    {{-- Start Scan QR Code Modal --}}
    <div class="modal fade scaan__qr" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div>
                        <i class="bi bi-upc-scan mb-4"></i>
                        <h4 class="tajawal-bold fs-20" style="color: #111827;">مسح رمز QR</h4>
                        <p class="tajawal-regular fs-16" style="color: #4B5563;">وجه الكاميرا نحو رمز QR الخاص بك</p>
                    </div>

                    <div id="qr-box">
                        <div id="reader" style="width:100%; height:100%;"></div>

                        <div class="qr-overlay">
                            <span id="qr-loading-text" class="tajawal-regular">جاري المسح...</span>
                        </div>
                    </div>

                    <button id="cancel-scan-button" type="button" class="btn" data-bs-dismiss="modal"
                        style="background-color: #FFFFFF; color: #4B5563; border: 1px solid #D1D5DB; border-radius: 8px; padding: 8px 16px; margin-top: 16px; font-family: 'Tajawal', sans-serif; font-weight: 500;">
                        إلغاء
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Scan QR Code Modal --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>


    <script>
        // Use a global variable to manage the scanner instance
        let html5QrcodeScanner = null;

        // Function to handle the successful scan
        function onScanSuccess(decodedText, decodedResult) {
            document.getElementById('qr-loading-text').textContent = "تم المسح: " + decodedText;
            console.log(`Scan result: ${decodedText}`, decodedResult);

            // Stop the scanner and close the modal after a successful scan
            if (html5QrcodeScanner) {
                html5QrcodeScanner.stop().then(() => {
                    console.log("QR Code scanning stopped.");
                }).catch(err => {
                    console.error("Error stopping the scanner:", err);
                });
            }
            // Manually close the modal
            var modalElement = document.getElementById('exampleModal');
            var modalInstance = bootstrap.Modal.getInstance(modalElement);
            if (modalInstance) {
                modalInstance.hide();
            }
        }

        // Function to start the QR scanner
        function startQrScanner() {
            const qrCodeRegionId = "reader";

            // Initialize the scanner
            // This is the line that required the library to be loaded first
            html5QrcodeScanner = new Html5Qrcode(qrCodeRegionId);

            // Configuration for the scanner
            const config = {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                },
                aspectRatio: 1.0,
                // Ensure supportedScanFormats are available
                supportedScanFormats: [
                    Html5QrcodeSupportedFormats.QR_CODE,
                    Html5QrcodeSupportedFormats.AZTEC
                ],
                // Prefer rear camera if available
                videoConstraints: {
                    facingMode: "environment"
                }
            };

            // Start scanning
            html5QrcodeScanner.start({
                    facingMode: "environment"
                },
                config,
                onScanSuccess,
                (errorMessage) => {
                    // Non-successful scan attempts can be ignored here
                }
            ).then(() => {
                console.log("Scanner started successfully.");
            }).catch((err) => {
                console.error("Error starting QR scanner:", err);
                document.getElementById('qr-loading-text').textContent = "خطأ في تشغيل الكاميرا.";
            });
        }

        // --- Modal Event Handlers ---
        var exampleModal = document.getElementById('exampleModal');

        // Start scanner when modal is shown
        exampleModal.addEventListener('shown.bs.modal', function() {
            startQrScanner();
        });

        // Stop scanner when modal is hidden (closed)
        exampleModal.addEventListener('hidden.bs.modal', function() {
            if (html5QrcodeScanner) {
                html5QrcodeScanner.stop().then(() => {
                    console.log("QR Code scanning stopped on modal close.");
                    html5QrcodeScanner = null;
                }).catch(err => {
                    console.warn("Could not stop scanner gracefully:", err);
                    html5QrcodeScanner = null;
                });
            }
            // Reset the loading text
            document.getElementById('qr-loading-text').textContent = "جاري المسح...";
        });


        // Auto-open the modal on page load
        // window.addEventListener('load', function() {
        //     var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
        //     myModal.show();
        // });
    </script>
</body>

</html>
